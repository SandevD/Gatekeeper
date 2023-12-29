<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Pktharindu\NovaPermissions\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
        'password' => 'hashed',
    ];

    public function exitPasses()
    {
        return $this->hasMany(ExitPass::class);
    }

    public function overtimes()
    {
        return $this->hasMany(Overtime::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function scopeIsAdmin()
    {
        return $this->roles->contains('id', 1);
    }

    public function scopeIsLeader()
    {
        return $this->roles->contains('id', 2);
    }

    public function scopeIsGatekeeper()
    {
        return $this->roles->contains('id', 3);
    }

    public function scopeIsStaff()
    {
        return $this->roles->contains('id', 4);
    }

    public function scopeIsHR()
    {
        return $this->roles->contains('id', 5);
    }

    public function IsGuest()
    {
        return $this->roles->contains('id', 6);
    }

    public function IsSchool()
    {
        return $this->roles->contains('id', 7);
    }
}
