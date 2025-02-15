<?php
    $newss = DB::table('news')->orderBy('id', 'desc')->limit(4)->get();
?>

<!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5 mb-4">
    <!-- START Blogs w/ 4 cards w/ image & text & link -->
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-5 oswald-bold">Berita Terbaru</h3>
                </div>
            </div>
            <div class="row">

				<?php $__currentLoopData = $newss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-plainx bg-light">
						<?php if(!empty($news->image)): ?>
                        <div class="card-header p-0 position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="<?php echo e(asset(Storage::url($news->image))); ?>" alt="img-blur-shadow"
                                    class="img-fluid shadow w-100 object-fit-cover" style="max-height: 300px;" loading="lazy">
                            </a>
                        </div>
						<?php endif; ?>
                        <div class="card-body">
                            <h5>
                                <a href="<?php echo e(route('front.news.detail',['slug' => $news?->slug])); ?>" class="text-dark oswald-bold font-weight-bold"><?php echo e($news->title); ?></a>
                            </h5>
                            <p class="text-justify"><?php echo e(Str::limit(strip_tags($news?->description), 200, '...')); ?></p>
                            <a href="<?php echo e(route('front.news.detail',['slug' => $news?->slug])); ?>" class="text-info text-sm icon-move-right">Read More
                                <i class="fas fa-arrow-right text-xs ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
			<div class="row">
                <div class="col-lg-12 col-12 text-center">
					<a href="<?php echo e(route('front.news.detail')); ?>" class="btn btn-lg btn-danger btn-lg push-end align-items-center justify-content-center d-flex col-md-3 mx-auto">
						Lihat Berita Lainnya <i class="fa fa-arrow-circle-right ms-3" aria-hidden="true"></i>
					</a>
				</div>
			</div>
        </div>
    </section>
    <!-- END Blogs w/ 4 cards w/ image & text & link -->
</div>
<?php /**PATH C:\wamp\www\taebo\resources\views/taebo/partials/widget-news.blade.php ENDPATH**/ ?>