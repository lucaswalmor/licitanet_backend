<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cod_produto', 
        'nome_produto', 
        'valor_produto', 
        'estoque_produto',
        'cidade',
        'estado',
    ];
}
