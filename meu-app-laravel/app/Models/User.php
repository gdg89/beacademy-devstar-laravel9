<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     // Definimos que atributo son reescribibles en la tabla utilizando el $fillable
    protected $fillable = [
        'name',
        'email',
        'is_admin',
        'image',
        'password',
        

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    //Busqueda de Usuario
    public function getUsers(string $search = null)//do tipo string, $search pode ser null.
    {
      $users= $this->where(function($query) use ($search){
        if($search){
            $query->where('email', $search);
            $query->orWhere('name', 'LIKE', "%{$search}%");
        }
      })->paginate(5);  

     return $users;
    }

        //POST 
    public function posts()
    {
        return $this->hasMany(Post::class);//relacionamento de um usuario para muitos post, llamado de la Post::class.
    }

    //Teams
    public function teams()
    {
        return $this->belongsToMany(Team::class);//Relacionamento de varios para varios
    }
}
