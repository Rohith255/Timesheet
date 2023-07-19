<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'role',
        'location',
        'mobile',
        'password',
        'provider',
        'provider_id',
        'provider_token',
        'gender',
    ];

    protected $hidden = [
        'password'
    ];

    public function timesheetEntries()
    {
        return $this->hasMany(TimesheetEntry::class);
    }
}
