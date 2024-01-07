<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class GetNewsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'news' => News::where('status', 'consideration')->latest()->paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Новости от пользователей';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
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
                    $imagePath = asset('storage/images/news/' . $news->path_image);
                    return "<img src='{$imagePath}' alt='sample' class='w-50'>";
                }),
                TD::make('author', 'Автор'),
                TD::make('email', 'Email'),
                TD::make('phone', 'Телефон'),
                TD::make('title', 'Заголовок'),
                TD::make('description', 'Описание новости')->width(300),
                TD::make('id', 'Изменить')
                    ->render(function (News $news) {
                        return Link::make('Рассмотреть')->route('platform.get_news.edit', $news);
                    }),

            ]),
        ];
    }
}
