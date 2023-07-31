<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function timesheetEntries()
    {
        return $this->belongsToMany(TimesheetEntry::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    protected $fillable = ['module_name','project_id'];
}
