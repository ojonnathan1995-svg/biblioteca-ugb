<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Esta línea permite que Laravel guarde los datos en la tabla 'books'
    protected $fillable = ['title', 'author', 'year'];
}
