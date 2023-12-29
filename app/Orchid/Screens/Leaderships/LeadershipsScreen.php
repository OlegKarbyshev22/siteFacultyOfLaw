<?php

namespace App\Orchid\Screens;

use App\Models\Leadership;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class LeadershipsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'leadership' => Leadership::latest()->paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Руководители';
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
                ->modal('leadershipCreateModal')
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
            Layout::table('leadership', [
                TD::make('path_image', 'Фото')->width('150')->render(function (Leadership $leadership) {
                    $imagePath = asset('storage/images/leaderships/' . $leadership->path_image);
                    return "<img src='{$imagePath}' alt='{$imagePath}' class='mw-100 d-block img-fluid rounded-1 w-100'>" ;
                }),
                TD::make('first_name', 'Имя'),

                TD::make('last_name', 'Фамилия'),
                TD::make('patronymic', 'Отчество'),
                TD::make('description', 'Описание')->width(300),
                TD::make('id', 'Изменить')
                    ->render(function (Leadership $leadership) {
                        return Link::make('Изменить')->route('platform.leaderships.edit', $leadership);
                    }),
            ]),


            Layout::modal('leadershipCreateModal', [
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

    public function create(Leadership $leadership, Request $request)
    {
        $leadership->first_name = $request->input('first_name');
        $leadership->last_name = $request->input('last_name');
        $leadership->patronymic = $request->input('patronymic');
        $leadership->description = $request->input('description');
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/leaderships/', $filename);
        $leadership->path_image = $filename;
        $leadership->save();
        return redirect()->route('platform.leaderships');
    }
}
