<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodbundlingsmodel extends Model
{
    use HasFactory;
    protected $table = 'foodusers';
    protected $fillable = ['id_menu','id_user', 'name', 'calorie', 'carb', 'fat', 'protein'];
}
