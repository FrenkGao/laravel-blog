<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates=['published_at'];//设置字段为日期字段
    //自动将title填充为slug
    public function setTitleAttribute($value) {
        $this->attributes['title']=$value;

        if (!$this->exists){
            $this->attributes['slug']=str_slug($value);
        }
    }

}
