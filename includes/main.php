</head>

<body>
<div style="background:#808d;color:white;padding:10px;font-family:'Poppins'">
<span>User: 
<?php
if(!isset($_SESSION['token'])){
 header("Location:index.php");
}
echo $_SESSION['token'];
?>
</span>
<a href="http://cyberrange.000webhostapp.com/fulllogout.php" style="float:right;text-decoration:none;color:white">Logout</a>
</div>
  <header class="page-header">
    <!-- topline -->
    <div class="page-header__topline">
      <div class="container clearfix">

        <div class="currency">
          <a class="currency__change" href="http://cyberrange.000webhostapp.com/customer/my_account.php?my_orders">
          <?php
          if(!isset($_SESSION['customer_email'])){
          echo "Welcome :Guest"; 
          }
          else
          { 
              echo "Welcome : " . $_SESSION['customer_email'] . "";
            }
?>
          </a>
        </div>

        <div class="basket">
          <a href="http://cyberrange.000webhostapp.com/cart.php" class="btn btn--basket">
            <i class="icon-basket"></i>
            <?php items(); ?> items
          </a>
        </div>
        
        
        <ul class="login">

<li class="login__item">
<?php
if(!isset($_SESSION['customer_email'])){
  echo '<a href="customer_register.php" class="login__link">Register</a>';
} 
  else
  { 
      echo '<a href="http://cyberrange.000webhostapp.com/my_account.php?my_orders" class="login__link">My Account</a>';
  }   
?>  
</li>


<li class="login__item">
<?php
if(!isset($_SESSION['customer_email'])){
  echo '<a href="checkout.php" class="login__link">Sign In</a>';
} 
  else
  { 
      echo '<a href="http://cyberrange.000webhostapp.com/logout.php" class="login__link">Log out</a>';
  }   
?>  
  
</li>
</ul>
      
      </div>
    </div>
    <!-- bottomline -->
    <div class="page-header__bottomline">
      <div class="container clearfix">

        <div class="logo">
          <a class="logo__link" href="index.php">
            <img class="logo__img" src="images/logo.png" alt="Avenue fashion logotype" width="237" height="19">
          </a>
        </div>

        <nav class="main-nav">
          <ul class="categories">

            <!-- <li class="categories__item">
              <a class="categories__link" href="#">
                Mens
               
              </a>
              </li>

            <li class="categories__item">
              <a class="categories__link" href="">
                Womens
               
              </a>
            </li> -->
             <li class="categories__item">
              <a id='home' class="categories__link" href="http://cyberrange.000webhostapp.com/nextindex.php">
                Home
               
              </a>
              </li>

            <li class="categories__item">
              <a id='shop' class="categories__link" href="http://cyberrange.000webhostapp.com/shop.php">
                Shop
              </a>
            </li>

            <li class="categories__item">
              <a class="categories__link" href="http://cyberrange.000webhostapp.com/about.php">
                About-us
              </a>
            </li>
            <li class="categories__item">
              <a class="categories__link" href="http://cyberrange.000webhostapp.com/feedback.php">
                Feedback
              </a>
            </li>

          <li class="categories__item">
              <a class="categories__link" href="http://cyberrange.000webhostapp.com/customer/my_account.php?my_orders">
                My Account
                <i class="icon-down-open-1"></i>
              </a>
              <div class="dropdown dropdown--lookbook">
                <div class="clearfix">
                  <div class="dropdown__half">
                    <div class="dropdown__heading">Account Settings</div>
                    <ul class="dropdown__items">
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">My Wishlist</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">My Orders</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">View Shopping Cart</a>
                      </li>
                    </ul>
                  </div>
                  <div class="dropdown__half">
                    <div class="dropdown__heading"></div>
                    <ul class="dropdown__items">
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">Edit Your Account</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">Change Password</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="#" class="dropdown__link">Delete Account</a>
                      </li>
                    </ul>
                  </div>
                </div>
             

              </div>

            </li>

          </ul>
        </nav>
      </div>
    </div>
  </header>