<?php

namespace App\Orchid\Screens;

use App\Models\News;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\TD;
use function Termwind\render;
use Orchid\Support\Facades\Alert;
class NewsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'news' => News::all()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Новости';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить новость')->route('platform.create.news'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('news', [
                TD::make('path_image', 'Фото')->render(function (News $news) {
                    $imagePath = asset('storage/images/' . $news->path_image);
                    return "<img src='{$imagePath}' alt='sample' class='w-50'>";
                }),


                TD::make('author', 'Автор'),
                TD::make('email', 'Email'),
                TD::make('phone', 'Телефон'),
                TD::make('description', 'Описание новости')->width(300),
                TD::make('status', 'Статус')
            ]),

        ];
    }



}


