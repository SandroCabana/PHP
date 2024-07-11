<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    protected $primaryKey='ide';
    protected $fillable=['ide','name','lastname','gender','idd','description','email','phone'];
}
