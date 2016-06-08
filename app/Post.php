<?php

namespace App;

use App\Services\Markdowner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $dates = ['published_at'];//设置字段为日期字段
    protected $fillable = [
        'title', 'subtitle', 'content_raw', 'page_image', 'meta_description', 'layout', 'is_draft', 'published_at',
    ];

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_tag_pivot');
    }

/*    //不在需要设置slug了
    //自动将title填充为slug
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }

    protected function setUniqueSlug($title, $extra) {
        $slug = str_slug($title . '-' . $extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);

            return;
        } else {
            $this->attributes['slug'] = $slug;
        }
    }*/

    /**
     * 将MarkDown转换成html
     * @param $value
     */
    public function setContentRawAttribute($value) {
        $markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $markdown->toHTML($value);

    }

    /**
     * 同步tags
     * @param array $tags
     */
    public function syncTags(array $tags) {
        Tag::addNeededTags($tags);
        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->lists('id')->all()
            );

            return;
        }

        $this->tags()->detach();//移除本文章所有的tags

    }

    public function getPublishDateAttribute($value) {
        return $this->published_at->format('Y-n-j');
    }

    public function getPublishTimeAttribute($value) {
        return $this->published_at->format('H:i');
    }

    public function getContentAttribute($value) {
        return $this->content_raw;
    }

    /**
     *
     * @param Tag|null $tag
     * @return string
     */
    public function url(Tag $tag = null) {
        $url = url('blog/' . $this->id);
        if ($tag) {
            $url .= '?tag=' . urlencode($tag->tag);
        }

        return $url;
    }

    public function tagLinks($base = '/blog?tag=%TAG%') {
        $tags = $this->tags()->lists('tag');
        $return = [];
        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a href="' . $url . '">' . e($tag) . '</a>';
        }

        return $return;
    }

    /**
     * 返回后一篇文章
     * @param Tag|null $tag
     * @return mixed
     */
    public function newerPost(Tag $tag = null) {
        $query =
            static::where('published_at', '>', $this->published_at)
                ->where('published_at', '<=', Carbon::now())
                ->where('is_draft', 0)
                ->orderBy('published_at', 'asc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    /**
     * 前一篇文章
     * @param Tag|null $tag
     * @return mixed
     */
    public function olderPost(Tag $tag = null)
    {
        $query =
            static::where('published_at', '<', $this->published_at)
                ->where('is_draft', 0)
                ->orderBy('published_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }
}
