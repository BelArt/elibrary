<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $table = 'pages';

    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function fund()
    {
        return $this->belongsTo('App\Models\Funds');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Models\Inventory');
    }
    public function case()
    {
        return $this->belongsTo('App\Models\Cases');
    }

    public function getUrl()
    {
        return $this->file;
    }

    public function comments()
    {
        return $this->morphMany(Comments::class, 'morph');
    }

//    public function comments()
//    {
//        $this->morphToMany(Comments::class, 'type', 'pages', 'entity_id');
//    }
}
