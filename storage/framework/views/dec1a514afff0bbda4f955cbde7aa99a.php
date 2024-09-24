<div class="mary-table-pagination">
    <div <?php echo e($attributes->class(["border border-t-0 mb-2 border-b-base-200"])); ?>></div>
    <div class="justify-between md:flex md:flex-row w-auto md:w-full items-center overflow-y-auto pl-2 pr-2 relative">
        <!--[if BLOCK]><![endif]--><?php if($isShowable()): ?>
        <div class="flex flex-row justify-center md:justify-start mb-2 md:mb-0">
            <select id="<?php echo e($uuid); ?>" <?php if(!empty($modelName())): ?> wire:model.live="<?php echo e($modelName()); ?>" <?php endif; ?>
                    class="select select-primary select-sm flex sm:text-sm sm:leading-6 w-auto md:mr-5">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $perPageValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($option); ?>" <?php if($rows->perPage() === $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="w-full">
        <!--[if BLOCK]><![endif]--><?php if($rows instanceof LengthAwarePaginator): ?>
            <?php echo e($rows->onEachSide(1)->links(data: ['scrollTo' => false])); ?>

        <?php else: ?>
            <?php echo e($rows->links(data: ['scrollTo' => false])); ?>

        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\album\storage\framework\views/9c6a5c4fb20b78d4feaddd86e2b406a7.blade.php ENDPATH**/ ?>