<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'tipo', 'data_validade', 'nome', 'url', 'instituicao_id', 'vistoria_id','relatorio_id', 'caminho_arquivo',
    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicao_id');
    }

    public function vistoria()
    {
        return $this->belongsTo(Vistoria::class, 'vistoria_id');
    }

    public function relatorio()
    {
        return $this->belongsTo(Relatorio::class, 'relatorio_id');
    }
}
