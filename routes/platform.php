<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\FacesVictory\FacesVictoryEditScreen;
use App\Orchid\Screens\FacesVictory\FacesVictoryScreen;
use App\Orchid\Screens\GloriousNames\GloriousNamesEditScreen;
use App\Orchid\Screens\GloriousNames\GloriousNamesScreen;
use App\Orchid\Screens\Heroes\HeroesEditScreen;
use App\Orchid\Screens\Heroes\HeroesScreen;
use App\Orchid\Screens\LawInTime\LawInTimeEditScreen;
use App\Orchid\Screens\LawInTime\LawInTimeScreen;
use App\Orchid\Screens\Leaderships\LeadershipsEditScreen;
use App\Orchid\Screens\Leaderships\LeadershipsScreen;
use App\Orchid\Screens\MemoryBooks\MemoryBookEditScreen;
use App\Orchid\Screens\MemoryBooks\MemoryBookScreen;
use App\Orchid\Screens\News\CreateNewsScreen;
use App\Orchid\Screens\News\GetNewsScreen;
use App\Orchid\Screens\News\NewsEditScreen;
use App\Orchid\Screens\News\NewsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

Route::screen('/news', NewsScreen::class)->name('platform.news');
Route::screen('/news/create', CreateNewsScreen::class)->name('platform.create.news');

Route::screen('/heroes_SVO', HeroesScreen::class )->name('platform.heroes');
Route::screen('/heroes_SVO/{outstandingPeople}', HeroesEditScreen::class)
    ->name('platform.heroes.edit');

Route::screen('/glorious_names', GloriousNamesScreen::class )->name('platform.glorious_names');
Route::screen('/glorious_names/{outstandingPeople}', GloriousNamesEditScreen::class)
    ->name('platform.glorious_names.edit');

Route::screen('/faces_victory', FacesVictoryScreen::class )->name('platform.faces_victory');
Route::screen('/faces_victory/{outstandingPeople}', FacesVictoryEditScreen::class)
    ->name('platform.faces_victory.edit');

Route::screen('/leaderships', LeadershipsScreen::class )->name('platform.leaderships');
Route::screen('/leaderships/{outstandingPeople}', LeadershipsEditScreen::class)
    ->name('platform.leaderships.edit');


Route::screen('/getNews', GetNewsScreen::class )->name('platform.get_news');
Route::screen('/getNews/{news}', NewsEditScreen::class)
    ->name('platform.news.edit');
//Route::screen('/getNews/accept/{news}', GetNewsScreen::class)->name('platform.news_accept');

Route::screen('/memory_book', MemoryBookScreen::class )->name('platform.memory_book');
Route::screen('/memory_book/{outstandingPeople}', MemoryBookEditScreen::class)
    ->name('platform.memory_book.edit');

Route::screen('/law_in_time', LawInTimeScreen::class )->name('platform.law');
Route::screen('/law_in_time/{lawInTime}', LawInTimeEditScreen::class)
    ->name('platform.law.edit');
