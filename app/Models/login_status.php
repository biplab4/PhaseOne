<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login_status extends Model
{

    use HasFactory;
    protected $filllable =[
        'email' ,
        'last_online_at',
    ];
}
