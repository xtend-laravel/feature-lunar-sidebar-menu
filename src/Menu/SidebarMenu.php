<?php

namespace XtendLunar\Features\SidebarMenu\Menu;

use Lunar\Hub\Facades\Menu;
use Lunar\Hub\Menu\MenuSlot;
use Lunar\Hub\Menu\SidebarMenu as LunarSidebarMenuMenu;

class SidebarMenu extends LunarSidebarMenuMenu
{
    protected MenuSlot $slot;

    /**
     * Make menu.
     *
     * @return void
     */
    public static function make()
    {
        (new static())
            ->addSections();
    }

    /**
     * Add our menu sections.
     *
     * @return static
     */
    protected function addSections()
    {
        $slot = Menu::slot('sidebar');
        $productGroup = $slot->group('hub.catalogue')->section('hub.products');

        // @todo - This is a hack to clear the items collection so we can define our own items from the config file
        $reflection = new \ReflectionProperty($productGroup, 'items');
        $reflection->setValue($productGroup, collect());

        return $this;
    }
}
