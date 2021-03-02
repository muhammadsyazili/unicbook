<!-- Home -->
<div class="home">
	<div class="home_slider_container">
		<!-- Home Slider -->
		<div class="owl-carousel owl-theme home_slider">
			<!-- Home Slider Item -->
			<div class="owl-item">
				<div class="home_slider_content">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<div class="home_slider_title">SISTEM REKOMENDASI BUKU</div>
								<div class="home_slider_subtitle mb-3">Menggunakan Item-Based Clustering Hybrid Method (ICHM)</div>
								<form action="<?= base_url('book/search'); ?>" method="post">

									<div class="row">
										<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
											<input type="text" class="form-control" placeholder="Key Word..." name="keyword">
										</div>

										<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<div class="form-group">
											<select class="form-control" name="filter">
												<option value="title">Title</option>
												<option value="author">Author</option>
											</select>
											</div>
										</div>

										<div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
											<button type="submit" class="btn btn-primary" type="button">Search</button>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Home Slider Nav -->
</div>