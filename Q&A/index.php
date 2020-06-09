<?php
session_start();
 $con = new mysqli("localhost","root","","ecom_store");
    $stmt = $con->prepare("SELECT * FROM cyber_result WHERE token='".$_SESSION['token']."'");
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $js = json_encode($result->fetch_assoc());
    }else{
        header('Location: http://localhost:8000/ecommerce-website/index.php');
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
          <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css"/>
    <title>Q&A</title>
    <style>
        
    </style>
</head>
<body>
    <!-- multistep form -->
    <form action="thankyou.php" method="POST" id="msform" style="width: 900px">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">SQL injection level 1</li>
            <li>Cross site Scripting (Stored XSS)</li>
            <li>SQL Injection level 2</li>
            <li>Broken Access Control</li>
            <li>Command Injection</li>
            <li>Brute force</li>
            <li>File upload</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">SQL injection level 1</h2>
            <h3 class="fs-subtitle">1) Login as user@ave.com<br>2) Use sql injection for password<br>3) You will get the flag in the account page of that user</h3>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Resources:
            <a href="https://www.owasp.org/index.php/SQL_Injection">https://www.owasp.org/index.php/SQL_Injection</a>
            </div>
            <div class='flagbox' style="display:flex">
            <input type="text" name="flag1" placeholder="flag1{xxxxxxxxxxxxxxxxxxxxxx}" />
            <input type="button"  class="submit-button" value="flag" onclick="sub(this,1)" />
            <span class="flexboxtext">Copy paste the right flag</span>
            </div>
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Cross site Scripting (Stored XSS)</h2>
            <h3 class="fs-subtitle">1) Navigate to feedback page<br>2) Execute the script to display the element of id challenge2 <br>3) You will get the flag in that element</h3>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Resources:
            <a href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)">https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)</a>
            </div>
            <div class='flagbox' style="display:flex">
                <input type="text" name="flag1" placeholder="flag2{xxxxxxxxxxxxxxxxxxxxxx}" />
                <input type="button" class="submit-button" value="flag" onclick="sub(this,2)" />
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">SQL Injection level 2</h2>
            <h3 class="fs-subtitle">1) Navigate to admin login(url)<br>2) Login as admin@ave.com<br>3) Use sql injection for password<br>
               4)Get the flag on the dashboard</h3>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Resources:
            <a href="https://www.owasp.org/index.php/SQL_Injection">https://www.owasp.org/index.php/SQL_Injection</a>
            </div>
            
            <div class='flagbox' style="display:flex">
                <input type="text" name="flag1" placeholder="flag3{xxxxxxxxxxxxxxxxxxxxxx}" />
                <input type="button" class="submit-button" value="flag" onclick="sub(this,3)" />
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Broken Access Control</h2>
            <h3 class="fs-subtitle">1) There are 11 products in which 10 are visible in shop page(localhost:8000/ecom_store/shop.php).<br>
            2)One of them is out of stock<br> 3)Find the flag by accessing the details page of the product which is out of stock </h3>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Resources:
            <a href="https://owasp.org/www-community/Broken_Access_Control">https://owasp.org/www-community/Broken_Access_Control</a>
            </div>
            <div class='flagbox' style="display:flex">
                <input type="text" name="flag1" placeholder="flag4{xxxxxxxxxxxxxxxxxxxxxx}" />
                <input type="button" class="submit-button" value="flag" onclick="sub(this,4)" />
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Command Injection</h2>
            <h3 class="fs-subtitle">1) Buy a product and checkout from the cart<br>
            2)You will land on the payments page.<br> 3) Enter the command to run a c file with your token as argument(file name) to access your flag </h3>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Resources:
            <a href="https://www.owasp.org/index.php/Command_Injection">https://www.owasp.org/index.php/Command_Injection</a>
            </div>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Command: getflag5 &lt;your_token&gt;
            </div>
            <div class='flagbox' style="display:flex">
                <input type="text" name="flag1" placeholder="flag5{xxxxxxxxxxxxxxxxxxxxxx}" />
                <input type="button" class="submit-button" value="flag" onclick="sub(this,5)" />
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Brute force</h2>
            <h3 class="fs-subtitle">1) Enter the card details in the payments page.<br>
            2)You will be redirected to otp page.<br> 3)Get the flag by finding and entering the correct 3 digit otp on the input field</h3>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Resources:
            <a href="https://www.owasp.org/index.php/Testing_for_Brute_Force_(OWASP-AT-004)">https://www.owasp.org/index.php/Testing_for_Brute_Force_(OWASP-AT-004)</a>
            </div>
            <div class='flagbox' style="display:flex">
                <input type="text" name="flag1" placeholder="flag6{xxxxxxxxxxxxxxxxxxxxxx}" />
                <input type="button" class="submit-button" value="flag" onclick="sub(this,6)" />
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">File upload</h2>
            <h3 class="fs-subtitle">1) Create a php file with the code given below<br>
            2) Navigate to your account(localhost:8000/ecom_store/customer/myaccount.php).<br>
            3)Navigate to edit account and upload the file where you upload your profile image<br> 4)Execute the file(customer/customer_images/your_file.php) </h3>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Resources:
            <a href="https://www.owasp.org/index.php/Unrestricted_File_Upload">https://www.owasp.org/index.php/Unrestricted_File_Upload</a>
            </div>
            <div style="width:95%;background:#eee;text-align:left;font-size:13px;padding:5px;margin-bottom:20px">
            Code:
            &lt;?php
            include('../../cyber.php');
            get_flag_7();
            </div> 
            <div class='flagbox' style="display:flex">
                <input type="text" name="flag1" placeholder="flag7{xxxxxxxxxxxxxxxxxxxxxx}" />
                <input type="button" class="submit-button" value="flag" onclick="sub(this,7)" />
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Feedback</h2>
            <h3 class="fs-subtitle">How was the game? Leave your feedbacks below</h3>
            <textarea name="feedback" placeholder="feedback"></textarea>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" class="submit action-button" value="Submit" />
        </fieldset>
    </form>
    <script>

        let db = <?php echo $js; ?>;
        let flagbox = document.querySelectorAll('.flagbox')
        function getcomplete(){
        document.querySelectorAll('#progressbar li').forEach((i,index)=>{
            if(db['q'+(index+1)]){
            i.classList += ' complete';
            flagbox[index].style.display= 'none';
            }
        });
    }
    getcomplete();
            //jQuery time
            var current_fs, next_fs, previous_fs; //fieldsets
            var left, opacity, scale; //fieldset properties which we will animate
            var animating; //flag to prevent quick multi-click glitches

            $(".next").click(function () {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'position': 'absolute'
                        });
                        next_fs.css({ 'left': left, 'opacity': opacity });
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });

            $(".previous").click(function () {
                if (animating) return false;
                animating = true;

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale previous_fs from 80% to 100%
                        scale = 0.8 + (1 - now) * 0.2;
                        //2. take current_fs to the right(50%) - from 0%
                        left = ((1 - now) * 50) + "%";
                        //3. increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({ 'left': left });
                        previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });

            // $(".submit").click(function () {
            //     return false;
            // })
            function sub(elt,index){
                $.ajax({
                    type: "POST",
                    data:{
                        flag: elt.parentNode.querySelector('input').value,
                        index: index,
                        token: '<?php echo $_SESSION['token']; ?>'
                    },
                    url:"thankyou.php",
                    cache: false,
                    success: function (html) {
                        if(html == 'true'){
                            db['q'+index] = 1;
                            getcomplete();
                            
                        }else{
                            flagbox[index-1].classList += ' animate__animated animate__shakeX';
                            // console.log(flagbox[index-1]);
                            flagbox[index-1].querySelector('span').style.visibility = 'visible';
                            window.setTimeout(()=>{
                            flagbox[index-1].querySelector('span').style.visibility = 'hidden';
                            flagbox[index-1].classList ='flagbox';

                            },2000);
                        }

                    }
                })
            }
        </script>
</body>
</html>