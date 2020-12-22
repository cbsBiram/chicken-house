<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function storeUser($data) {
        $data['password'] = bcrypt($data['password']);
        $data['is_admin'] = 0;

        return User::create($data);
    }

    public function allUsers() {
        return User::latest()->get();
    }

    public function findUser($id) {
        return User::find($id);
    }

    public function updateUser($data, $id) {
        $user = User::find($id);

        if ($data['password']) {
            $user->password = bcrypt($data['password']);
        }

        $user->name = $data['name'];
        $user->phone = $data['phone'];

        $user->save();

        return $user;
    }

    public function deleteUser($id) {
        User::find($id)->delete();
    }
}
