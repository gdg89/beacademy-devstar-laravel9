<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $table ='team_users';
    use HasFactory;
    protected $fillable= [
        'user_id',
        'teams_id',
    ];
    public $timestamps = false;
}
