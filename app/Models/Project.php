<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function timheetEntries()
    {
        return $this->belongsToMany(TimesheetEntry::class);
    }

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    protected $fillable = ['project_name'];
}
