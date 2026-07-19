<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiRequest extends Model
{
    protected $fillable = [
        'provider',
        'model',
        'prompt',
        'response',
        'status',
        'error_message',
        'ip_address',
        'user_agent',
    ];
}
