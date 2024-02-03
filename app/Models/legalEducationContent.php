<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class legalEducationContent extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = ['description'];
    protected $table = "contents_legal_education";
}
