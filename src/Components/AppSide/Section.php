<?php

namespace XtendLunar\Features\SidebarMenu\Components\AppSide;

use Illuminate\View\Component;
use Lunar\Hub\Menu\MenuSection;
use Lunar\Hub\Menu\MenuGroup as Group;

class Section extends Component
{
    public function __construct(
        public MenuSection $section,
        public Group $group,
        public $current = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('adminhub::components.menus.app-side.section');
    }
}
