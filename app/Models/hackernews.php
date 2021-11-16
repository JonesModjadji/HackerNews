<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hackernews extends Model
{
    use HasFactory;
    protected $fillable=['by','descendants','id','kids','score','time','title','type','url'];
}
