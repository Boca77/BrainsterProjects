<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_banned'
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

    // public function sentRecommendations()
    // {
    //     return $this->hasMany(Recommendation::class, 'sender_id');
    // }

    // public function receivedRecommendations()
    // {
    //     return $this->hasMany(Recommendation::class, 'receiver_id');
    // }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'created_by');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'connections', 'user_id', 'friend_id');
    }

    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(Badge::class, 'user_badge_pivot', 'user_id', 'badge_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'User_id');
    }

    public function targetPreferences()
    {
        return $this->belongsToMany(TargetsPreference::class, 'users_targets', 'user_id', 'target_id');
    }

    public function topicPreferences()
    {
        return $this->belongsToMany(TopicPreference::class, 'users_topics', 'user_id', 'topic_id');
    }
}
