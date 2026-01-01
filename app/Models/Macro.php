<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Macro extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['titulo', 'descripcion', 'instruccion','activa', 'codigo', 'categoria_id'];

    public function searchableAs(): string
    {
        return 'macros_index';
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class); 
    }
}
