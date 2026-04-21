<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApps extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'role',
        'status',
        'applied_at',
        'notes',
    ];

    protected $casts = [
        'applied_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
