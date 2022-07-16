<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table ='teams';
    use HasFactory;
    protected $fillable =[
        'name',
    ];

    public function users()// dentro de team vamos procuara usuarios com user.
    {
        return $this->belongsToMany(User::class);//relacionamento
    }
}
