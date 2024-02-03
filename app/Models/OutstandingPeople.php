<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class OutstandingPeople extends Model
{
    use HasFactory;
    use AsSource;

    public function alphabet()
    {
        $alphabetData = [
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И',
            'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т',
            'У', 'Ф', 'Х', 'Ц', 'Ш', 'Щ', 'Т', 'У', 'Ф', 'Э', 'Ю', 'Я'
        ];
        return $alphabetData;
    }

    public function gettingCategoryAndSearchingAlphabetically($category, $letter)
    {
        $result = OutstandingPeople::where('category', $category)->where('last_name', 'LIKE', $letter . '%')->latest()->paginate(8);
        return $result;
    }

    protected $fillable = ['first_name', 'last_name', 'patronymic', 'description', 'path_image', 'category'];
}
