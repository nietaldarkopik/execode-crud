<?php
    $articles = DB::table('articles')->orderBy('id', 'desc')->limit(4)->get();
?>

<!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-5 mb-4">
    <!-- START Blogs w/ 4 cards w/ image & text & link -->
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-5 oswald-bold">Article Terbaru</h3>
                </div>
            </div>
            <div class="row">

				<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-plain bg-warning">
						<?php if(!empty($article->image)): ?>
                        <div class="card-header p-0 position-relative">
                            <a class="d-block blur-shadow-image">
                                <img src="<?php echo e(asset(Storage::url($article->image))); ?>" alt="img-blur-shadow"
                                    class="img-fluid shadow border-radius-lg w-100 object-fit-cover" style="max-height: 300px;" loading="lazy">
                            </a>
                        </div>
						<?php endif; ?>
                        <div class="card-body">
                            <h5>
                                <a href="<?php echo e(route('front.article.detail',['slug' => $article?->slug])); ?>" class="text-dark oswald-bold font-weight-bold"><?php echo e($article->title); ?></a>
                            </h5>
                            <p class="text-justify text-dark"><?php echo e(Str::limit(strip_tags($article?->description), 200, '...')); ?></p>
                            <a href="<?php echo e(route('front.article.detail',['slug' => $article?->slug])); ?>" class="text-light text-sm icon-move-right">Read More
                                <i class="fas fa-arrow-right text-xs ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
			<div class="row">
                <div class="col-lg-12 col-12 text-center">
					<a href="<?php echo e(route('front.article.detail')); ?>" class="btn btn-lg btn-danger btn-lg push-end align-items-center justify-content-center d-flex col-md-3 mx-auto">
						Lihat Berita Lainnya <i class="fa fa-arrow-circle-right ms-3" aria-hidden="true"></i>
					</a>
				</div>
			</div>
        </div>
    </section>
    <!-- END Blogs w/ 4 cards w/ image & text & link -->
</div>
<?php /**PATH C:\wamp\www\taebo\resources\views/taebo/partials/widget-articles.blade.php ENDPATH**/ ?>