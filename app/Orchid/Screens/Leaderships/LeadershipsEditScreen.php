<?php

namespace App\Orchid\Screens\Leaderships;

use App\Models\Leadership;
use App\Models\OutstandingPeople;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class LeadershipsEditScreen extends Screen
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
            'outstandingPeople' => $outstandingPeople
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Руководитель: ' . $this->outstandingPeople->first_name . ' ' . $this->outstandingPeople->last_name . ' ' . $this->outstandingPeople->patronymic;
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
            $file->storeAs('public/images/leaderships/', $filename);
            $outstandingPeople->update(['path_image' => $filename]);
        }
        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.leaderships');
    }

    public function remove(OutstandingPeople $outstandingPeople)
    {
        $outstandingPeople->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.leaderships');
    }
}
