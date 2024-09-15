<?php

use Livewire\Volt\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;
use App\Repositories\ImageRepository;

?>

<div class="relative items-center grid w-full px-5 py-5 mx-auto md:px-12 max-w-7xl">

    <div class="mb-4"><?php echo e($images->links()); ?></div>
    <div class="grid w-full grid-cols-1 gap-6 mx-auto sm:grid-cols-2 lg:grid-cols-3 gallery">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal7f194736b6f6432dc38786f292496c34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f194736b6f6432dc38786f292496c34 = $attributes; } ?>
<?php $component = Mary\View\Components\Card::resolve(['title' => '','subtitle' => ''.$image->description.'','shadow' => true,'separator' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Mary\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="flex justify-between">
                    <p wire:click="userImages(<?php echo e($image->user->id); ?>)" class="text-left" style="cursor: pointer;"><?php echo e($image->user->name); ?></p>
                    <p class="text-right"><em><?php echo e($image->created_at->isoFormat('LL')); ?></em></p>
                </div>
                 <?php $__env->slot('figure', null, []); ?> 
                    <a href="<?php echo e(asset('storage/images/' . $image->name)); ?>">
                        <img src="<?php echo e(asset('storage/thumbs/' . $image->name)); ?>" />
                    </a>
                 <?php $__env->endSlot(); ?>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div><?php /**PATH C:\laragon\www\album\resources\views\livewire/index.blade.php ENDPATH**/ ?>