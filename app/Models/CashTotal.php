<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashTotal extends Model
{
    use HasFactory;
    protected $fillable = ['total','date','code','products','quantity'];
}