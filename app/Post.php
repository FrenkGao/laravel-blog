<?php

namespace App;

use App\Services\Markdowner;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $dates = ['published_at'];//设置字段为日期字段
    protected $fillable=[
        'title','subtitle','content_raw','page_image','meta_description','layout','is_draft','published_at',
    ];

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_tag_pivot');
    }

   //不在需要设置slug了
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
    }

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
        if (count($tags)){
            $this->tags()->sync(
                Tag::whereIn('tag',$tags)->lists('id')->all()
            );
            return;
        }

        $this->tags()->detach();//移除本文章所有的tags

    }

    public function getPublishDateAttribute($value) {
        return $this->published_at->format('y-n-j');
    }
    public function getPublishTimeAttribute($value) {
        return $this->published_at->format('H:i');
    }
    public function getContentAttribute($value) {
        return $this->content_raw;
    }

}
