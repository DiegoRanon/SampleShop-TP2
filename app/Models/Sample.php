<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    
    protected $table = 'samples';

    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_utilisateur',
        'titre',
        'compositeur',
        'description',
        'category',
        'cle_musical',
        'bpm',
        'genre',
        'date'
    ];
}

