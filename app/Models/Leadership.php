<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Leadership extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = ['first_name', 'last_name', 'patronymic', 'description', 'path_image'];
    protected $table = 'leadership';
}
