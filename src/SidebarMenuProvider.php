<?php

namespace XtendLunar\Features\SidebarMenu;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use Illuminate\Support\Facades\Blade;
use Lunar\Hub\Facades\Menu;

class SidebarMenuProvider extends XtendFeatureProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'adminhub');
    }

    public function boot()
    {
        Blade::componentNamespace('XtendLunar\Features\SidebarMenu\Components', 'sidebar-menu');

        $this->setupSidebarMenuGroups();
    }

    protected function setupSidebarMenuGroups(): void
    {
        $menuGroups = collect(config('adminhub.sidebar-menu.groups', [
            'hub.catalogue' => [
                'name' => __('Shop'),
                'sections' => [
                    'hub.products' => [
                        'name' => __('Products'),
                        'handle' => 'hub.products',
                        'route' => 'hub.products.index',
                        'icon' => 'shopping-bag',
                    ],
                    'hub.brands' => [
                        'name' => __('Brands'),
                        'handle' => 'hub.brands',
                        'route' => 'hub.brands.index',
                        'icon' => 'view-grid',
                    ],
                    'hub.product-options' => [
                        'name' => __('Product Options'),
                        'handle' => 'hub.product-options',
                        'route' => 'hub.product-options.index',
                        'icon' => 'clipboard-list',
                    ],
                ],
            ],
            'hub.sales' => [
                'name' => __('Sales'),
                'sections' => [],
            ],
            'hub.configure' => [
                'name' => __('Configure'),
                'sections' => [
                    'hub.addons' => [
                        'name' => __('Addons'),
                        'handle' => 'hub.addons',
                        'route' => 'hub.addons.index',
                        'icon' => 'puzzle',
                    ],
                    'hub.api' => [
                        'name' => __('API'),
                        'handle' => 'hub.api',
                        'route' => 'hub.addons.index',
                        'icon' => 'server',
                    ],
                    'hub.builder' => [
                        'name' => __('Builder'),
                        'handle' => 'hub.builder',
                        'route' => 'hub.addons.index',
                        'icon' => 'template',
                    ],
                ],
            ],
            'hub.settings' => [
                'name' => 'Settings',
                'sections' => [
                    'hub.settings.shop' => [
                        'name' => __('Shop Settings'),
                        'handle' => 'hub.settings.shop',
                        'route' => 'hub.settings',
                    ],
                    'hub.settings.customer' => [
                        'name' => __('Customer Settings'),
                        'handle' => 'hub.settings.shop',
                        'route' => 'hub.settings',
                    ],
                    'hub.settings.sales' => [
                        'name' => __('Sales Settings'),
                        'handle' => 'hub.settings.sales',
                        'route' => 'hub.settings',
                    ],
                ],
            ],
            'hub.support' => [
                'name' => __('Support'),
                'sections' => [],
            ],
        ]));

        $menuGroups->each(function ($menuGroup, $key) {
            $group = Menu::slot('sidebar')
                ->group($key)
                ->name($menuGroup['name']);

            collect($menuGroup['sections'])->each(function ($section, $key) use ($group) {
                $group
                    ->section($key)
                    ->name($section['name'])
                    ->handle($section['handle'])
                    ->route($section['route'])
                    ->icon($section['icon'] ?? null);
            });
        });
        //
        // $slot = Menu::slot('sidebar');
        //
        // $setupGroup = $slot
        //     ->group('hub.setup')
        //     ->name(__('Setup'));
        //
        // $productGroup = $setupGroup
        //     ->section('hub.products')
        //     ->name(__('adminhub::menu.sidebar.products'))
        //     ->handle('hub.products')
        //     ->route('hub.products.index')
        //     ->icon('shopping-bag');
        //
        // $setupGroup
        //     ->section('hub.collections')
        //     ->name(__('adminhub::menu.sidebar.collections'))
        //     ->handle([
        //         'hub.collection-groups',
        //         'hub.collections',
        //     ])
        //     ->route('hub.collection-groups.index')
        //     ->icon('collection');
    }
}
