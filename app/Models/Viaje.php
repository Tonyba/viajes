<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model {
    use HasFactory;
    protected $table = 'viajes';

    public function gastos() {
        return $this->hasMany('App\Models\Gasto');
    }
}