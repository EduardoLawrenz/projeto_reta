<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'deputado_id', 'tipo_despesa', 'valor', 'fornecedor', 'data_documento', 'url_documento'
    ];

    public function deputado()
    {
        return $this->belongsTo(Deputado::class);
    }
}