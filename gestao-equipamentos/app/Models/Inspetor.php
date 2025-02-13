<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspetor extends Model
{
    protected $table = 'inspetores';
    protected $fillable = ['nome'];

    // Um inspetor faz muitos relatórios
    public function relatorios()
    {
        return $this->hasMany(Relatorio::class);
    }

    // Um inspetor faz muitas vistorias
    public function vistorias()
    {
        return $this->hasMany(Vistoria::class);
    }
}

