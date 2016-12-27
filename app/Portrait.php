<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portrait extends Model
{
    use SoftDeletes;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cbl_portrait';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
