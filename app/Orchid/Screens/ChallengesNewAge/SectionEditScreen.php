<?php

namespace App\Orchid\Screens\ChallengesNewAge;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class SectionEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'section' => Section::all()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Изменить название секции';
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
                Input::make('title')->title('Напишите новое название секции'),
                Button::make('Обновить')->method('update'),
            ]),
        ];
    }

    public function update(Section $section, Request $request)
    {
        $title = $request->input('title');

        if ($title != null)
        {
            $section->update(['title' => $request->input('title')]);
        }

        Alert::info('Вы успешно обновили информацию');
        return redirect()->route('platform.challenges');
    }

    public function remove(Section $section)
    {
        $section->delete();
        Alert::info('Вы успешно удалили информацию');
        return redirect()->route('platform.challenges');
    }
}
