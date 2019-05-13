<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Quando o nome da Classe e da tabela nao sao iguais
    // temos que dizer qual e a tabela para o modelo
    protected $table = 'categories';

    // Definir o relacionamento
    public function posts(){
    	return $this->hasMany('App\Post');
    }

}
