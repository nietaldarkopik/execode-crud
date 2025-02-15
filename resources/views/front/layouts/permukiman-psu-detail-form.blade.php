
		<div class="row">
			<div class="col-md-12">
				<h2>{{ $psuPermukiman->getJenisPsu->title ?? '' }}</h2>
				<div class="card mb-3 card-warning card-psu-item">
					<div class="row g-0">
						<div class="col-sm-12 col-md-12">
							<img src="{{ asset(Storage::url($psuPermukiman->photo)) ?? '' }}"
								class="img-fluid card-img-top object-fit-cover"
								style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $psuPermukiman->nama_psu ?? '' }}"
								title="{{ $psuPermukiman->nama_psu ?? '' }}" />
						</div>
					</div>
					<div class="row g-0">
						<div class="col-sm-12 col-md-12">
							<div class="card-body">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group m-0 row">
											<label class="col-sm-4 m-0 bg-muted border border-secondary">Nama PSU</label>
											<p class="col-sm-8 form-text text-muted m-0 border border-secondary">:
												{{ $psuPermukiman->nama_psu ?? '' }}</p>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group m-0 row">
											<label class="col-sm-4 m-0 bg-muted border border-secondary">PSU</label>
											@foreach (App\Models\PsuModel::where('jenis', $psuPermukiman->getJenisPsu?->id ?? 0)->get() as $ijp => $p)
												@if ($p->id == ($psuPermukiman->id_psu ?? ''))
													<p class="col-sm-8 form-text text-muted m-0 border border-secondary">:
														{{ $p->judul ?? '' }}</p>
												@endif
											@endforeach
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group m-0 row">
											<label class="col-sm-4 m-0 bg-muted border border-secondary">Kondisi</label>
											<p class="col-sm-8 form-text text-muted m-0 border border-secondary">:
												{{ $psuPermukiman->kondisi ?? '' }}
											</p>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group m-0 row">
											<label class="col-sm-4 m-0 bg-muted border border-secondary">Latitude</label>
											<p class="col-sm-8 form-text text-muted m-0 border border-secondary">:
												{{ $psuPermukiman->latitude ?? '' }}
											</p>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group m-0 row">
											<label class="col-sm-4 m-0 bg-muted border border-secondary">Longitude</label>
											<p class="col-sm-8 form-text text-muted m-0 border border-secondary">:
												{{ $psuPermukiman->longitude ?? '' }}
											</p>
										</div>
									</div>


									<div class="col-md-12">
										<div class="row attribute-psu-container">
											@php
												$attributes = \App\Models\PsuAttributeModel::where(function ($query) use (
													$psuPermukiman,
												) {
													$query->where('id_psu', '=', $psuPermukiman->id_psu);
												})->get();

												$output = '';
												foreach ($attributes as $i => $a) {
													#DB::enableQueryLog();
													$value = \App\Models\PsuAttributePermukimanModel::where(function (
														$query,
													) use ($a, $psuPermukiman) {
														$query->where('id_permukiman', '=', $psuPermukiman->id_permukiman);
														$query->where('id_jenis_psu', '=', $psuPermukiman->id_jenis_psu);
														$query->where('id_psu', '=', $psuPermukiman->id_psu);
														$query->where('id_psu_attribute', '=', $a->id);
													})
														->get()
														->first();

													#$queries = DB::getQueryLog();
													#print_r($queries);

													$value = $value?->value ?? '';
													if(empty($value) or $value == '-')
													{
														continue;
													}
													$output .=
														'
															<div class="col-md-12 m-0">
																<div class="form-group m-0 row">
																	<label class="col-sm-4 m-0 bg-muted border border-secondary">' .
														$a->attribute .
														'</label>
																	<p class="col-sm-8 form-text text-muted m-0 border border-secondary">: 
																	' .
														$value .
														' ' .
														$a->keterangan .
														'
																	</p>
																</div>
															</div>
														';
												}
												echo $output;
											@endphp
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group m-0 row">
											<label class="col-sm-4 m-0 bg-muted border border-secondary">Keterangan
												Lainnya</label>
											<p class="col-sm-8 form-text text-muted m-0 border border-secondary">:
												{{ $psuPermukiman->deskripsi ?? '' }}</p>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>