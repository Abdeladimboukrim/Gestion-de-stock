<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
class Produit extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'adm_Nom',
        'quantite',
        'categorie',
        'cover',

    ];

    public function images(){
        return $this->hasMany(images::class);
    }
}
