<div class="row">
    <div class="col-sm-12 p-1">
		<label class="custom-file mb-0" for="input-file">Photo</label>
        <?php if(!empty($member->photo)): ?>
            <img src="<?php echo e(asset(Storage::url($member->photo))); ?>" class="img img-thumbnail" />
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="nama">Nama</label>
            <div class="form-text col-md-9"><?php echo e($member->nama); ?></div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="id_member_type">Jenis Member</label>
            <div class="form-text col-md-9">
                <?php $__currentLoopData = Modules\Member\App\Models\MemberTypeModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $memberType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($memberType->id == $member->id_member_type): ?>
                        <?php echo e($memberType->title); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="tempat_lahir">Tempat Lahir</label>
            <div class="form-text col-md-9"><?php echo e($member->tempat_lahir); ?></div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="tanggal_lahir">Tanggal Lahir</label>
            <div class="form-text col-md-9"><?php echo e($member->tanggal_lahir); ?></div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="alamat">Alamat</label>
            <div class="form-text col-md-9"><?php echo e($member->alamat); ?></div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="id_geup">Geup</label>
            <div class="form-text col-md-9">
                <?php $__currentLoopData = Modules\Member\App\Models\GeupModel::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $geup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($geup->id == $member->id_geup): ?>
                        <?php echo e($geup->title); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="no_reg">No Reg</label>
            <div class="form-text col-md-9"><?php echo e($member->no_reg); ?></div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="id_user">User</label>
            <div class="form-text col-md-9">
                <?php $__currentLoopData = App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->id == $member->id_user): ?>
                        <?php echo e($user->name); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp\www\taebo\Modules/Member\resources/views/admin/member/form-show.blade.php ENDPATH**/ ?>