<?php $__env->startSection('content'); ?>
    <!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
    <header>
        <div class="page-header min-height-400" style="background-image: url('<?php echo e(asset('front/img/city-profile.jpg')); ?>');"
            loading="lazy">
            <span class="mask bg-gradient-dark opacity-8"></span>
        </div>
    </header>
	<?php echo $__env->make('taebo.partials.member-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5 mb-4 border-top border-1">
        <!-- START Blogs w/ 4 cards w/ image & text & link -->
        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-5 oswald-bold">Anggota Taebo</h3>
                    </div>
                </div>
                <div class="row">

                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="card card-profile mt-4">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                        
                                            <div class="p-3 pe-md-0">
                                                <?php if(!empty($member->photo)): ?>
                                                    <img class="w-100 border-radius-md shadow-lg"
                                                        src="<?php echo e(asset(Storage::url($member->photo))); ?>"
                                                        alt="Anggota Taebo - <?php echo e($member->nama); ?>">
                                                <?php else: ?>
                                                    <img class="w-100 border-radius-md shadow-lg"
                                                        src="<?php echo e(asset('front/img/logo-taebo.jpeg')); ?>"
                                                        alt="Anggota Taebo - <?php echo e($member->nama); ?>">
                                                <?php endif; ?>
                                            </div>
                                        
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                                        <div class="card-body ps-lg-0">
                                            <h5 class="mb-0"><?php echo e($member->nama); ?></h5>
                                            <h6 class="text-info"><?php echo e($member->member_type?->title ?? ''); ?></h6>
                                            <p class="mb-0"><?php echo e($member->geup?->title ?? ''); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
				<div class="row pt-5">
					<!-- Pagination Links -->
					<div class="col-md-12">
						<?php echo e($members->links()); ?>

					</div>				
				</div>
            </div>
        </section>
        <!-- END Testimonials w/ user image & text & info -->
    </div>


    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#top"></a></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-content'); ?>
    <?php echo $__env->make('taebo.partials.footer-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" preload />
    <link rel="stylesheet" href="<?php echo e(asset('css/slider.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('js/slider.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('taebo.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\taebo\Modules/Member\resources/views/index.blade.php ENDPATH**/ ?>