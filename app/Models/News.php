<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
class News extends Model
{
    use HasFactory;
    use AsSource;



    protected $fillable = ['title', 'author', 'email', 'phone', 'path_image', 'description', 'status'];
}


