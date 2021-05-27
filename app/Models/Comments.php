<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['comment'];

    public function morph()
    {
        return $this->morphTo();
    }

    public function page()
    {
        return $this->morphTo(Pages::class, 'morph');
    }

//    public function case()
//    {
//        $this->morphedByMany(Cases::class, 'type', 'cases');
//    }


}
