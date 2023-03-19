<div
    @class([
        'group flex space-x-4 p-1 hover:bg-[#B8A179]',
        'justify-between items-center' => $hasSubItems
    ])
>
    <a data-group-handle="{{ $groupHandle ?? '' }}"
       href="{{ route($item->route) }}"
       @class([
           'flex items-center rounded w-full text-sm font-medium p-2 gap-2',
           'bg-blue-50 text-blue-700 active' => $active,
           'text-white' => !$active,
       ])
    >
        <span x-cloak>
            {!! $item->renderIcon('w-5 h-5') !!}
        </span>

        <span>
            {{ $item->name }}
        </span>
    </a>


    @if ($hasSubItems)
        <button x-cloak
                x-on:click.prevent="showSubMenu = !showSubMenu"
                class="text-gray-400 hover:text-gray-900 hover:bg-gray-50 p-2">
            <span :class="{ '-rotate-90': showSubMenu }"
                  class="block transition">
                <x-hub::icon ref="chevron-left"
                             class="w-3 h-3" />
            </span>
        </button>
    @endif
</div>
