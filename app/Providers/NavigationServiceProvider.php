<?php
namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // No implementation required
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('navItems', $this->getMenuItems());
        });
    }

    /**
     * Get the menu items.
     *
     * @return array
     */
    protected function getMenuItems(): array
    {
        return array_merge(
            $this->getHomeMenuItem(),
            $this->getCategoryMenuItems(),
            $this->getPagesMenuItems()
        );
    }

    /**
     * Get the home menu item.
     *
     * @return array
     */
    protected function getHomeMenuItem(): array
    {
        return [
            [
                'label' => 'Home',
                'url' => route('home'),
                'active' => Request::is('/')
            ]
        ];
    }

    /**
     * Get the category menu items.
     *
     * @return array
     */
    protected function getCategoryMenuItems(): array
    {
        $categories = [
            ['slug' => 'sports', 'name' => 'Sports'],
            ['slug' => 'biz-econ', 'name' => 'Biz-econ'],
            ['slug' => 'education', 'name' => 'Education'],
            ['slug' => 'culture', 'name' => 'Culture'],
            ['slug' => 'entertainment', 'name' => 'Entertainment'],
            ['slug' => 'innovation', 'name' => 'Innovation'],
            ['slug' => 'international', 'name' => 'International'],
            ['slug' => 'politics', 'name' => 'Politics']
        ];

        $menuItems = [];
        foreach ($categories as $category) {
            $menuItems[] = [
                'label' => $category['name'],
                'url' => route('content.listNews', $category['slug']),
                'active' => Request::is('categories/' . $category['slug'] . '*')
            ];
        }

        return $menuItems;
    }

    /**
     * Get the about menu item.
     *
     * @return array
     */
    protected function getPagesMenuItems(): array
    {
        return [
            [
                'label' => 'About',
                'url' => route('content.page', 'about'),
                'active' => Request::is('/pages/about*')
            ]
        ];
    }
}