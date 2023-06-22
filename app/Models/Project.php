<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function developers()
    {
        return $this->belongsTo(Developer::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
