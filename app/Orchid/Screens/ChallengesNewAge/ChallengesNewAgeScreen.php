<?php

namespace App\Orchid\Screens\ChallengesNewAge;
use App\Models\Content;
use App\Models\Section;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Menu;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ChallengesNewAgeScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Section $section): iterable
    {

        return [
            'section' => Section::all(),
            'content' => Content::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Вызовы нового времени';
    }

    public function description(): ?string
    {
        return 'Добавление новых секций и заполнение их контентом';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }




    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('title')->title('Название секции контента'),
                Button::make('Создать секцию')->method('create_section'),

            ]),
            Layout::rows([

                Quill::make('description')->title('Описание секции'),
                Input::make('path_image')->type('file')->title("Прикрепить изображение(необязательно"),
                Select::make('section')
                    ->fromModel(Section::class, 'title')->title('Выберите секцию'),
                Button::make('Добавить контент или изменить существующий')->method('create_content'),

            ]),
            Layout::table('section', [

                TD::make('title', 'Наименование секции'),
                TD::make('id', 'Изменить')
                    ->render(function (Section $section) {
                        return Link::make('Изменить')->route('platform.section_edit', $section);
                    }),
            ]),
            Layout::table('content', [
                TD::make('section_id', 'Название секции')
                    ->render(function (Content $content) {
                        return $content->section->title;
                }),
                TD::make('description', 'Описание')
                    ->render(function (Content $content) {
                        return $content->description;
                    })->width(600),
            ]),

        ];
    }

    public function create_section(Section $section, Request $request)
    {
        $section->title = $request->input('title');
        $section->save();
        Alert::success('Секция успешно добавлена');
    }

    public function create_content(Content $content, Request $request)
    {
        $sectionId = $request->input('section');
        $existingContent = Content::where('section_id', $sectionId)->first();
        $file = $request->file('path_image');
        $filename = $file->getClientOriginalName();
        $file->storeAs('public/images/challenges/', $filename);

        if ($existingContent) {
            // Если контент уже существует, обновляем его
            $existingContent->description = $request->input('description');
            $existingContent->path_image = $filename;
            $existingContent->save();
            Alert::success('Контент успешно обновлен');
        } else {
            // Если контент не существует, создаем новый
            $newContent = new Content();
            $newContent->section_id = $sectionId;
            $newContent->description = $request->input('description');
            $newContent->path_image = $filename;
            $newContent->save();
            Alert::success('Контент успешно добавлен');
        }
    }

}
