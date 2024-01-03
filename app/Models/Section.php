<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Section extends Model
{
    use HasFactory;
    use AsSource;

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    protected $fillable = ['title'];
}
