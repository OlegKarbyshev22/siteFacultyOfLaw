<?php

namespace App\Orchid\Screens\GloriousNames;

use App\Models\Glorious_name;
use App\Models\OutstandingPeople;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class GloriousNamesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    //public $glorious_name = Glorious_name::latest()->paginate(1);
    public function query(): iterable
    {
        return [
            'outstandingPeople' => OutstandingPeople::where('category', 'gloriousName')->latest()->paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Славные имена';
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
                ->modal('gloriousNamesCreateModal')
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
            Layout::table('outstandingPeople', [
                TD::make('path_image', 'Фото')->width('150')->render(function (OutstandingPeople $outstandingPeople) {
                    $imagePath = asset('storage/images/glorious_names/' . $outstandingPeople->path_image);
                    return "<img src='{$imagePath}' alt='{$imagePath}' class='mw-100 d-block img-fluid rounded-1 w-100'>" ;
                }),
                TD::make('first_name', 'Имя'),

                TD::make('last_name', 'Фамилия'),
                TD::make('patronymic', 'Отчество'),
                TD::make('description', 'Описание')->width(300),
                TD::make('id', 'Изменить')
                    ->render(function (OutstandingPeople $outstandingPeople) {
                        return Link::make('Изменить')->route('platform.glorious_names.edit', $outstandingPeople);
                    }),
            ]),


            Layout::modal('gloriousNamesCreateModal', [
                Layout::rows([
                    Input::make('first_name')->title('Имя')->required(),
                    Input::make('last_name')->title('Фамилия')->required(),
                    Input::make('patronymic')->title('Отчество')->required(),
                    TextArea::make('description')->title('Краткое описание'),
                    Input::make('image')->type('file')->title("Прикрепить изображение")->required(),
                ]),
            ])->title('Добавить')->applyButton('Добавить')->closeButton('Закрыть'),
        ];
    }

    public function create(OutstandingPeople $outstandingPeople, Request $request)
    {
        $outstandingPeople->first_name = $request->input('first_name');
        $outstandingPeople->last_name = $request->input('last_name');
        $outstandingPeople->patronymic = $request->input('patronymic');
        $outstandingPeople->description = $request->input('description');
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/glorious_names/', $filename);
        $outstandingPeople->path_image = $filename;
        $outstandingPeople->category = "gloriousName";
        $outstandingPeople->save();
        return redirect()->route('platform.glorious_names');
    }


}
