<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id', 'task_name', 'creator', 'assigned_to', 'description', 'due_to', 'created_at', 'updated_at', 'task_status'];

    use HasFactory;
}
