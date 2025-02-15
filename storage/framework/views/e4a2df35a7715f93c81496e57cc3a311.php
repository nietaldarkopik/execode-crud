<?php $layoutHelper = app('JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper'); ?>

<?php ( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') ); ?>

<?php if(config('adminlte.use_route_url', false)): ?>
    <?php ( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' ); ?>
<?php else: ?>
    <?php ( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' ); ?>
<?php endif; ?>

<a href="<?php echo e($dashboard_url); ?>"
    <?php if($layoutHelper->isLayoutTopnavEnabled()): ?>
        class="navbar-brand <?php echo e(config('adminlte.classes_brand')); ?>"
    <?php else: ?>
        class="brand-link <?php echo e(config('adminlte.classes_brand')); ?>"
    <?php endif; ?>>

	<?php ($web_title = DB::table('settings')->where('code','backend.web_title')->first() ); ?>
	<?php ($logo = DB::table('settings')->where('code','backend.web_logo')->first() ); ?>
	<?php ($logo_img = (isset($logo->value) && !empty($logo->value))?asset(Storage::url($logo->value)):asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) ); ?>
	<?php ($web_title = (isset($web_title->value) && !empty($web_title->value))?$web_title->value:config('adminlte.logo_img_alt', 'AdminLTE')); ?>

    
    <img src="<?php echo e($logo_img); ?>"
         alt="<?php echo e($web_title); ?>"
         class="<?php echo e(config('adminlte.logo_img_class', 'brand-image img-circle elevation-3')); ?>"
         style="opacity:.8">

    
    <span class="brand-text font-weight-light <?php echo e(config('adminlte.classes_brand_text')); ?>">
        <?php echo $web_title; ?>

    </span>

</a>
<?php /**PATH C:\wamp\www\basooki.com\resources\views/vendor/adminlte/partials/common/brand-logo-xs.blade.php ENDPATH**/ ?>