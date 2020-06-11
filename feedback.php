<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>


  <!-- MAIN -->
  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Feedback</span>
      </div>
      <p class="nero__text">
      If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.
      </p>
    </div>
  </main>

<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center><!-- center Starts -->

<h2>Feedback</h2>

<div id='challenge2' style='display:none'>
<?php
include('cyber.php');
 generator(2,"Congrats! You've earned this flag");
?>
</div>



</center><!-- center Ends -->


</div><!-- box-header Ends -->

<form method="post" ><!-- form Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Name </label>

<input class="form-control" name="name"  />

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label> Message </label>

<textarea class="form-control" name="message" rows="10"> </textarea>

</div><!-- form-group Ends -->



<div class="text-center"><!-- text-center Starts -->

<button type="submit" name="submit" class="btn btn-primary">

<i class="fa fa-comments-o"></i> Add Feedback

</button>

</div><!-- text-center Ends -->

</form><!-- form Ends -->

<div style="border: 1px solid #aaa;padding:10px;border-radius:2px">
<?php

if(isset($_POST['submit'])){

// Admin receives email through this code
    $con = new mysqli("localhost","id14017610_root","1v~fAr{Lf3#p$!l^","id14017610_ecom_store");
    $stmt = $con->prepare("INSERT INTO feedback VALUES(null,?,?,?)");
    $stmt->bind_param("sss", $_POST['message'],$_POST['name'],$_SESSION['token']);
    $result = $stmt->execute();

}

$con = new mysqli("localhost","id14017610_root","1v~fAr{Lf3#p$!l^","id14017610_ecom_store");
$result = $con->query("SELECT * FROM feedback where sessionid='".$_SESSION['token']."'");
    while($row = $result->fetch_assoc()){
        echo "<div style='border:1px solid #aaa;box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);margin:20px 0px;padding:20px 10px'>
        <div style='font-weight:700;font-size:22px'>".$row['name']."</div>".$row['message']."</div>";
    }

?>


</div>

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
