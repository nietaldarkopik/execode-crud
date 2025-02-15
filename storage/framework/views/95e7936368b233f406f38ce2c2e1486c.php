<?php
	$articles = DB::table('articles')->orderBy('id','desc')->limit(4)->get();
?>

<div class="row">
	<div class="col-12 mx-auto">
		<div class="card text-start">
			<div class="card-header border-bottom border-3">
				<h2 class="text-gradient text-dark oswald-bold">Artikel</h2>
			</div>
			<div class="card-body">
				<div class="row">
					<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="mb-2 col-lg-12 col-md-12 z-index-2 position-relative px-md-2 px-sm-5 mx-auto border-bottom border-2 border-dotted py-2">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<h3 class="mb-0 oswald-bold"><?php echo e($article->title); ?></h3>
						</div>
						<div class="row mb-4">
							<div class="col-auto">
								<span class="h6"><i class="fa fa-calendar" aria-hidden="true"></i></span>
								<span><?php $carbon = new Carbon\Carbon; $carbon->setLocale('id'); echo $carbon->parse($article->created_at)->translatedFormat('l, j F Y') ?></span>
							</div>
						</div>
						<p class="text-lg mb-0">
							<?php echo e(Str::limit(strip_tags($article?->description), 200, '...')); ?>

							<br>
							<a href="<?php echo e(route('front.article.detail',['slug' => $article?->slug])); ?>" class="text-info icon-move-right">
								Detail
								<i class="fas fa-arrow-right text-sm ms-1"></i>
							</a>
						</p>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</div>
				<div class="row">
					<div class="col-lg-12 col-12 text-center">
						<a href="<?php echo e(route('front.article.detail')); ?>" class="btn btn-lg btn-danger btn-lg push-end align-items-center justify-content-center d-flex col-md-8 mx-auto">
							Lihat Artikel Lainnya <i class="fa fa-arrow-circle-right ms-3" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			
			</div>
		</div>

	</div>
</div>
<?php /**PATH C:\wamp\www\taebo\resources\views/taebo/partials/widget-articles-horizon.blade.php ENDPATH**/ ?>