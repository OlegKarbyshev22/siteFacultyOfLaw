<?php

namespace App\Orchid\Screens;


use App\Models\Soldier;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use App\Orchid\Screens\HeroesEditScreen;
class HeroesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'soldiers' => Soldier::paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Герои СВО';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Добавить героя')
                ->modal('HeroesCreateModal')
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
            Layout::table('soldiers', [
                TD::make('path_image', 'Фото')->width('150')->render(function (Soldier $soldiers) {
                    $imagePath = asset('storage/images/soldiers/' . $soldiers->path_image);
                    return "<img src='{$imagePath}' alt='{$imagePath}' class='mw-100 d-block img-fluid rounded-1 w-100'>" ;
                }),
                TD::make('first_name', 'Имя'),

                TD::make('last_name', 'Фамилия'),
                TD::make('patronymic', 'Отчество'),
                TD::make('description', 'Описание')->width(300),
                TD::make('id', 'Изменить')
                    ->render(function (Soldier $soldier) {
                        return Link::make('Изменить')->route('platform.heroes.edit', $soldier);
                    }),
            ]),

            Layout::modal('HeroesCreateModal', [
                Layout::rows([
                    Input::make('first_name')->title('Имя'),
                    Input::make('last_name')->title('Фамилия'),
                    Input::make('patronymic')->title('Отчество'),
                    TextArea::make('description')->title('Краткое описание'),
                    Input::make('image')->type('file')->title("Прикрепить изображение героя")->required(),
                ]),
            ])->title('Добавить героя СВО')->applyButton('Добавить')->closeButton('Закрыть'),


        ];
    }

    public function create(Soldier $soldiers, Request $request)
    {
        $soldiers->first_name = $request->input('first_name');
        $soldiers->last_name = $request->input('last_name');
        $soldiers->patronymic = $request->input('patronymic');
        $soldiers->description = $request->input('description');
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/soldiers/', $filename);
        $soldiers->path_image = $filename;
        $soldiers->save();

        return redirect()->route('platform.heroes');
    }
}
