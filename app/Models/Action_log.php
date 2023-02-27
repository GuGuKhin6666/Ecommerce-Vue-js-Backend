<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action_log extends Model
{
    use HasFactory;
    protected $fillable =['ActionLog_id','user_id','post_id'];
}
