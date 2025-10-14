<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $fillable = [
    'title',
    'description',
    'starting_price',
    'end_time',
    'user_id',
    'image',
];


public function bids()
{
    return $this->hasMany(Bid::class);
}

public function winner()
{
    return $this->belongsTo(User::class, 'winner_id');
}

public function user()
{
    return $this->belongsTo(User::class);
}


}
