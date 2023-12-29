<?php

namespace App\Orchid\Screens;

use Illuminate\Http\Request;
use App\Models\Soldier;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class HeroesEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $soldier;

    public function query(Soldier $soldier): iterable
    {
        return [
            'soldier' => $soldier,

        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Герой' . ' ' . $this->soldier->first_name . ' ' . $this->soldier->last_name . ' ' . $this->soldier->patronymic;
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


    public function update(Soldier $soldier, Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $patronymic = $request->input('patronymic');
        $description = $request->input('description');
        if ($first_name != null)
        {
            $soldier->update(['first_name' => $request->input('first_name')]);
        }
        if ($last_name != null)
        {
            $soldier->update(['last_name' => $request->input('last_name')]);
        }
        if ($patronymic != null)
        {
            $soldier->update(['patronymic' => $request->input('patronymic')]);
        }
        if ($description != null)
        {
            $soldier->update(['description' => $request->input('description')]);
        }
        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/soldiers/', $filename);
            $soldier->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.heroes');
    }

    public function remove(Soldier $soldier)
    {
        $soldier->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.heroes');
    }
}
