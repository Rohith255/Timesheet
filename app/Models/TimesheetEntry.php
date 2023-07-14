<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class TimesheetEntry extends Model
{
    use HasFactory;

    public function developers()
    {
        return $this->belongsTo(Developer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    protected $fillable = ['date','developer_id','description','project_id','module_id','task_id','worked_time'];
}
