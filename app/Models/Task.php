<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class Task extends Model
{
    use HasFactory;

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }
}
