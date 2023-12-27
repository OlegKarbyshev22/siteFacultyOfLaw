<?php

namespace App\Orchid\Screens;

use App\Models\LawInTime;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class LawInTimeEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $lawInTime;
    public function query(LawInTime $lawInTime): iterable
    {
        return [
            'lawInTime' => $lawInTime,
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
                Input::make('title')->title('Заголовок'),
                Input::make('path_image')->type('file')->title("Прикрепить"),
                Button::make('Обновить')->method('update'),
            ]),
        ];
    }

    public function update(LawInTime $lawInTime, Request $request)
    {
        $title = $request->input('title');

        if ($title != null)
        {
            $lawInTime->update(['title' => $request->input('title')]);
        }
        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/lawInTime/', $filename);
            $lawInTime->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.law');
    }

    public function remove(LawInTime $lawInTime)
    {
        $lawInTime->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.law');
    }
}
