<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property string status
 */
class Post extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_PUBLISHED = 'published';

    protected $fillable = ['title', 'content', 'parsed_content', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function publish()
    {
        $this->status = static::STATUS_PUBLISHED;
        return $this->save();
    }

    public function isPending()
    {
        return $this->status == static::STATUS_PENDING;
    }
}