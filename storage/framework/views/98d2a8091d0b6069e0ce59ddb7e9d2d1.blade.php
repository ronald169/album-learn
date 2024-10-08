    <div x-data="{ focused: false, selection: @entangle($attributes->wire('model')) }">
        <div
            @click.outside = "clear()"
            @keyup.esc = "clear()"

            x-data="{
                options: {{ json_encode($options) }},
                isSingle: {{ json_encode($single) }},
                isSearchable: {{ json_encode($searchable) }},
                isReadonly: {{ json_encode($isReadonly()) }},
                isDisabled: {{ json_encode($isDisabled()) }},
                isRequired: {{ json_encode($isRequired()) }},
                minChars: {{ $minChars }},

                init() {
                    // Fix weird issue when navigating back
                    document.addEventListener('livewire:navigating', () => {
                        let elements = document.querySelectorAll('.mary-choices-element');
                        elements.forEach(el =>  el.remove());
                    });
                },
                get selectedOptions() {
                    return this.isSingle
                        ? this.options.filter(i => i.{{ $optionValue }} == this.selection)
                        : this.selection.map(i => this.options.filter(o => o.{{ $optionValue }} == i)[0])
                },
                get noResults() {
                    if (!this.isSearchable || this.$refs.searchInput.value == '') {
                        return false
                    }

                    return this.isSingle
                            ? (this.selection && this.options.length  == 1) || (!this.selection && this.options.length == 0)
                            : this.options.length <= this.selection.length
                },
                get isAllSelected() {
                    return this.options.length == this.selection.length
                },
                get isSelectionEmpty() {
                    return this.isSingle
                        ? this.selection == null || this.selection == ''
                        : this.selection.length == 0
                },
                selectAll() {
                    this.selection = this.options.map(i => i.{{ $optionValue }})
                },
                clear() {
                    this.focused = false;
                    this.$refs.searchInput.value = ''
                },
                reset() {
                    this.clear();
                    this.isSingle
                        ? this.selection = null
                        : this.selection = []

                    this.dispatchChangeEvent({ value: this.selection})
                },
                focus() {
                    if (this.isReadonly || this.isDisabled) {
                        return
                    }

                    this.focused = true
                    this.$refs.searchInput.focus()
                },
                isActive(id) {
                    return this.isSingle
                        ? this.selection == id
                        : this.selection.includes(id)
                },
                toggle(id) {
                    if (this.isReadonly || this.isDisabled) {
                        return
                    }

                    if (this.isSingle) {
                        this.selection = id
                        this.focused = false
                    } else {
                        this.selection.includes(id)
                            ? this.selection = this.selection.filter(i => i != id)
                            : this.selection.push(id)
                    }

                    this.dispatchChangeEvent({ value: this.selection })

                    this.$refs.searchInput.value = ''
                    this.$refs.searchInput.focus()
                },
                search(value) {
                    if (value.length < this.minChars) {
                        return
                    }

                    // Call search function from parent component
                    // `search(value)` or `search(value, extra1, extra2 ...)`
                    @this.{{ str_contains($searchFunction, '(')
                              ? preg_replace('/\((.*?)\)/', '(value, $1)', $searchFunction)
                              : $searchFunction . '(value)'
                            }}
                },
                dispatchChangeEvent(detail) {
                    this.$refs.searchInput.dispatchEvent(new CustomEvent('change-selection', { bubbles: true, detail }))
                }
            }"
        >
            <!-- STANDARD LABEL -->
            @if($label)
                <label for="{{ $uuid }}" class="pt-0 label label-text font-semibold">
                    <span>
                        {{ $label }}

                        @if($attributes->get('required'))
                            <span class="text-error">*</span>
                        @endif
                    </span>
                </label>
            @endif

            <!-- PREPEND/APPEND CONTAINER -->
            @if($prepend || $append)
                <div class="flex">
            @endif

            <!-- PREPEND -->
            @if($prepend)
                <div class="rounded-s-lg flex items-center bg-base-200">
                    {{ $prepend }}
                </div>
            @endif

            <!-- SELECTED OPTIONS + SEARCH INPUT -->
            <div
                @click="focus()"
                x-ref="container"

                {{
                    $attributes->except(['wire:model', 'wire:model.live'])->class([
                        "select select-bordered select-primary w-full h-fit pe-16 pb-1 pt-1.5 inline-block cursor-pointer relative flex-1",
                        'border border-dashed' => $isReadonly(),
                        'select-error' => $errors->has($errorFieldName()),
                        'rounded-s-none' => $prepend,
                        'rounded-e-none' => $append,
                        'ps-10' => $icon,
                    ])
                }}
            >
                <!-- ICON  -->
                @if($icon)
                    <x-mary-icon :name="$icon" class="absolute top-1/2 -translate-y-1/2 start-3 text-gray-400 pointer-events-none" />
                @endif

                <!-- CLEAR ICON  -->
                @if(! $isReadonly() && ! $isDisabled())
                    <x-mary-icon @click="reset()"  name="o-x-mark" x-show="!isSelectionEmpty" class="absolute top-1/2 end-8 -translate-y-1/2 cursor-pointer text-gray-400 hover:text-gray-600" />
                @endif

                <!-- SELECTED OPTIONS -->
                <span wire:key="selected-options-{{ $uuid }}">
                    @if($compact)
                        <div class="bg-primary/5 text-primary hover:bg-primary/10 dark:bg-primary/20 dark:hover:bg-primary/40 dark:text-inherit px-2 me-2 mt-0.5 mb-1.5 last:me-0 rounded inline-block cursor-pointer">
                            <span class="font-black" x-text="selectedOptions.length"></span> {{ $compactText }}
                        </div>
                    @else
                        <template x-for="(option, index) in selectedOptions" :key="index">
                            <div class="mary-choices-element bg-primary/5 text-primary hover:bg-primary/10 dark:bg-primary/20 dark:hover:bg-primary/40 dark:text-inherit px-2 me-2 mt-0.5 mb-1.5 last:me-0 inline-block rounded cursor-pointer">
                                <!-- SELECTION SLOT -->
                                 @if($selection)
                                    <span x-html="document.getElementById('selection-{{ $uuid . '-\' + option.'. $optionValue }}).innerHTML"></span>
                                 @else
                                    <span x-text="option.{{ $optionLabel }}"></span>
                                 @endif

                                <x-mary-icon @click="toggle(option.{{ $optionValue }})" x-show="!isReadonly && !isDisabled && !isSingle" name="o-x-mark" class="text-gray-500 hover:text-red-500" />
                            </div>
                        </template>
                    @endif
                </span>

                &nbsp;

                <!-- INPUT SEARCH -->
                <input
                    id="{{ $uuid }}"
                    x-ref="searchInput"
                    @input="focus()"
                    :required="isRequired && isSelectionEmpty"
                    :readonly="isReadonly || isDisabled || ! isSearchable"
                    :class="(isReadonly || isDisabled || !isSearchable || !focused) && '!w-1'"
                    class="outline-none mt-0.5 bg-transparent w-20"

                    @if($searchable)
                        @keydown.debounce.{{ $debounce }}="search($el.value)"
                    @endif
                 />
            </div>

            <!-- APPEND -->
            @if($append)
                <div class="rounded-e-lg flex items-center bg-base-200">
                    {{ $append }}
                </div>
            @endif

            <!-- END: APPEND/PREPEND CONTAINER  -->
            @if($prepend || $append)
                </div>
            @endif

            <!-- OPTIONS LIST -->
            <div x-show="focused" class="relative" wire:key="options-list-main-{{ $uuid }}">
                <div wire:key="options-list-{{ $uuid }}" class="{{ $height }} w-full absolute z-10 shadow-xl bg-base-100 border border-base-300 rounded-lg cursor-pointer overflow-y-auto" x-anchor.bottom-start="$refs.container">

                    <!-- PROGRESS -->
                    <progress wire:loading wire:target="{{ preg_replace('/\((.*?)\)/', '', $searchFunction) }}" class="progress absolute progress-primary top-0 h-0.5"></progress>

                   <!-- SELECT ALL -->
                   @if($allowAll)
                       <div
                            wire:key="allow-all-{{ rand() }}"
                            class="font-bold   border border-s-4 border-b-base-200 hover:bg-base-200"
                       >
                            <div x-show="!isAllSelected" @click="selectAll()" class="p-3 underline decoration-wavy decoration-info">{{ $allowAllText }}</div>
                            <div x-show="isAllSelected" @click="reset()" class="p-3 underline decoration-wavy decoration-error">{{ $removeAllText }}</div>
                       </div>
                   @endif

                    <!-- NO RESULTS -->
                    <div
                        x-show="noResults"
                        wire:key="no-results-{{ rand() }}"
                        class="p-3 decoration-wavy decoration-warning underline font-bold border border-s-4 border-s-warning border-b-base-200"
                    >
                        {{ $noResultText }}
                    </div>

                    @foreach($options as $option)
                        <div
                            wire:key="option-{{ data_get($option, $optionValue) }}"
                            @click="toggle({{ $getOptionValue($option) }})"
                            :class="isActive({{ $getOptionValue($option) }}) && 'border-s-4 border-s-primary'"
                            class="border-s-4"
                        >
                            <!-- ITEM SLOT -->
                            @if($item)
                                {{ $item($option) }}
                            @else
                                <x-mary-list-item :item="$option" :value="$optionLabel" :sub-value="$optionSubLabel" :avatar="$optionAvatar" />
                            @endif

                            <!-- SELECTION SLOT -->
                            @if($selection)
                                <span id="selection-{{ $uuid }}-{{ data_get($option, $optionValue) }}" class="hidden">
                                    {{ $selection($option) }}
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ERROR -->
            @if(!$omitError && $errors->has($errorFieldName()))
                @foreach($errors->get($errorFieldName()) as $message)
                    @foreach(Arr::wrap($message) as $line)
                        <div class="{{ $errorClass }}" x-classes="text-red-500 label-text-alt p-1">{{ $line }}</div>
                        @break($firstErrorOnly)
                    @endforeach
                    @break($firstErrorOnly)
                @endforeach
            @endif

            <!-- HINT -->
            @if($hint)
                <div class="label-text-alt text-gray-400 p-1 pb-0">{{ $hint }}</div>
            @endif
        </div>
    </div>