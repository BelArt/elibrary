<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temptable extends Model
{
    use HasFactory;

    protected $table = 'download';

    public $timestamps = false;

    protected $fillable = ['fund', 'inventory', 'case', 'page', 'loaded'];

}
