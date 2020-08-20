<?php $__env->startSection('content'); ?>
    <br/>
    <br>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

            <?php
                Session::forget('success')
            ?>
        </div>
    <?php endif; ?>
    <br/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\interview-test-wgt\resources\views/dashboard.blade.php ENDPATH**/ ?>