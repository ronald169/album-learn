    <div>
        <!-- Label -->
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

        <!-- Range -->
        <input
            type="range"
            min="<?php echo e($min); ?>"
            max="<?php echo e($max); ?>"
            <?php echo e($attributes->merge(["class" => "range", "id" => $uuid])->except('label', 'hint', 'min', 'max')); ?>

        />

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
    </div><?php /**PATH C:\laragon\www\album\storage\framework\views/6a4f0d2d8f547e36720859a527765e3f.blade.php ENDPATH**/ ?>