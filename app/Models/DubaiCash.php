<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DubaiCash extends Model
{
    use HasFactory;

    protected $fillable=['description', 'receive', 'status', 'spend', 'user_id'];
}
