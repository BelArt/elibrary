<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    protected $table = 'cases';

    protected $fillable = ['number', 'name', 'description', 'year'];

    public $timestamps = false;

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function fund()
    {
        return $this->belongsTo('App\Models\Funds', 'fund_id');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Models\Inventory');
    }

    public function pages()
    {
        return $this->hasMany('App\Models\Pages', 'case_id');
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function comments()
    {
        return $this->morphMany(Comments::class, 'morph');
    }
}
