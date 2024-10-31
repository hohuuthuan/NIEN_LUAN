
<section>
	<div class="container">

		<div class="row">
			<?php $this->load->view('pages/component/sidebar'); ?>
			<!-- Hiển thị ra tất cả sản phẩm, phân trang -->
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Features Items</h2>
					<?php
					foreach ($allproduct_pagination as $key => $allPro) {
						?>
						<form action="<?php echo base_url('add-to-cart') ?>" method="POST">
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<input type="hidden" value="<?php echo $allPro->id ?>" name="product_id">
									<input type="hidden" value="1" name="quantity">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url('uploads/product/' . $allPro->image) ?>"
												alt="<?php echo $allPro->title ?>" />
											<h2><?php echo number_format($allPro->price, 0, ',', '.') ?> VND</h2>
											<p><?php echo $allPro->title ?></p>
											<a href="<?php echo base_url('san-pham/' . $allPro->id . '/' . $allPro->slug) ?>"
												class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
											<button type="submit" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
										</div>
									</div>
								</div>

							</div>
						</form>
					<?php } ?>
					<?php echo $links; ?>
				</div><!--features_items-->


			</div>



			
			<!-- Hiển thị các sản phẩm theo danh mục -->
		<!-- <?php
			foreach ($items_category as $key => $items) {
				?>
				<div class="col-sm-3"></div>
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<h2 class="title text-center"><?php echo $key ?></h2>
						<form action="<?php echo base_url('add-to-cart') ?>" method="POST">
						<?php
						foreach ($items as $allPro_cate) {
							?>

							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<input type="hidden" value="<?php echo $allPro_cate['id'] ?>" name="product_id">
									<input type="hidden" value="1" name="quantity">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url('uploads/product/' . $allPro_cate['image']) ?>"
												alt="<?php echo $allPro_cate['title']?>" />
											<h2><?php echo number_format($allPro_cate['price'], 0, ',', '.') ?> VND</h2>
											<p><?php echo $allPro_cate['title'] ?></p>
											<a href="<?php echo base_url('san-pham/' . $allPro_cate['id']. '/' . $allPro_cate['slug']) ?>"
												class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
											<button type="submit" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
										</div>
									</div>
								</div>

							</div>

						<?php } ?>
						</form>
					</div>
				</div>
				<?php
			}
		?> -->
		</div>
	</div>
</section>