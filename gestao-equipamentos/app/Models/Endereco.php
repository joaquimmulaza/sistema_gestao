<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = ['instituicao_id', 'municipio', 'comuna', 'distrito'];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }
}
