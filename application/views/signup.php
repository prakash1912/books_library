<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Signup</title>

    <link rel="shortcut icon" href="<?= base_url()?>assets/images/fav.jpg">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/login_style/style.css" />
    <script>

function login()
{
    window.location.href = '<?=base_url()?>home/login';
}

</script>
</head>

<body>
    <form method ="post" action="<?=base_url()?>home/signup">
    <div class="container-fluid ">
        
                <div class=" no-pdding login-box">
                    <div class="row no-margin w-100 bklmj">
                        <div class="col-lg-6 col-md-6 log-det">
                            
                            <h2>Signup</h2>
                            
                           
                            <div class="row no-margin past">
                                <p>Dont Have an Account? <span>Create your Account</span> </p>
                            </div>


                            <div class="text-box-cont">
                                <div class="input-group mb-3"><?=form_error('Username')?>
                                   
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="Username" id="Username" value="<?=set_value('Username')?>">
                                </div>
                                <div class="input-group mb-3"><?=form_error('emailid') ?>
                                   
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" name="emailid" id="emailid" value="<?=set_value('emailid')?>">
                                </div>
                                 <div class="input-group mb-3"><?=form_error('Password') ?>
                                    
                                    <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="Password" id="Password" value="">
                                </div>
                                <!-- <div class="input-group mb-3"><?=form_error('Confirm Password')?>
                
                                    <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1" name="Confirm Password" id="Confirm Password" value="">
                                </div> -->
                                
                                <div class="right-bkij mb-3">
                                    <input type="submit"  value="sign In" class="btn btn-success btn-round">
                                </div>  
                                <br> 
                                <!-- <div class="row linkoi">
                                  <div class="col-sm-5">
                                      <p>Or login with</p>
                                  </div>
                                   <div class="col-sm-7">
                                       <ul>
                                            <li><i class="fab fa-facebook-f"></i></li>
                                            <li><i class="fab fa-twitter"></i></li>
                                            
                                        </ul>
                                   </div>
                                </div>  -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 box-de">
                            <div class="ditk-inf">
                                <h2 class="w-100">Welcome Back </h2>
                                <p>Already having account, Login!</p>
                                <button type="button" class="btn btn-outline-light" onclick="login()">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </form>
</body>

<script src="<?= base_url()?>assets/js/login_js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url()?>assets/js/login_js/popper.min.js"></script>
<script src="<?= base_url()?>assets/js/login_js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/js/login_js/script.js"></script>


</html>
