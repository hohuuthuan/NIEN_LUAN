<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                    if($this->cart->contents()){
                ?>
				<table class="table table-condensed">
					<thead>
					
							<?php if($this->session->flashdata('success')) { ?>
								<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
							<?php } elseif($this->session->flashdata('error')) { ?>
								<div class="alert alert-warning"><?php echo $this->session->flashdata('error') ?></div>
							<?php } ?>
					
						<tr class="cart_menu">
                            <td class="description">Image</td>
							<td class="image">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="in_stock">In Stock</td>
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
										<?php
											if($items['qty'] > $items['options']['in_stock']){					
										?>
										<input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo  $items['options']['in_stock']?>" autocomplete="off"> 
										<?php
											}else{
										?>
										<input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo  $items['qty']?>" autocomplete="off"> 
										<?php
											}
										?>
										<input type="submit" name="capnhat" class="btn btn-warning" value="Cập nhật"></input>
										 
								

										
										
								</div>
								</form>
							</td>
							<td class="in_stock">
								<p><?php echo $items['options']['in_stock']?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo  number_format($subtotal,0, ',', '.')?> VND</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url('delete-item/'.$items['rowid'])?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    <?php 
                        }
                    ?>
                    <tr>
                        <td><p colspan="5" class="cart_total_price"><?php echo  number_format($total,0, ',', '.')?> VND</p></td>
						<td><a href="<?php echo base_url('delete-all-cart')?>" class="btn btn-danger" >Xóa tất cả</a></td>
						<td><a href="<?php echo base_url('checkout')?>" class="btn btn-success" >Đặt hàng</a></td>
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
		</div>
	</section> <!--/#cart_items-->