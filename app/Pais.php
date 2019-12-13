<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'tb_pais';
    protected $fillable = ['pais_nomb'];
    protected $primaryKey = 'pais_codi';
}
