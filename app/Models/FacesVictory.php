<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class FacesVictory extends Model
{
    use AsSource;

    protected $fillable = ['first_name', 'last_name', 'patronymic', 'description', 'path_image'];
    protected $table = 'faces_of_victory';
}
