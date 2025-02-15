
	<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-3">
		<section class="py-4" id="count-stats">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 mx-auto py-3">
						<div class="row">
							<div class="col-md-4 position-relative">
								<div class="card text-dark bg-gray-300">
									<div class="card-body">
										<div class="text-center">
											<span class="fa fa-users fs-1"></span>
											<h3 class="m-0 text-gradient text-dark">
												<span id="state1" countTo="<?php echo e(DB::table("members")->where("id_member_type",3)->count('id')); ?>">0</span>
												<span class="fs-3">Anggota</span>
											</h3>
										</div>
									</div>
								</div>
	
								<hr class="vertical dark m-0 p-0">
							</div>
							<div class="col-md-4 position-relative">
								<div class="card text-dark bg-gray-300">
									<div class="card-body">
										<div class="text-center">
											<span class="fa fa-user-plus fs-1"></span>
											<h3 class="m-0 text-gradient text-dark">
												<span id="state2" countTo="<?php echo e(DB::table("members")->where("id_member_type",2)->count('id')); ?>">0</span>
												<span class="fs-3">Pelatih</span>
											</h3>
										</div>
									</div>
								</div>
								<hr class="vertical dark m-0 p-0">
							</div>
							<div class="col-md-4">
								<div class="card text-dark bg-gray-300">
									<div class="card-body">
										<div class="text-center">
											<span class="fa fa-user-cog fs-1"></span>
											<h3 class="m-0 text-gradient text-dark">
												<span id="state3" countTo="<?php echo e(DB::table("members")->where("id_member_type",1)->count('id')); ?>">0</span>
												<span class="fs-3">Admin</span>
											</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
	<script src="<?php echo e(asset('front/js/plugins/countup.min.js')); ?>"></script>
	<script type="text/javascript">
		if (document.getElementById('state1')) {
			const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
			if (!countUp.error) {
				countUp.start();
			} else {
				console.error(countUp.error);
			}
		}
		if (document.getElementById('state2')) {
			const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
			if (!countUp1.error) {
				countUp1.start();
			} else {
				console.error(countUp1.error);
			}
		}
		if (document.getElementById('state3')) {
			const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
			if (!countUp2.error) {
				countUp2.start();
			} else {
				console.error(countUp2.error);
			};
		}
	</script>
	<?php /**PATH C:\wamp\www\basooki.com\resources\views/taebo/partials/member-summary.blade.php ENDPATH**/ ?>