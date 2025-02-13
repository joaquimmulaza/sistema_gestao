<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;

    protected $table = 'relatorios';

    protected $fillable = ['titulo', 'data', 'descricao', 'vistoria_id']; // Incluindo 'vistoria_id'

    /**
     * Define a relação entre Relatorio e Vistoria.
     * Um relatório pertence a uma vistoria.
     */
    public function vistoria()
    {
        return $this->belongsTo(Vistoria::class); // Relacionamento inverso: um relatório pertence a uma vistoria
    }

    public function inspetor()
    {
        return $this->belongsTo(Inspetor::class);
    }
}
