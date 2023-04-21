<?php

namespace XtendLunar\Features\SidebarMenu\Components\AppSide;

use Illuminate\View\Component;
use Lunar\Hub\Menu\MenuLink;
use Lunar\Hub\Menu\MenuSection;

class Link extends Component
{
    public function __construct(
        public string $menu,
        public MenuLink|MenuSection $item,
        public $active = false,
        public bool $hasSubItems = false,
        public ?string $groupHandle = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminhub::components.menus.app-side.link');
    }
}
