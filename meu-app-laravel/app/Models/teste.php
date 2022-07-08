<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teste extends Model
{
    protected $table = "testes";
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'description',
        'price'
        
    ];
}
