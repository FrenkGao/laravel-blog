<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=[
        'tag','title','subtitle','page_image','meta_description','reverse_direction',
    ];//可以直接修改的列

    /**
     * 定义文章与标签之间多对多的关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts() {
        return $this->belongsToMany('App\Post','post_tag_pivot');
    }

    /**
     * 将数据库中没有的tags创建出来
     * @param array $tags
     */
    public static function addNeededTags(array $tags) {
        if (count($tags)===0){
            return;
        }
        $found=static::whereIn('tag',$tags)->lists('tag')->all();//从tags表中找出存在的tag

        //对比从表中找的tag和 现在的tag，将没有的tag创建出来
        foreach (array_diff($tags,$found)as $tag){
            static::create([
                'tag'=>$tag,
                'title'=>$tag,
                'subtitle'=>'Subtitle for '.$tag,
                'meta_description'=>'',
                'reverse_direction'=>false,
            ]);
        }

    }
}
