<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'Income';
    use HasFactory;
    protected $fillable = ['Name', 'Source', 'Amount'];
    
}
