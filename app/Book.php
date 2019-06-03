<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The users that belong to the book.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withTimestamps()
            ->as('borrow')
            ->withPivot('date_in', 'date_out');
    }
}
