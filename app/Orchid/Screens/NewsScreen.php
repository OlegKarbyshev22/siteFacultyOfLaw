<?php

namespace App\Orchid\Screens;

use App\Models\News;
use Orchid\Support\Facades\Layout;

use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\TD;

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
            'author'  => News::find(),
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
                TD::make('author', 'author')->width('100'),
                TD::make('email', 'email')->width('100'),
            ])
        ];
    }
}
