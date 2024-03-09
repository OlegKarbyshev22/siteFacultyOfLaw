<?php

namespace App\Orchid\Screens\GloriousNames;

use App\Models\Glorious_name;
use App\Models\OutstandingPeople;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
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
    public $outstandingPeople;

    public function query(OutstandingPeople $outstandingPeople): iterable
    {
        return [
            'outstandingPeople' => $outstandingPeople,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Лицо победы: ' . $this->outstandingPeople->first_name . ' ' . $this->outstandingPeople->last_name . ' ' . $this->outstandingPeople->patronymic;
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
                Input::make('first_name')->title('Имя')->value($this->outstandingPeople->first_name),
                Input::make('last_name')->title('Фамилия')->value($this->outstandingPeople->last_name),
                Input::make('patronymic')->title('Отчество')->value($this->outstandingPeople->patronymic),
                Quill::make('description')->title("Описание")->toolbar(["text", "color", "header", "list", "format", "media"])->value($this->outstandingPeople->description),
                Input::make('path_image')->type('file')->title("Прикрепить изображение героя"),
                Button::make('Обновить')->method('update'),
            ]),
        ];
    }

    public function update(OutstandingPeople $outstandingPeople, Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $patronymic = $request->input('patronymic');
        $description = $request->input('description');
        if ($first_name != null)
        {
            $outstandingPeople->update(['first_name' => $request->input('first_name')]);
        }
        if ($last_name != null)
        {
            $outstandingPeople->update(['last_name' => $request->input('last_name')]);
        }
        if ($patronymic != null)
        {
            $outstandingPeople->update(['patronymic' => $request->input('patronymic')]);
        }
        if ($description != null)
        {
            $outstandingPeople->update(['description' => $request->input('description')]);
        }
        if($request->hasFile('path_image')){
            $file = $request->file('path_image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/images/glorious_names/', $filename);
            $outstandingPeople->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.glorious_names');
    }

    public function remove(OutstandingPeople $outstandingPeople)
    {
        $outstandingPeople->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.glorious_names');
    }
}
