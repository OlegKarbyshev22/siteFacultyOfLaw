<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class GetNewsEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $news;

    public function query(News $news): iterable
    {
        return [
            'news' => $news,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Отредактировать, принять или удалить новость';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Отклонить')
                ->icon('trash')
                ->method('remove'),
            Button::make('Одобрить')
                ->method('accept'),
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
                Input::make('title')->title("Название новости"),
                Input::make('path_image')->type('file')->title("Прикрепить главное изображение"),
                Quill::make('description'),
                Button::make('Обновить')->method('update')
            ]),
        ];
    }

    public function update(News $news, Request $request)
    {


        $title = $request->input('title');

        $description = $request->input('description');
        if ($title != null)
        {
            $news->update(['title' => $request->input('title')]);
        }
        if ($description != null)
        {
            $news->update(['description' => $request->input('description')]);
        }

        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/news/', $filename);
            $news->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');

    }

    public function remove(News $news)
    {
        $news->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.news');
    }

    public function accept(News $news)
    {
        $news->update(['status' => 'approved']);
        Alert::info('Вы успешно одобрили новость!');
        return redirect()->route('platform.news');
    }
}
