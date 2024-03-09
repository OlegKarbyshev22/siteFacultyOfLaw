<?php

namespace App\Orchid\Screens\ChallengesNewAge;

use App\Models\Content;
use App\Models\Section;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
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
    public $contents;
    public function query(Content $contents): iterable
    {
        return [
            'section' => Section::all(),
            'contents' => $contents,
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
                Input::make('title')->title('Напишите новое название секции')->value($this->contents->section->title),
                Quill::make('description')->value($this->contents->description),
                Button::make('Обновить')->method('update'),
            ]),
        ];
    }

    public function update(Section $section, Content $contents, Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        if ($title != null)
        {
            $this->contents->section->update(['title' => $request->input('title')]);
        }
        if ($description != null)
        {
            $contents->update(['description' => $request->input('description')]);
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
