<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;

    protected $table = 'proprietarios';

    protected $fillable = ['nome', 'telefone', 'n_bilhete', 'validade_bilhete', 'instituicao_id'];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }
}