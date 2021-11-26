<?php

namespace App\Models;

use App\Http\Query\Filters\Name;
use App\Http\Query\Filters\Email;
use App\Http\Query\Filters\Latest;
use App\Http\Query\Filters\Oldest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pipeline\Pipeline;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAll()
    {
        return app(Pipeline::class)
            ->send(User::query())
            ->through([
                Name::class,
                Email::class,
                Latest::class,
                Oldest::class
            ])
            ->thenReturn()
            ->paginate(4)
            ->withQueryString();
    }
}
