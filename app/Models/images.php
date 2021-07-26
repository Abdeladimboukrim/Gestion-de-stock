<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class images extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'porduit_id',
    ];
    public function posts(){
        return $this->belongsTo(produit::class);
    }
}
