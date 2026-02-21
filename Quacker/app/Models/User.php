<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function quacks() {
        return $this->hasMany(Quack::class);
    }

    public function requacks() {
        return $this->belongsToMany(Quack::class, 'requack')->withTimestamps();
    }
    public function quavs() {
        return $this->belongsToMany(Quack::class, 'quav')->withTimestamps();
    }
    public function follows() {
        return $this->belongsToMany(User::class, 'follow')->withTimestamps();
    }

    public function getFeedAttribute() {
        $feed = $this->quacks()
        ->select( 'quacks.*', 'created_at as feed_date')
        ->union(
            $this
            ->requacks()
            ->select('quacks.*', 'requack.created_at as feed_date'))
            ->orderBy('feed_date', 'desc')
            ->get();
        return $feed;
    }
}
