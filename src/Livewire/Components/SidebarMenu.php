<?php

namespace XtendLunar\Features\SidebarMenu\Livewire\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class SidebarMenu extends Component
{
    public function render(): View
    {
        return view('adminhub::livewire.components.sidebar-menu');
    }
}
