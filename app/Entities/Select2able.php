<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Article
 *
 * @property integer $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Select2able whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Select2able whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Select2able whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Select2able whereUpdatedAt($value)
 */
class Select2able extends Model
{
    protected $table = 'select2able';
    protected $fillable = ['title'];
}