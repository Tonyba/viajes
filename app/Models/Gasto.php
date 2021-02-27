<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model {
    use HasFactory;
    protected $table = 'gastos';

    public function viaje() {
        return $this->belongsTo('App/Models/Viaje', 'viaje_id');
    }
}