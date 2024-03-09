<?php

namespace App\Orchid\Screens\Posts;



use App\Models\Post;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PostsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'posts' => Post::latest()->paginate(30)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Статьи';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить статью')->route('platform.create.posts'),
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
            Layout::table('posts', [
                TD::make('title', 'Заголовок статьи'),
                TD::make('id', 'Изменить')
                    ->render(function (Post $post) {
                        return Link::make('Изменить')->route('platform.post.edit', $post);
                    }),
            ]),

        ];
    }



}


