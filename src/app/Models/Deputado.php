<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deputado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_externo', 'nome', 'sigla_partido', 'sigla_uf', 'url_foto'
    ];

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }
}