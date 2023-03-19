<?php

namespace XtendLunar\Features\SidebarMenu\Menu;

use Lunar\Hub\Menu\SettingsMenu as LunarSettingsMenu;

class SettingsMenu extends LunarSettingsMenu
{
    protected function makeTopLevel(): static
    {
        return $this;
    }
}
