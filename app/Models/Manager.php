<?php

namespace App\Models;

use Database\Factories\ManagerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manager extends Model
{
    /** @use HasFactory<ManagerFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'manager_id');
    }
}
