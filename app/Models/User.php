<?php

namespace App\Models;

use App\Facades\Pterodactyl;
use App\Notifications\PterodactylUserCreated;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasPterodactylUser()
    {
        return $this->pterodactyl_id !== null;
    }

    public function createPterodactylUser()
    {

        $password = Str::random();
        $user = Pterodactyl::createUser([
            'email' => $this->email,
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => $password,
        ]);

        $this->pterodactyl_id = $user['attributes']['id'];
        $this->save();

        $this->notify(new PterodactylUserCreated($password));
    }

    public function getPterodactylUser()
    {
        Pterodactyl::getUser($this->pterodactyl_id);
    }

    public function getOrCreatePterodactylUser()
    {
        if ($this->hasPterodactylUser()) {
            $user = $this->getPterodactylUser();
        } else{
            $user = $this->createPterodactylUser();
        }
        return $user;
    }
}
