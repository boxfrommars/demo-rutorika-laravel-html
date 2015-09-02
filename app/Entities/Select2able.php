<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Article
 *
 */
class Select2able extends Model
{
    protected $table = 'select2able';
    protected $fillable = ['title'];
}