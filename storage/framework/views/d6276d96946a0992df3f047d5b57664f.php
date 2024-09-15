<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

?>

<div>
    <?php if (isset($component)) { $__componentOriginal5a2f10112e92a9c01ae3ba423b1cc044 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a2f10112e92a9c01ae3ba423b1cc044 = $attributes; } ?>
<?php $component = Mary\View\Components\Menu::resolve(['activateByRoute' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Menu::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <!--[if BLOCK]><![endif]--><?php if($user = auth()->user()): ?>
            <?php if (isset($component)) { $__componentOriginal254139bd69d0def79ecb6c40efbc400d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal254139bd69d0def79ecb6c40efbc400d = $attributes; } ?>
<?php $component = Mary\View\Components\MenuSeparator::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuSeparator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal254139bd69d0def79ecb6c40efbc400d)): ?>
<?php $attributes = $__attributesOriginal254139bd69d0def79ecb6c40efbc400d; ?>
<?php unset($__attributesOriginal254139bd69d0def79ecb6c40efbc400d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal254139bd69d0def79ecb6c40efbc400d)): ?>
<?php $component = $__componentOriginal254139bd69d0def79ecb6c40efbc400d; ?>
<?php unset($__componentOriginal254139bd69d0def79ecb6c40efbc400d); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8653fe0e2b5ee7b7ab3811c66ab90418 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8653fe0e2b5ee7b7ab3811c66ab90418 = $attributes; } ?>
<?php $component = Mary\View\Components\ListItem::resolve(['item' => $user,'value' => 'name','subValue' => 'email','noSeparator' => true,'noHover' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\ListItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '-mx-2 !-my-2 rounded']); ?>
                     <?php $__env->slot('actions', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal602b228a887fab12f0012a3179e5b533 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal602b228a887fab12f0012a3179e5b533 = $attributes; } ?>
<?php $component = Mary\View\Components\Button::resolve(['icon' => 'o-power','tooltipLeft' => ''.e(__('Logout')).'','noWireNavigate' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'logout','class' => 'btn-circle btn-ghost btn-xs']); ?>
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
            <?php if (isset($component)) { $__componentOriginal254139bd69d0def79ecb6c40efbc400d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal254139bd69d0def79ecb6c40efbc400d = $attributes; } ?>
<?php $component = Mary\View\Components\MenuSeparator::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuSeparator::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal254139bd69d0def79ecb6c40efbc400d)): ?>
<?php $attributes = $__attributesOriginal254139bd69d0def79ecb6c40efbc400d; ?>
<?php unset($__attributesOriginal254139bd69d0def79ecb6c40efbc400d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal254139bd69d0def79ecb6c40efbc400d)): ?>
<?php $component = $__componentOriginal254139bd69d0def79ecb6c40efbc400d; ?>
<?php unset($__componentOriginal254139bd69d0def79ecb6c40efbc400d); ?>
<?php endif; ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $attributes; } ?>
<?php $component = Mary\View\Components\MenuItem::resolve(['title' => ''.e(__('Login')).'','icon' => 'o-user','link' => ''.e(route('login')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $attributes = $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $component = $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <?php if (isset($component)) { $__componentOriginald82092fa13795886cb51cb7dc7d7b48e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald82092fa13795886cb51cb7dc7d7b48e = $attributes; } ?>
<?php $component = Mary\View\Components\MenuSub::resolve(['title' => ''.e(__('Categories')).'','icon' => 'o-book-open'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-sub'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuSub::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $attributes; } ?>
<?php $component = Mary\View\Components\MenuItem::resolve(['title' => ''.e(__('All categories')).'','link' => ''.e(route('home', ['category' => 'all'])).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $attributes = $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $component = $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $attributes; } ?>
<?php $component = Mary\View\Components\MenuItem::resolve(['title' => ''.e($category->name).'','link' => ''.e(route('home', ['category' => $category->slug])).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $attributes = $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $component = $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald82092fa13795886cb51cb7dc7d7b48e)): ?>
<?php $attributes = $__attributesOriginald82092fa13795886cb51cb7dc7d7b48e; ?>
<?php unset($__attributesOriginald82092fa13795886cb51cb7dc7d7b48e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald82092fa13795886cb51cb7dc7d7b48e)): ?>
<?php $component = $__componentOriginald82092fa13795886cb51cb7dc7d7b48e; ?>
<?php unset($__componentOriginald82092fa13795886cb51cb7dc7d7b48e); ?>
<?php endif; ?>
        <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
            <?php if (isset($component)) { $__componentOriginald82092fa13795886cb51cb7dc7d7b48e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald82092fa13795886cb51cb7dc7d7b48e = $attributes; } ?>
<?php $component = Mary\View\Components\MenuSub::resolve(['title' => ''.e(__('Images')).'','icon' => 'o-photo'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-sub'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuSub::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $attributes; } ?>
<?php $component = Mary\View\Components\MenuItem::resolve(['title' => ''.e(__('Add image')).'','icon' => 'o-plus','link' => ''.e(route('images.create')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $attributes = $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $component = $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $attributes; } ?>
<?php $component = Mary\View\Components\MenuItem::resolve(['title' => ''.e(__('Add album')).'','icon' => 'o-plus','link' => ''.e(route('albums.create')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $attributes = $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $component = $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $attributes; } ?>
<?php $component = Mary\View\Components\MenuItem::resolve(['title' => ''.e(__('Manage albums')).'','icon' => 'o-archive-box','link' => ''.e(route('albums.index')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $attributes = $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $component = $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879 = $attributes; } ?>
<?php $component = Mary\View\Components\MenuItem::resolve(['title' => ''.e(__('Add album')).'','icon' => 'o-plus','link' => ''.e(route('albums.create')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\MenuItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $attributes = $__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__attributesOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879)): ?>
<?php $component = $__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879; ?>
<?php unset($__componentOriginal7c3255ff27a5c6d076ca64dbcfc1f879); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald82092fa13795886cb51cb7dc7d7b48e)): ?>
<?php $attributes = $__attributesOriginald82092fa13795886cb51cb7dc7d7b48e; ?>
<?php unset($__attributesOriginald82092fa13795886cb51cb7dc7d7b48e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald82092fa13795886cb51cb7dc7d7b48e)): ?>
<?php $component = $__componentOriginald82092fa13795886cb51cb7dc7d7b48e; ?>
<?php unset($__componentOriginald82092fa13795886cb51cb7dc7d7b48e); ?>
<?php endif; ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5a2f10112e92a9c01ae3ba423b1cc044)): ?>
<?php $attributes = $__attributesOriginal5a2f10112e92a9c01ae3ba423b1cc044; ?>
<?php unset($__attributesOriginal5a2f10112e92a9c01ae3ba423b1cc044); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a2f10112e92a9c01ae3ba423b1cc044)): ?>
<?php $component = $__componentOriginal5a2f10112e92a9c01ae3ba423b1cc044; ?>
<?php unset($__componentOriginal5a2f10112e92a9c01ae3ba423b1cc044); ?>
<?php endif; ?>
</div><?php /**PATH C:\laragon\www\album\resources\views\livewire/navigation.blade.php ENDPATH**/ ?>