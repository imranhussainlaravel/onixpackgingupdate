<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'status',
    ];
}
