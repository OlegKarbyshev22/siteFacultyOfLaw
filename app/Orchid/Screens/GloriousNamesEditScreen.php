<?php

namespace App\Orchid\Screens;

use App\Models\Glorious_name;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class GloriousNamesEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $glorious_name;

    public function query(Glorious_name $glorious_name): iterable
    {
        return [
            'glorious_name' => $glorious_name,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Лицо победы: ' . $this->glorious_name->first_name . ' ' . $this->glorious_name->last_name . ' ' . $this->glorious_name->patronymic;
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
                Input::make('path_image')->type('file')->title("Прикрепить изображение героя"),
                Button::make('Обновить')->method('update'),
            ]),
        ];
    }

    public function update(Glorious_name $glorious_name, Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $patronymic = $request->input('patronymic');
        $description = $request->input('description');
        if ($first_name != null)
        {
            $glorious_name->update(['first_name' => $request->input('first_name')]);
        }
        if ($last_name != null)
        {
            $glorious_name->update(['last_name' => $request->input('last_name')]);
        }
        if ($patronymic != null)
        {
            $glorious_name->update(['patronymic' => $request->input('patronymic')]);
        }
        if ($description != null)
        {
            $glorious_name->update(['description' => $request->input('description')]);
        }
        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/glorious_names/', $filename);
            $glorious_name->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.glorious_names');
    }

    public function remove(Glorious_name $glorious_name)
    {
        $glorious_name->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.glorious_names');
    }
}
