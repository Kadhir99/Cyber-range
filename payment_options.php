<div class="box"><!-- box Starts -->

<?php

$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];


?>

  <form  method="post">
			<center>
				Before proceeding to payment, check you ping for a smoother transaction<br><br>
				<input type="text" name="ip" size="30" placeholder="Enter your ip">
				<input type="submit" name="ping" value="Submit">
			</center>
  </form>

  <?php

if( isset( $_POST[ 'ping' ]  ) ) {
	// Get input
	$target = $_REQUEST[ 'ip' ];

	// Determine OS and execute the ping command.
	if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		// Windows
		$cmd = shell_exec( 'ping  ' . $target );
	}
	else {
		// *nix
		$cmd = shell_exec( 'ping  -c 4 ' . $target );
	}

	// Feedback for the end user
	echo "<pre>{$cmd}</pre>";
}

?>

<h1 class="text-center">Payment Options For You</h1>

<p class="lead text-center">

<a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Off line</a>

</p>

<center><!-- center Starts -->

  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="hosted_button_id" value="9PWJZYVQH8KGU">
  <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </form>


<?php

$i = 0;


$ip_add = getRealUserIp();

$get_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$pro_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_title = $row_products['product_title'];

$i++;

?>


<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>" >

<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>" >

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>" >

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>" >


<?php }

if(isset($_POST['sub'])){
	$cnum = $_POST['cnum'];
	$cname = $_POST['cname'];
	$expiry = $_POST['expiry'];
	$cvv = $_POST['cvv'];

	$otp = rand(100,999);

	$con = new mysqli("localhost","root","","ecom_store");
	$result = $con->query("SELECT * FROM card_details");
		while($row_card = $result->fetch_assoc()){

			if($row_card['cnumber'] == $cnum && $row_card['name'] == $cname && $row_card['expiry'] == $expiry && $row_card['cvv'] == $cvv ){
			echo $row_card['cnumber'];
				
				$insert = mysqli_query($con,"Update card_details set otp = $otp WHERE cnumber=$cnum");
				echo "<script>window.location.href='otp.php'</script>";
				// header('Location: otp.php');
		}
	}
}

?>
	<form method="post">
	  <div class="form__group field">
        <input type="input" class="form__field" placeholder="Email" name="cnum" id='inemail' required />
        <label for="inemail" class="form__label">Card Number</label>
      </div>
      <div class="form__group field">
        <input type="text" class="form__field" placeholder="Password" name="cname" id='inpass' required />
        <label for="inpass" class="form__label">Name</label>
      </div>
	  <div style="width:100%;display:flex">
	  <div class="form__group field" style="width:45%;margin:10px 5%">
        <input type="text" class="form__field" placeholder="Password" name="expiry" id='inpass' required />
        <label for="inpass" class="form__label">Expiry date</label>
      </div>
	  <div class="form__group field" style="width:40%">
        <input type="password" class="form__field" placeholder="Email" name="cvv" id='inemail' required />
        <label for="inemail" class="form__label">CVV</label>
      </div>
	  </div>
	  <button id="signin" class="loginbtn" name='sub' >Sign-in</button>
	  </form>

<input type="image" name="submit" width="500" height="270" src="images/paypal.png" >


</form><!-- form Ends -->

</center><!-- center Ends -->

</div><!-- box Ends -->
