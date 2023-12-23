<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
class News extends Model
{
    use HasFactory;
    use AsSource;



    protected $fillable = [
        'author',
        'email',
        'phone',
        'description',
        'path_image',
        'status'
    ];
}


