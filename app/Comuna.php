<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = 'tb_comuna';
    protected $fillable = ['comu_nomb'];
    protected $primaryKey = 'comu_codi';
}
