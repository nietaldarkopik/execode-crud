<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="<?php echo e($modalId ?? 'modalId'); ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog <?php echo e($modalSize ?? ''); ?>" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e($modalTitle ?? ''); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo e($modalContent ?? ''); ?>

            </div>
            <?php if($modalFooter): ?>
            <div class="modal-footer">
                <?php echo e($modalFooter ?? ''); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('js'); ?>
    <script>
        $('#<?php echo e($modalId ?? "modalId"); ?>').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modalTitle = $(button).data("modal-title");
            var modalSize = $(button).data("modal-size");
            var modal = $(this);
            var action_url = $(button).attr("href");
            
            if(!modalSize){
                $('#<?php echo e($modalId ?? "modalId"); ?>').find(".modal-dialog").removeClass("modal-xl").removeClass("modal-lg").removeClass("modal-sm").removeClass("modal-fullscreen").addClass('modal-lg');
            }else{
                $('#<?php echo e($modalId ?? "modalId"); ?>').find(".modal-dialog").removeClass("modal-xl").removeClass("modal-lg").removeClass("modal-sm").removeClass("modal-fullscreen").addClass(modalSize);
            }

            $('#<?php echo e($modalId ?? "modalId"); ?>').find(".modal-title").html(modalTitle);
            $('#<?php echo e($modalId ?? "modalId"); ?>').find(".modal-body").html('<div class="row"><div class="col-12 p-5 text-center"><img src="<?php echo e(asset('vendor/adminlte/dist/img/logo-sipsu-kalsel.png')); ?>" class="img-circle animation__shake" alt="AdminLTE Preloader Image" width="60" height="60" style="animation-iteration-count: infinite; "></div></div>');

            $.get(action_url,function(msg){
                $('#<?php echo e($modalId ?? "modalId"); ?>').find(".modal-body").html($(msg));
            })
            // Use above variables to manipulate the DOM
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp\www\taebo\resources\views/vendor/adminlte/partials/modal/modal-default.blade.php ENDPATH**/ ?>