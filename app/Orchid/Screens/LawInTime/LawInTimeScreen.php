<?php

namespace App\Orchid\Screens\LawInTime;

use App\Models\LawInTime;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class LawInTimeScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'lawInTime' => LawInTime::latest()->paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Юридическое образование в контексте времени';
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
                ->modal('LawCreateModal')
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
            Layout::table('lawInTime', [
                TD::make('title', 'Заголовок'),
                TD::make('path_image', 'Фото')->width('150')->render(function (LawInTime $lawInTime) {
                    $imagePath = asset('storage/images/lawInTime/' . $lawInTime->path_image);
                    return "<img src='{$imagePath}' alt='{$imagePath}' class='mw-100 d-block img-fluid rounded-1 w-100'>" ;
                }),
                TD::make('id', 'Изменить')
                    ->render(function (LawInTime $lawInTime) {
                        return Link::make('Изменить')->route('platform.law.edit', $lawInTime);
                    }),
            ]),

            Layout::modal('LawCreateModal', [
                Layout::rows([
                    Input::make('title')->title('Заголовок')->required(),
                    Input::make('image')->type('file')->title("Прикрепить")->required(),
                ]),
            ])->title('Добавить')->applyButton('Добавить')->closeButton('Закрыть'),
        ];
    }

    public function create(LawInTime $lawInTime, Request $request)
    {
        $lawInTime->title = $request->input('title');
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/lawInTime/', $filename);
        $lawInTime->path_image = $filename;
        $lawInTime->save();

        return redirect()->route('platform.law');
    }
}
