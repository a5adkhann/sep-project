<?php
include("./base/header.php");


if (isset($_POST['addToCart'])) {

	if ($_SESSION['cart']) {
		$product_id = array_column($_SESSION['cart'], "product_id");
		if (in_array($_POST['product_id'], $product_id)) {

			foreach ($_SESSION['cart'] as $key => $value) {
				if ($value['product_id'] == $_POST['product_id']) {
					$_SESSION['cart'][$key]['product_quantity'] += 1;
					break; 
				}
			}

			echo "<script>
        alert('Product already added, quantity increased');
        location.assign('index.php');
    </script>";
		} else {
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count] = array("product_id" => $_POST['product_id'], "product_name" => $_POST['product_name'], "product_price" => $_POST['product_price'], "product_quantity" => $_POST['product_quantity'], "product_image" => $_POST['product_image']);

			echo "<script>alert('Product Added Successfully');
			location.assign('index.php');
			</script>";
		}
	} else {
		$_SESSION['cart'][0] = array("product_id" => $_POST['product_id'], "product_name" => $_POST['product_name'], "product_price" => $_POST['product_price'], "product_quantity" => $_POST['product_quantity'], "product_image" => $_POST['product_image']);

		echo "<script>alert('Product Added Successfully');
		location.assign('index.php');</script>";
	}
}

if (isset($_POST['checkout'])) {
    $user_id = $_SESSION['user_id']; 
    $user_name = $_SESSION['user_name']; 

    $order_shipping_address = $_POST['order_shipping_address'];
    $customer_phone_number = $_POST['customer_phone_number'];

    $order_generated_id = uniqid('ORD-');

    $grand_total = 0;

    foreach ($_SESSION['cart'] as $key => $value) {
        $product_id = $value['product_id'];
        $product_price = $value['product_price'];
        $product_quantity = $value['product_quantity'];
        $item_total = $product_quantity * $product_price;

        $grand_total += $item_total;

        $update_query = "UPDATE products SET product_stock_quantity = product_stock_quantity - $product_quantity WHERE product_id = $product_id";
        mysqli_query($connection, $update_query);
    }

    // Insert into orders table
    $insert_query = "INSERT INTO `orders` (
        order_generated_id,
        order_amount,
        customer_id,
        customer_name,
        customer_number,
        order_shipping_address
    ) VALUES (
        '$order_generated_id',
        '$grand_total',
        '$user_id',
        '$user_name',
        '$customer_phone_number',
        '$order_shipping_address'
    )";

    $execute = mysqli_query($connection, $insert_query);

    if ($execute) {
        unset($_SESSION['cart']);

        echo "<script>alert('Your Order ($order_generated_id) has been placed successfully with total RS-$grand_total');
        location.assign('index.php');
        </script>";
    } else {
        echo "Error placing order: " . mysqli_error($connection);
    }
}



if(isset($_GET['remove'])){
	foreach($_SESSION['cart'] as $key => $value){
		if($_GET['remove'] == $value['product_id']){
			unset($_SESSION['cart'][$key]);
			$_SESSION['cart'] = array_values($_SESSION['cart']);
			echo "<script>
			alert('Product removed successfully');
			location.assign('shoping-cart.php');
			</script>";
		}
	}
}

?>

<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" action="?checkout" method="POST">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2">Name</th>
								<th class="column-2">Quantity</th>
								<th class="column-3">Price</th>
								<th class="column-5">Total</th>
								<th class="column-5">Action</th>
							</tr>

							<?php
							if (isset($_SESSION['cart'])) {
								$grand_total = 0;
								foreach ($_SESSION['cart'] as $key => $value) {
							?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="admin/uploads/<?php echo $value['product_image'] ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><?php echo $value['product_name'] ?></td>
										<td class="column-2"><?php echo $value['product_quantity'] ?></td>
										<td class="column-3"><?php echo $value['product_price'] ?></td>
										<td class="column-5"><?php
										
										echo $value['product_quantity']*$value['product_price']; 
										
										$grand_total += $value['product_quantity']*$value['product_price'];
										?></td>
										<td class="text-danger text-center">
										<a href="?remove=<?php echo $value['product_id']?>">
										Remove
										</a>
										</td>
									</tr>
							<?php
								}
							} else {
								echo "<script>alert('Add to Cart Session not set')</script>";
							}
							?>

						</table>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Apply coupon
							</div>
						</div>

						<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							Update Cart
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209">
							<span class="mtext-110 cl2">
								<?php 
								if(isset($grand_total)){
								echo $grand_total;
								}
								?>
							</span>
						</div>
					</div>

					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								COD(Cash On Delivery)
							</p>

							<div class="p-t-15">
								<span class="stext-112 cl8">
									Shipping Info
								</span>

								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="order_shipping_address" placeholder="Shipping Address" required>
								</div>

								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="customer_phone_number" placeholder="Number" required>
								</div>

							</div>
						</div>
					</div>

					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								<?php 
								if(isset($grand_total)){
								echo $grand_total;
								}
								?>
							</span>
						</div>
					</div>

					
					<?php
						if(isset($_SESSION['user_email']) || isset($_SESSION['user_password']))
						{

						?>
						<button name="checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
						<?php
						}
						else {

						?>
						<a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
						<?php
						}
						?>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
include("./base/footer.php");
?>