<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey='ide';
    protected $fillable=['ide','name','lastname','gender','idd','description','email','phone','deleted_at','img'];
}
