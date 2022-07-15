<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fooduser extends Model
{
    use HasFactory;
    protected $table = 'foodusers';
    protected $fillable = ['name', 'calorie', 'carb', 'fat', 'protein'];
}
