    <ul {{ $attributes->class(["menu rounded-md"]) }} >
        @if($title)
            <li class="menu-title text-inherit uppercase">
                <div class="flex items-center gap-2">

                    @if($icon)
                        <x-mary-icon :name="$icon" class="w-4 h-4 inline-flex"  />
                    @endif

                    {{ $title }}
                </div>
            </li>
        @endif

        @if($separator)
            <hr class="mb-3"/>
        @endif

        {{ $slot }}
    </ul>