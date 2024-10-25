<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Checkout</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                    if($this->cart->contents()){
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
                            <td class="description">Image</td>
							<td class="image">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php 
                    $subtotal = 0;
                    $total = 0;
                    foreach ($this->cart->contents() as $items) { 
                        $subtotal = $items['qty']*$items['price'];
                        $total += $subtotal;
                        ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url('uploads/product/'.$items['options']['image'])?>" width="150" height="150" alt="<?php echo $items['name']?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo  $items['name']?></a></h4>
							
							</td>
							<td class="cart_price">
								<p><?php echo  number_format($items['price'],0, ',', '.')?> VND</p>
							</td>
							<td class="cart_quantity">
								<form action="<?php echo base_url('update-cart-item')?>" method="POST">
									
								<div class="cart_quantity_button">
										<input type="hidden" value="<?php echo $items['rowid']?>"  name="rowid">
										<input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo  $items['qty']?>" autocomplete="off">
										<input type="submit" name="capnhat" class="btn btn-warning" value="Cập nhật"></input>
										
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo  number_format($subtotal,0, ',', '.')?> VND</p>
							</td>
							
						</tr>
                    <?php 
                        }
                    ?>
                    <tr>
                        <td><p colspan="5" class="cart_total_price"><?php echo  number_format($total,0, ',', '.')?> VND</p></td>
						<!-- <td><a href="<?php echo base_url('delete-all-cart')?>" class="btn btn-danger" >Xóa tất cả</a></td> -->
						<!-- <td><a href="<?php echo base_url('checkout')?>" class="btn btn-success" >Đặt hàng</a></td> -->
					</tr>
					</tbody>
				</table>
                <?php 
                    }
                    else{
                        echo '<span class="text text-danger">Hãy thêm sản phẩm vào giỏ hàng</span>';
                    }
                
                ?>
			</div>
            <section id="form"><!--form-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="login-form"><!--login form-->
                                <h2>Điển thông tin thanh toán</h2>
                                <form onsubmit="return confirm('Xác nhận đặt hàng')" method="POST" action="#">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Name" />
                                    <label>Address</label>
                                    <input type="text" name="address" placeholder="Address" />
                                    <label>Phone</label>
                                    <input type="text" name="phone" placeholder="Phone" />
                                    <label>Email</label>
                                    <input type="text" name="email" placeholder="Email" />
                                    <label>Hình thức thanh toán</label>
                                    <select name="hinh-thuc-thanh-toan" id="">
                                        <option>COD</option>
                                        <option>VNPAY</option>
                                    </select>
                                    <button type="submit" class="btn btn-default">Xác nhận thanh toán</button>
                                </form>
                            </div><!--/login form-->
                        </div>
                    </div>
                </div>
	        </section><!--/form-->
		</div>
</section> <!--/#cart_items-->