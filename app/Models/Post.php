<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $fillable = [
        'usuario_id',
        'categoria_id',
        'titulo',
        'cuerpo',
        'imagen',
    ];


    public function usuario() :BelongsTo {
        return $this->belongsTo(Usuario::class);
    }
    public function categoria() :BelongsTo {
        return $this->belongsTo(Categoria::class);
    }

}
