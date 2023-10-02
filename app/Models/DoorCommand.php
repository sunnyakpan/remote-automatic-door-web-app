<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoorCommand extends Model
{
    // use HasFactory;
    public $table = "door_commands";
    protected $fillable = [
        'command',
        'old_command',
        'password',
        'close_password',
        'num_trial',
        'viewer_join_time',
        'admin_join_time',
        'viewer',
        'admin',
    ];

}
