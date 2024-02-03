<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class LawInTime extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = ['title',  'path_image'];
    protected $table = 'law_in_time';
}
