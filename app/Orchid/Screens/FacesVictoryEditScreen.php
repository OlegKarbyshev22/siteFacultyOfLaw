<?php

namespace App\Orchid\Screens;

use App\Models\FacesVictory;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FacesVictoryEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $facesVictory;
    public function query(FacesVictory $facesVictory): iterable
    {
        return [
            'facesVictory' => $facesVictory
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Лицо победы: ' . $this->facesVictory->first_name . ' ' . $this->facesVictory->last_name . ' ' . $this->facesVictory->patronymic;
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

    public function update(FacesVictory $facesVictory, Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $patronymic = $request->input('patronymic');
        $description = $request->input('description');
        if ($first_name != null)
        {
            $facesVictory->update(['first_name' => $request->input('first_name')]);
        }
        if ($last_name != null)
        {
            $facesVictory->update(['last_name' => $request->input('last_name')]);
        }
        if ($patronymic != null)
        {
            $facesVictory->update(['patronymic' => $request->input('patronymic')]);
        }
        if ($description != null)
        {
            $facesVictory->update(['description' => $request->input('description')]);
        }
        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/faces_of_victory/', $filename);
            $facesVictory->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.faces_victory');
    }

    public function remove(FacesVictory $facesVictory)
    {
        $facesVictory->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.faces_victory');
    }
}
