<?php

namespace App\Orchid\Screens\Posts;


use App\Models\Post;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PostEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $posts;

    public function query(Post $posts): iterable
    {
        return [
            'posts' => $posts,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Изменить новость';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Удалить')
                ->icon('trash')
                ->method('remove'),
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
                Input::make('title')->title("Название новости")->value($this->posts->title),
                Quill::make('description')->value($this->posts->description),
                Button::make('Обновить')->method('update')
            ]),
        ];
    }

    public function update(Post $posts, Request $request)
    {
        $title = $request->input('title');

        $description = $request->input('description');
        if ($title != null)
        {
            $posts->update(['title' => $request->input('title')]);
        }
        if ($description != null)
        {
            $posts->update(['description' => $request->input('description')]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.legalEducationContent');
    }

    public function remove(Post $posts)
    {
        $posts->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.legalEducationContent');
    }
}
