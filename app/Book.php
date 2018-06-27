<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'name', 'url', 'image_url', 'author', 'itemCaption', 'publisherName'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class)->paginate(20);
    }

    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    
    public function read_users()
    {
        return $this->users()->where('type', 'read');
    }
}