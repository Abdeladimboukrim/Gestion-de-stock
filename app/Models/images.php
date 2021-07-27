<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class Images extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'porduit_id',
    ];
    public function produits(){
        return $this->belongsTo(produit::class);
    }
}
