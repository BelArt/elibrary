<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funds extends Model
{
    use HasFactory;

    protected $table = 'funds';

    protected $fillable = ['number', 'name', 'description'];

    public $timestamps = false;

    public function setNumber($num)
    {
        $this->number = $num;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}
