<?php

namespace App\Orchid\Screens\LawInTime;

use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use App\Models\legalEducationContent;
class legalEducationContents extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'legalEducation' => legalEducationContent::all()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Юридическое образование(контент)';
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

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Quill::make('description')->title('Описание секции'),
                Button::make('Добавить контент или изменить существующий')->method('create_content'),
            ]),
        ];
    }


    public function create_content(legalEducationContent $legalEducation, Request $request)
    {
        $existingContent = $legalEducation::all();

        if ($existingContent->isNotEmpty()) {
            // Если контент уже существует, обновляем его
            foreach ($existingContent as $content) {
                $content->description = $request->input('description');
                $content->save();
            }
            Alert::success('Контент успешно обновлен');
        } else {
            // Если контент не существует, создаем новый
            $newContent = new legalEducationContent();
            $newContent->description = $request->input('description');
            $newContent->save();
            Alert::success('Контент успешно добавлен');
        }
    }
}
