
<?php $__env->startSection('title', 'list page'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Accessory Shop</h3>
                    <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
                </div>
            </div>
        </div>
    </div>

    <div class="section trending">
        <div class="container">
            <ul class="trending-filter">
                <li>
                    <a class="is_active" href="#!" data-filter="*">Show All</a>
                </li>
                <?php $__currentLoopData = $accessorycates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="#!" data-filter=".adv"><?php echo e($item->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="row">
                <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <a href="<?php echo e(route('menu.accessorydetails', $item->id)); ?>"><img src=<?php echo e($item->image); ?>

                                        alt="image"></a>
                                <span class="price"><?php echo e($item->price); ?></span>
                            </div>
                            <div class="down-content">
                                <span class="category"><?php echo e($item->category->name); ?></span>
                                <h4><?php echo e($item->name); ?></h4>
                                <a href="<?php echo e(route('menu.accessorydetails', $item->id)); ?>"><i
                                        class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Netbeans\laravel\Project2\resources\views/menu/accessoryshop.blade.php ENDPATH**/ ?>