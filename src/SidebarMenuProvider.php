<?php

namespace XtendLunar\Features\SidebarMenu;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use XtendLunar\Features\SidebarMenu\Components\MenuList;
use XtendLunar\Features\SidebarMenu\Livewire\Components\SidebarMenu;

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
        Livewire::component('sidebar-menu', SidebarMenu::class);
    }
}
