<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Content extends Model
{
    use HasFactory;
    use AsSource;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    protected $fillable = ['description', 'section_id'];
}
