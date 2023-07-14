<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class Task extends Model
{
    use HasFactory;

    public function timesheetEntries()
    {
        return $this->hasMany(TimesheetEntry::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    protected $fillable = ['task','module_id','time'];
}
