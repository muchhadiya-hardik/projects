<?php

namespace App\Models;

use App\Notifications\VerifyEmailQueued;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    use HasFactory,HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function sendAdminEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailQueued);
    }

}
