<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vistoria extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'observacoes', 'instituicao_id', 'inspetor_id'];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }

    public function inspetor()
    {
        return $this->belongsTo(Inspetor::class);
    }

}
