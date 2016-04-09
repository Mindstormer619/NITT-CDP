<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $table = 'circles';

    protected $fillable = ['name'];

    public function getPosts() {
        return $this->belongsToMany('App\Post', 'circles_posts_map');
    }

    public function getMembers() {
        return $this->belongsToMany('App\User', 'circles_users_map');
    }

    public function getCreator() {
        return $this->belongsTo('App\User', 'creator');
    }

    public function getTopic() {
        if ($this->scope == 'TOPIC') {
            return $this->belongsTo('App\Topic', 'topic_id');
        }
        else return null;
    }

}
