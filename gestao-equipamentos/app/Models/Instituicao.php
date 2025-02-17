<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;
    protected $table = 'instituicoes';
    

    protected $fillable = ['nome', 'activa', 'data_registo'];

    public function proprietarios()
    {
        return $this->hasMany(Proprietario::class);
    }
}
