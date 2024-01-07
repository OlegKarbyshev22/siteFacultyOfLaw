<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Новости')
                ->icon('newspaper')
                ->route('platform.news'),
            Menu::make('Новости на рассмотрении')
                ->icon('newspaper')
                ->route('platform.get_news'),
            Menu::make('Герои СВО')
                ->icon('person-fill-add')
                ->route('platform.heroes'),
            Menu::make('Славные имена')
                ->icon('person-fill-add')
                ->route('platform.glorious_names'),
            Menu::make('Лица победы')
                ->icon('person-fill-add')
                ->route('platform.faces_victory'),
            Menu::make('Руководители')
                ->icon('person-fill-add')
                ->route('platform.leaderships'),
            Menu::make('Книга памяти')
                ->icon('person-fill-add')
                ->route('platform.memory_book'),
            Menu::make('Юридическое образование в контексте времени')
                ->icon('grid')
                ->route('platform.law'),
            Menu::make('Вызовы нового времени')
                ->icon('clipboard-fill')
                ->route('platform.challenges')
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
