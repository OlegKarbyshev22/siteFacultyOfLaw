<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

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
            'news' => News::where('status', 'approved')->latest()->paginate(10)
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
                    $imagePath = secure_asset('storage/images/news/' . $news->path_image);
                    return "<img src='{$imagePath}' alt='sample' class='w-50'>";
                }),


                TD::make('author', 'Автор'),
                TD::make('email', 'Email'),
                TD::make('phone', 'Телефон'),
                TD::make('title', 'Заголовок'),
                TD::make('description', 'Описание новости')->width(300),
                TD::make('id', 'Изменить')
                    ->render(function (News $news) {
                        return Link::make('Изменить')->route('platform.news.edit', $news);
                    }),
            ]),

        ];
    }



}


