<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_PUBLISHED = 'published';

    protected $fillable = ['title', 'content', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function publish()
    {
        return $this->save(['status' => static::STATUS_PUBLISHED]);
    }
}