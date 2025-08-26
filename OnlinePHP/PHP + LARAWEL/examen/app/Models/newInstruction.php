<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newInstruction extends Model
{
    use HasFactory;

    protected $table = 'newInstructions';

    protected $fillable = ['uploaded_user', 'instName', 'userDescription', 'file'];
}
