<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CreateNewsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Создание новости';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [



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
            Layout::rows([
                Input::make('news.title')->title("Название новости")->required(),
                Input::make('images')->type('file')->title("Прикрепить главное изображение")->required(),
                Quill::make('html')->title("Описание")->required(),
                //Picture::make('html'),
                //SimpleMDE::make('html'),
                Button::make('Добавить')->method('create')
            ]),
        ];
    }


    public function create(News $news, Request $request)
    {

        $news->title = $request->input('news.title');
        $file = $request->file('images');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/news/', $filename);

        $news->path_image = $filename;
        $news->description = $request->input('html');
        $news->status = "approved";

        $news->save();
        Alert::info('You have successfully created a post.');
        return redirect()->route('platform.news');
    }
}
