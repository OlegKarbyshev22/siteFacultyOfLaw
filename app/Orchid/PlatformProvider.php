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
                ->icon('envelope-letter')
                ->route('platform.news'),
            Menu::make('Новости на рассмотрении')
                ->icon('envelope-letter')
                ->route('platform.get_news'),
            Menu::make('Герои СВО')
                ->icon('envelope-letter')
                ->route('platform.heroes'),
            Menu::make('Славные имена')
                ->icon('envelope-letter')
                ->route('platform.glorious_names'),
            Menu::make('Лица победы')
                ->icon('envelope-letter')
                ->route('platform.faces_victory'),
            Menu::make('Руководители')
                ->icon('envelope-letter')
                ->route('platform.leaderships'),
            Menu::make('Книга памяти')
                ->icon('envelope-letter')
                ->route('platform.memory_book'),
            Menu::make('Юридическое образование в контексте времени')
                ->icon('envelope-letter')
                ->route('platform.law')
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
