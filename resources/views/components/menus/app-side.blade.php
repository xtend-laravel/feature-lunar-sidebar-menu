<div class="overflow-y-auto h-full bg-gradient-to-l from-blue-700 to-blue-900 z-50" data-ref="layout-sidemenu">
    <div class="border-t border-gray-100 pt-4 p-0">
        <div class="w-60">
            <a href="{{ route('hub.index') }}" class="px-4 flex items-center">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" {{ $attributes }} alt="Logo" class="w-auto p-2" x-cloak />
            </a>
        </div>
        <x-hub::menu handle="sidebar" current="{{ request()->route()->getName() }}">
            <div class="section-items">
                @foreach ($component->items as $item)
                    <x-sidebar-menu::app-side.link
                        :menu="$menu ?? 'main'"
                        :item="$item"
                        :active="$item->isActive(
                            $component->attributes->get('current')
                        )"
                    />
                @endforeach

                @foreach ($component->groups as $group)
                    @if (count($group->getItems()) || count($group->getSections()))
                        <x-sidebar-menu::app-side.group
                            :group="$group"
                            :current="$component->attributes->get('current')"
                        />
                    @endif
                @endforeach
            </div>
        </x-hub::menu>
    </div>
</div>
