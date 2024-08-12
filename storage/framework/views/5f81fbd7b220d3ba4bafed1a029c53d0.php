        <div>
            <label for="<?php echo e($uuid); ?>" class="flex gap-3 items-center cursor-pointer">
                <!--[if BLOCK]><![endif]--><?php if($right): ?>
                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(["flex-1" => !$tight]); ?>">
                        <?php echo e($label); ?>

                    </span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <input
                    type="checkbox"
                    <?php echo e($attributes->whereDoesntStartWith('class')); ?>

                    <?php echo e($attributes->merge(["id" => $uuid])->class(['checkbox checkbox-primary'])); ?>  />

                <!--[if BLOCK]><![endif]--><?php if(!$right): ?>
                    <?php echo e($label); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </label>

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
                <div class="label-text-alt text-gray-400 py-1 pb-0"><?php echo e($hint); ?></div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div><?php /**PATH C:\laragon\www\album\storage\framework\views/340a344b70779365884830eb1a22e5e7.blade.php ENDPATH**/ ?>