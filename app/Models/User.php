<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getEmailSingle($email)
    {
        return self::where('email','=', $email)->first();
    }


    static public function getTokenSingle($remember_token)
    {
        return self::where('remember_token','=', $remember_token)->first();
    }
   
    static public function getAdmin()
    {
        return self::select('users.*')->where('user_type', '=' , 1)
                      ->orderBy('users.id','desc')
                      ->get();
    }

    
    static public function getSingle($id)
    {
        return self::where('id','=', $id)->first();
    }
}
