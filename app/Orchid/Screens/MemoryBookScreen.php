<?php

namespace App\Orchid\Screens;

use App\Models\MemorialBook;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class MemoryBookScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'memoryBooks' => MemorialBook::latest()->paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Книга памяти';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Добавить')
                ->modal('MemorialBookCreateModal')
                ->method('create')
                ->icon('full-screen'),
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
            Layout::table('memoryBooks', [
                TD::make('path_image', 'Фото')->width('150')->render(function (MemorialBook $memorialBook) {
                    $imagePath = asset('storage/images/memorial_book/' . $memorialBook->path_image);
                    return "<img src='{$imagePath}' alt='{$imagePath}' class='mw-100 d-block img-fluid rounded-1 w-100'>" ;
                }),
                TD::make('first_name', 'Имя'),
                TD::make('last_name', 'Фамилия'),
                TD::make('patronymic', 'Отчество'),
                TD::make('description', 'Описание')->width(300),
                TD::make('id', 'Изменить')
                    ->render(function (MemorialBook $memorialBook) {
                        return Link::make('Изменить')->route('platform.memory_book.edit', $memorialBook);
                    }),
            ]),

            Layout::modal('MemorialBookCreateModal', [
                Layout::rows([
                    Input::make('first_name')->title('Имя'),
                    Input::make('last_name')->title('Фамилия'),
                    Input::make('patronymic')->title('Отчество'),
                    TextArea::make('description')->title('Краткое описание'),
                    Input::make('image')->type('file')->title("Прикрепить изображение")->required(),
                ]),
            ])->title('Добавить')->applyButton('Добавить')->closeButton('Закрыть'),
        ];
    }

    public function create(MemorialBook $memorialBook, Request $request)
    {
        $memorialBook->first_name = $request->input('first_name');
        $memorialBook->last_name = $request->input('last_name');
        $memorialBook->patronymic = $request->input('patronymic');
        $memorialBook->description = $request->input('description');
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/memorial_book/', $filename);
        $memorialBook->path_image = $filename;
        $memorialBook->save();
        return redirect()->route('platform.memory_book');
    }
}
