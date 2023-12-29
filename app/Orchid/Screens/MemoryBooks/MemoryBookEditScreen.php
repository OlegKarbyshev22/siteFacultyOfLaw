<?php

namespace App\Orchid\Screens\MemoryBook;

use App\Models\MemorialBook;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class MemoryBookEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $memorybook;
    public function query(MemorialBook $memorybook): iterable
    {
        return [
            'memorybook' => $memorybook
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Изменить';
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
                Input::make('first_name')->title('Имя'),
                Input::make('last_name')->title('Фамилия'),
                Input::make('patronymic')->title('Отчество'),
                TextArea::make('description')->title('Краткое описание'),
                Input::make('path_image')->type('file')->title("Прикрепить изображение"),
                Button::make('Обновить')->method('update'),
            ]),
        ];
    }

    public function update(MemorialBook $memorybook, Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $patronymic = $request->input('patronymic');
        $description = $request->input('description');
        if ($first_name != null)
        {
            $memorybook->update(['first_name' => $request->input('first_name')]);
        }
        if ($last_name != null)
        {
            $memorybook->update(['last_name' => $request->input('last_name')]);
        }
        if ($patronymic != null)
        {
            $memorybook->update(['patronymic' => $request->input('patronymic')]);
        }
        if ($description != null)
        {
            $memorybook->update(['description' => $request->input('description')]);
        }
        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/memorial_book/', $filename);
            $memorybook->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.memory_book');
    }

    public function remove(MemorialBook $memorybook)
    {
        $memorybook->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.memory_book');
    }
}