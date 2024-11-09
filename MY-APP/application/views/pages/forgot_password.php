<section id="form"><!--form-->
		<div class="container">
			<?php if($this->session->flashdata('success')) { ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
			<?php } elseif($this->session->flashdata('error')) { ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
			<?php } ?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Forgot Password</h2>
						<form action="<?php echo base_url('customer/forgot-password')?>" method="POST">
                            <label for="email">Nhập vào email của bạn</label>
							<input type="email" name="email" placeholder="Enter Your Email" />
							<?php echo form_error('email'); ?>
							<input type="text" name="phone" placeholder="Enter Your Phone" />
							<?php echo form_error('phone'); ?>
							<button type="submit" class="btn btn-default">Gửi mã</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->