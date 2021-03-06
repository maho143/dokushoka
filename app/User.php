<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_filename',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('type')->withTimestamps();
    }

    public function want_books()
    {
        return $this->books()->where('type', 'want');
    }

    public function want($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_wanting($itemId);

        if ($exist) {
            // do nothing
            return false;
        } else {
            // do "want"
            $this->books()->attach($itemId, ['type' => 'want']);
            return true;
        }
    }

    public function dont_want($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_wanting($itemId);

        if ($exist) {
            // remove "want"
            \DB::delete("DELETE FROM book_user WHERE user_id = ? AND book_id = ? AND type = 'want'", [\Auth::user()->id, $itemId]);
        } else {
            // do nothing
            return false;
        }
    }

    public function is_wanting($itemIdOrCode)
    {
        if (strlen($itemIdOrCode)<10) {
            $item_isbn_exists = $this->want_books()->where('book_id', $itemIdOrCode)->exists();
            return $item_isbn_exists;
        } else {
            $item_isbn_exists = $this->want_books()->where('isbn', $itemIdOrCode)->exists();
            return $item_isbn_exists;
        }
    }
    
    public function read_books()
    {
        return $this->books()->where('type', 'read');
    }

    public function read($itemId)
    {
        // Is the user already "read"?
        $exist = $this->is_reading($itemId);

        if ($exist) {
            // do nothing
            return false;
        } else {
            // do "want"
            $this->books()->attach($itemId, ['type' => 'read']);
            return true;
        }
    }

    public function dont_read($itemId)
    {
        // Is the user already "read"?
        $exist = $this->is_reading($itemId);

        if ($exist) {
            // remove "read"
            \DB::delete("DELETE FROM book_user WHERE user_id = ? AND book_id = ? AND type = 'read'", [\Auth::user()->id, $itemId]);
        } else {
            // do nothing
            return false;
        }
    }
    public function is_reading($itemIdOrCode)
    {
        if (strlen($itemIdOrCode)<10) {
            $item_isbn_exists = $this->read_books()->where('book_id', $itemIdOrCode)->exists();
            return $item_isbn_exists;
        } else {
            $item_isbn_exists = $this->read_books()->where('isbn', $itemIdOrCode)->exists();
            return $item_isbn_exists;
        }
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function feed_reviews()
    {
        $follow_user_ids = $this->followings()-> pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Review::whereIn('user_id', $follow_user_ids);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
    // confirm if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;

    if ($exist || $its_me) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->followings()->attach($userId);
        return true;
    }
    }

    public function unfollow($userId)
    {
    // confirming if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;


    if ($exist && !$its_me) {
        // stop following if following
        $this->followings()->detach($userId);
        return true;
    } else {
        // do nothing if not following
        return false;
    }
    }


    public function is_following($userId) {
    return $this->followings()->where('follow_id', $userId)->exists();
    }

    
}
