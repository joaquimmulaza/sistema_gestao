<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';


    // Permite a atribuição em massa para esses campos
    protected $fillable = ['tipo', 'data_validade', 'nome', 'url', 'instituicao_id', 'vistoria_id'];

    /**
     * Define a relação entre Documento e Instituicao.
     * Um documento pode estar associado a uma instituição.
     */
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class); // Relacionamento: um documento pertence a uma instituição
    }

    /**
     * Define a relação entre Documento e Vistoria.
     * Um documento pode estar associado a uma vistoria.
     */
    public function vistoria()
    {
        return $this->belongsTo(Vistoria::class); // Relacionamento: um documento pertence a uma vistoria
    }
}
