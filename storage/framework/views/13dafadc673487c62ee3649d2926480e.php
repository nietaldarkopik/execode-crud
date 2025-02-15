
	<?php echo $__env->yieldContent('footer-content'); ?>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php echo $__env->make(env('THEME_PATH').'.partials.foot-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\wamp\www\basooki.com\resources\views/basooki/partials/footer.blade.php ENDPATH**/ ?>