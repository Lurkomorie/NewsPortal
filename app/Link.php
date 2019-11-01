<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'title',
        'confirmed',
        'category_id',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
