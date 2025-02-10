<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vistoria extends Model
{
    use HasFactory;

    protected $table = 'vistorias';

    protected $fillable = ['data', 'observacoes', 'instituicao_id'];  // Incluindo 'instituicao_id'

    /**
     * Define a relação entre Vistoria e Instituicao.
     * Uma vistoria pertence a uma instituição.
     */
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);  // Relacionamento inverso: uma vistoria pertence a uma instituição
    }
}
