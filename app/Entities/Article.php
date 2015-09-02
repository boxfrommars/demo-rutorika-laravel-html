<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Article
 *
 */
class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['title', 'content', 'image'];
}