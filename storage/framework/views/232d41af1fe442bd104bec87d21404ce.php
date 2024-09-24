    <div
        x-data="{
            open:
                <?php if($modelName()->value): ?>
                    <?php if ((object) ($modelName()) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($modelName()->value()); ?>')<?php echo e($modelName()->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($modelName()); ?>')<?php endif; ?>
                <?php else: ?>
                    false
                <?php endif; ?>
            ,
            close() {
                this.open = false
                $refs.checkbox.checked = false
            }
        }"

        <?php if($closeOnEscape): ?>
            @keydown.window.escape="close()"
        <?php endif; ?>

        <?php if(!$withoutTrapFocus): ?>
            x-trap="open" x-bind:inert="!open"
        <?php endif; ?>

        class="<?php echo \Illuminate\Support\Arr::toCssClasses(["drawer absolute z-50", "drawer-end" => $right]); ?>"
    >
        <!-- Toggle visibility  -->
        <input
            id="<?php echo e($id()); ?>"
            x-model="open"
            x-ref="checkbox"
            type="checkbox"
            class="drawer-toggle" />

        <div class="drawer-side" >
            <!-- Overlay effect , click outside -->
            <label for="<?php echo e($id()); ?>" class="drawer-overlay"></label>

            <!-- Content -->
            <?php if (isset($component)) { $__componentOriginal7f194736b6f6432dc38786f292496c34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f194736b6f6432dc38786f292496c34 = $attributes; } ?>
<?php $component = Mary\View\Components\Card::resolve(['title' => $title,'subtitle' => $subtitle,'separator' => $separator] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mary-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => 'drawer-card','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->except('wire:model')->class(['min-h-screen rounded-none px-8']))]); ?>
                <!--[if BLOCK]><![endif]--><?php if($withCloseButton): ?>
                     <?php $__env->slot('menu', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal602b228a887fab12f0012a3179e5b533 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal602b228a887fab12f0012a3179e5b533 = $attributes; } ?>
<?php $component = Mary\View\Components\Button::resolve(['icon' => 'o-x-mark'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-ghost btn-sm','@click' => 'close()']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal602b228a887fab12f0012a3179e5b533)): ?>
<?php $attributes = $__attributesOriginal602b228a887fab12f0012a3179e5b533; ?>
<?php unset($__attributesOriginal602b228a887fab12f0012a3179e5b533); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal602b228a887fab12f0012a3179e5b533)): ?>
<?php $component = $__componentOriginal602b228a887fab12f0012a3179e5b533; ?>
<?php unset($__componentOriginal602b228a887fab12f0012a3179e5b533); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <?php echo e($slot); ?>


                <!--[if BLOCK]><![endif]--><?php if($actions): ?>
                     <?php $__env->slot('actions', null, []); ?> 
                        <?php echo e($actions); ?>

                     <?php $__env->endSlot(); ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f194736b6f6432dc38786f292496c34)): ?>
<?php $attributes = $__attributesOriginal7f194736b6f6432dc38786f292496c34; ?>
<?php unset($__attributesOriginal7f194736b6f6432dc38786f292496c34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f194736b6f6432dc38786f292496c34)): ?>
<?php $component = $__componentOriginal7f194736b6f6432dc38786f292496c34; ?>
<?php unset($__componentOriginal7f194736b6f6432dc38786f292496c34); ?>
<?php endif; ?>
        </div>
    </div><?php /**PATH C:\laragon\www\album\storage\framework\views/fc3265e34879f12c73cb2bd265cb446d.blade.php ENDPATH**/ ?>