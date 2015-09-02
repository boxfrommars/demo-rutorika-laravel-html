<?php

namespace App\Http\Controllers;


use App\Entities\Select2able;
use Rutorika\Html\Http\Select2ableTrait;

class Select2Controller extends Controller
{
    use Select2ableTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
       return Select2able::query();
    }
}
