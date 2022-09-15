<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'age',
        'gender',
        'height',
        'weight',
        'sleep',
        'wake_up',
        'go_work',
        'go_home',
        'training_at',
        'goal',
        'supplement',
        'another_sport',
        'problems',
        'front_body',
        'back_body',
        'bill',
        'service',
        'status',
        'start',
        'end',
    ];
}
