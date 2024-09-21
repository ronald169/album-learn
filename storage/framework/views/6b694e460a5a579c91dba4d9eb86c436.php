    <div x-data="{ focused: false, selection: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?> }">
        <div
            @click.outside = "clear()"
            @keyup.esc = "clear()"

            x-data="{
                options: <?php echo e(json_encode($options)); ?>,
                isSingle: <?php echo e(json_encode($single)); ?>,
                isSearchable: <?php echo e(json_encode($searchable)); ?>,
                isReadonly: <?php echo e(json_encode($isReadonly())); ?>,
                isDisabled: <?php echo e(json_encode($isDisabled())); ?>,
                isRequired: <?php echo e(json_encode($isRequired())); ?>,
                minChars: <?php echo e($minChars); ?>,

                init() {
                    // Fix weird issue when navigating back
                    document.addEventListener('livewire:navigating', () => {
                        let elements = document.querySelectorAll('.mary-choices-element');
                        elements.forEach(el =>  el.remove());
                    });
                },
                get selectedOptions() {
                    return this.isSingle
                        ? this.options.filter(i => i.<?php echo e($optionValue); ?> == this.selection)
                        : this.selection.map(i => this.options.filter(o => o.<?php echo e($optionValue); ?> == i)[0])
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
                    this.selection = this.options.map(i => i.<?php echo e($optionValue); ?>)
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
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').<?php echo e(str_contains($searchFunction, '(')
                              ? preg_replace('/\((.*?)\)/', '(value, $1)', $searchFunction)
                              : $searchFunction . '(value)'); ?>

                },
                dispatchChangeEvent(detail) {
                    this.$refs.searchInput.dispatchEvent(new CustomEvent('change-selection', { bubbles: true, detail }))
                }
            }"
        >
            <!-- STANDARD LABEL -->
            <!--[if BLOCK]><![endif]--><?php if($label): ?>
                <label for="<?php echo e($uuid); ?>" class="pt-0 label label-text font-semibold">
                    <span>
                        <?php echo e($label); ?>


                        <!--[if BLOCK]><![endif]--><?php if($attributes->get('required')): ?>
                            <span class="text-error">*</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </span>
                </label>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- PREPEND/APPEND CONTAINER -->
            <!--[if BLOCK]><![endif]--><?php if($prepend || $append): ?>
                <div class="flex">
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- PREPEND -->
            <!--[if BLOCK]><![endif]--><?php if($prepend): ?>
                <div class="rounded-s-lg flex items-center bg-base-200">
                    <?php echo e($prepend); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- SELECTED OPTIONS + SEARCH INPUT -->
            <div
                @click="focus()"
                x-ref="container"

                <?php echo e($attributes->except(['wire:model', 'wire:model.live'])->class([
                        "select select-bordered select-primary w-full h-fit pe-16 pb-1 pt-1.5 inline-block cursor-pointer relative flex-1",
                        'border border-dashed' => $isReadonly(),
                        'select-error' => $errors->has($errorFieldName()),
                        'rounded-s-none' => $prepend,
                        'rounded-e-none' => $append,
                        'ps-10' => $icon,
                    ])); ?>

            >
                <!-- ICON  -->
                <!--[if BLOCK]><![endif]--><?php if($icon): ?>
                    <?php if (isset($component)) { $__componentOriginalce0070e6ae017cca68172d0230e44821 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce0070e6ae017cca68172d0230e44821 = $attributes; } ?>
<?php $component = Mary\View\Components\Icon::resolve(['name' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mary-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'absolute top-1/2 -translate-y-1/2 start-3 text-gray-400 pointer-events-none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce0070e6ae017cca68172d0230e44821)): ?>
<?php $attributes = $__attributesOriginalce0070e6ae017cca68172d0230e44821; ?>
<?php unset($__attributesOriginalce0070e6ae017cca68172d0230e44821); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce0070e6ae017cca68172d0230e44821)): ?>
<?php $component = $__componentOriginalce0070e6ae017cca68172d0230e44821; ?>
<?php unset($__componentOriginalce0070e6ae017cca68172d0230e44821); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- CLEAR ICON  -->
                <!--[if BLOCK]><![endif]--><?php if(! $isReadonly() && ! $isDisabled()): ?>
                    <?php if (isset($component)) { $__componentOriginalce0070e6ae017cca68172d0230e44821 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce0070e6ae017cca68172d0230e44821 = $attributes; } ?>
<?php $component = Mary\View\Components\Icon::resolve(['name' => 'o-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mary-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'reset()','x-show' => '!isSelectionEmpty','class' => 'absolute top-1/2 end-8 -translate-y-1/2 cursor-pointer text-gray-400 hover:text-gray-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce0070e6ae017cca68172d0230e44821)): ?>
<?php $attributes = $__attributesOriginalce0070e6ae017cca68172d0230e44821; ?>
<?php unset($__attributesOriginalce0070e6ae017cca68172d0230e44821); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce0070e6ae017cca68172d0230e44821)): ?>
<?php $component = $__componentOriginalce0070e6ae017cca68172d0230e44821; ?>
<?php unset($__componentOriginalce0070e6ae017cca68172d0230e44821); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- SELECTED OPTIONS -->
                <span wire:key="selected-options-<?php echo e($uuid); ?>">
                    <!--[if BLOCK]><![endif]--><?php if($compact): ?>
                        <div class="bg-primary/5 text-primary hover:bg-primary/10 dark:bg-primary/20 dark:hover:bg-primary/40 dark:text-inherit px-2 me-2 mt-0.5 mb-1.5 last:me-0 rounded inline-block cursor-pointer">
                            <span class="font-black" x-text="selectedOptions.length"></span> <?php echo e($compactText); ?>

                        </div>
                    <?php else: ?>
                        <template x-for="(option, index) in selectedOptions" :key="index">
                            <div class="mary-choices-element bg-primary/5 text-primary hover:bg-primary/10 dark:bg-primary/20 dark:hover:bg-primary/40 dark:text-inherit px-2 me-2 mt-0.5 mb-1.5 last:me-0 inline-block rounded cursor-pointer">
                                <!-- SELECTION SLOT -->
                                 <!--[if BLOCK]><![endif]--><?php if($selection): ?>
                                    <span x-html="document.getElementById('selection-<?php echo e($uuid . '-\' + option.'. $optionValue); ?>).innerHTML"></span>
                                 <?php else: ?>
                                    <span x-text="option.<?php echo e($optionLabel); ?>"></span>
                                 <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <?php if (isset($component)) { $__componentOriginalce0070e6ae017cca68172d0230e44821 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce0070e6ae017cca68172d0230e44821 = $attributes; } ?>
<?php $component = Mary\View\Components\Icon::resolve(['name' => 'o-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mary-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'toggle(option.'.e($optionValue).')','x-show' => '!isReadonly && !isDisabled && !isSingle','class' => 'text-gray-500 hover:text-red-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce0070e6ae017cca68172d0230e44821)): ?>
<?php $attributes = $__attributesOriginalce0070e6ae017cca68172d0230e44821; ?>
<?php unset($__attributesOriginalce0070e6ae017cca68172d0230e44821); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce0070e6ae017cca68172d0230e44821)): ?>
<?php $component = $__componentOriginalce0070e6ae017cca68172d0230e44821; ?>
<?php unset($__componentOriginalce0070e6ae017cca68172d0230e44821); ?>
<?php endif; ?>
                            </div>
                        </template>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </span>

                &nbsp;

                <!-- INPUT SEARCH -->
                <input
                    id="<?php echo e($uuid); ?>"
                    x-ref="searchInput"
                    @input="focus()"
                    :required="isRequired && isSelectionEmpty"
                    :readonly="isReadonly || isDisabled || ! isSearchable"
                    :class="(isReadonly || isDisabled || !isSearchable || !focused) && '!w-1'"
                    class="outline-none mt-0.5 bg-transparent w-20"

                    <?php if($searchable): ?>
                        @keydown.debounce.<?php echo e($debounce); ?>="search($el.value)"
                    <?php endif; ?>
                 />
            </div>

            <!-- APPEND -->
            <!--[if BLOCK]><![endif]--><?php if($append): ?>
                <div class="rounded-e-lg flex items-center bg-base-200">
                    <?php echo e($append); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- END: APPEND/PREPEND CONTAINER  -->
            <!--[if BLOCK]><![endif]--><?php if($prepend || $append): ?>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- OPTIONS LIST -->
            <div x-show="focused" class="relative" wire:key="options-list-main-<?php echo e($uuid); ?>">
                <div wire:key="options-list-<?php echo e($uuid); ?>" class="<?php echo e($height); ?> w-full absolute z-10 shadow-xl bg-base-100 border border-base-300 rounded-lg cursor-pointer overflow-y-auto" x-anchor.bottom-start="$refs.container">

                    <!-- PROGRESS -->
                    <progress wire:loading wire:target="<?php echo e(preg_replace('/\((.*?)\)/', '', $searchFunction)); ?>" class="progress absolute progress-primary top-0 h-0.5"></progress>

                   <!-- SELECT ALL -->
                   <!--[if BLOCK]><![endif]--><?php if($allowAll): ?>
                       <div
                            wire:key="allow-all-<?php echo e(rand()); ?>"
                            class="font-bold   border border-s-4 border-b-base-200 hover:bg-base-200"
                       >
                            <div x-show="!isAllSelected" @click="selectAll()" class="p-3 underline decoration-wavy decoration-info"><?php echo e($allowAllText); ?></div>
                            <div x-show="isAllSelected" @click="reset()" class="p-3 underline decoration-wavy decoration-error"><?php echo e($removeAllText); ?></div>
                       </div>
                   <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- NO RESULTS -->
                    <div
                        x-show="noResults"
                        wire:key="no-results-<?php echo e(rand()); ?>"
                        class="p-3 decoration-wavy decoration-warning underline font-bold border border-s-4 border-s-warning border-b-base-200"
                    >
                        <?php echo e($noResultText); ?>

                    </div>

                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            wire:key="option-<?php echo e(data_get($option, $optionValue)); ?>"
                            @click="toggle(<?php echo e($getOptionValue($option)); ?>)"
                            :class="isActive(<?php echo e($getOptionValue($option)); ?>) && 'border-s-4 border-s-primary'"
                            class="border-s-4"
                        >
                            <!-- ITEM SLOT -->
                            <!--[if BLOCK]><![endif]--><?php if($item): ?>
                                <?php echo e($item($option)); ?>

                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginal8653fe0e2b5ee7b7ab3811c66ab90418 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8653fe0e2b5ee7b7ab3811c66ab90418 = $attributes; } ?>
<?php $component = Mary\View\Components\ListItem::resolve(['item' => $option,'value' => $optionLabel,'subValue' => $optionSubLabel,'avatar' => $optionAvatar] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mary-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\ListItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8653fe0e2b5ee7b7ab3811c66ab90418)): ?>
<?php $attributes = $__attributesOriginal8653fe0e2b5ee7b7ab3811c66ab90418; ?>
<?php unset($__attributesOriginal8653fe0e2b5ee7b7ab3811c66ab90418); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8653fe0e2b5ee7b7ab3811c66ab90418)): ?>
<?php $component = $__componentOriginal8653fe0e2b5ee7b7ab3811c66ab90418; ?>
<?php unset($__componentOriginal8653fe0e2b5ee7b7ab3811c66ab90418); ?>
<?php endif; ?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <!-- SELECTION SLOT -->
                            <!--[if BLOCK]><![endif]--><?php if($selection): ?>
                                <span id="selection-<?php echo e($uuid); ?>-<?php echo e(data_get($option, $optionValue)); ?>" class="hidden">
                                    <?php echo e($selection($option)); ?>

                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>

            <!-- ERROR -->
            <!--[if BLOCK]><![endif]--><?php if(!$omitError && $errors->has($errorFieldName())): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $errors->get($errorFieldName()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = Arr::wrap($message); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="<?php echo e($errorClass); ?>" x-classes="text-red-500 label-text-alt p-1"><?php echo e($line); ?></div>
                        <?php if($firstErrorOnly) break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php if($firstErrorOnly) break; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!-- HINT -->
            <!--[if BLOCK]><![endif]--><?php if($hint): ?>
                <div class="label-text-alt text-gray-400 p-1 pb-0"><?php echo e($hint); ?></div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div><?php /**PATH C:\laragon\www\album\storage\framework\views/98d2a8091d0b6069e0ce59ddb7e9d2d1.blade.php ENDPATH**/ ?>