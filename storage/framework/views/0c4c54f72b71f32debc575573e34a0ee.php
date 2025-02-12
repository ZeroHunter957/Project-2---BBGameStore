
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
                <li>
                    <a href="#!" data-filter=".adv">Mouse</a>
                </li>
                <li>
                    <a href="#!" data-filter=".str">Keyboard</a>
                </li>
                <li>
                    <a href="#!" data-filter=".rac">Controller</a>
                </li>
            </ul>

            
            <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row trending-box">
                    <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
                        <div class="item">
                            <div class="thumb">
                                <a href="product-details.html"><img src=<?php echo e($item->image); ?> alt="image"></a>
                                <span class="price"><?php echo e($item->price); ?></span>
                            </div>
                            <div class="down-content">
                                <span class="category"><?php echo e($item->category->name); ?></span>
                                <h4><?php echo e($item->name); ?></h4>
                                <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Netbeans\laravel\Project2\resources\views/accessory/shop.blade.php ENDPATH**/ ?>