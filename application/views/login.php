<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link rel="shortcut icon" href="<?= base_url()?>assets/images/fav.jpg">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/login_style/style.css" />
    <script>

        function singup()
        {
            window.location.href = '<?=base_url()?>home/signup';
        }

    </script>
    
<style>

    .error
    {
        
        margin-top: 10px;
        text-align: center;

    }
    .error-msg 
        {
            color: #D8000C;
            background-color: #FFBABA;
        }
</style>
</head>

<body>
    
    <form method="post" action="<?=base_url()?>home/login">
    
    <div class="container-fluid ">
    <h4 class="error"><?=@$_SESSION['msg']; $_SESSION['msg'] = ''?></h4>
                <div class=" no-pdding login-box">
                
                    <div class="row no-margin w-100 bklmj">
                    
                        <div class="col-lg-6 col-md-6 log-det">
                        <?php if($_SESSION['login_invalid'] !='') { ?>
                        <p>Invalid login. Please try again.</p>
                        <?php } ?>
                        <h2>Login</h2>
                            
                            <div class="text-box-cont">
                            <p class="form_error"><?=form_error('Username')?></p>
                                <div class="input-group mb-3"> 
                                   
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="Username" id="Username">
                                </div>
                                 <div class="input-group mb-3"><?=form_error('Password') ?>
                                    
                                    <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="Password" id="Password">
                                </div>
                                <div class="row no-margin">
                                    <p class="forget-p">Forget Password ?</p>
                                </div>
                                <div class="right-bkij mb-3">
                                    <button class="btn btn-success btn-round">Log In</button>
                                </div>  
                                <br> 
                                <!-- <div class="row linkoi">
                                  <div class="col-sm-5">
                                      <p>Or login with</p>
                                  </div>
                                   <div class="col-sm-7">
                                       <ul>
                                            <li><i class="fa-solid fa-circle-f"></i></li>
                                            <li><i class="fab fa-google"></i></li>
                                            
                                        </ul>
                                   </div>
                                </div>  -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 box-de">
                            <div class="ditk-inf">
                                <h2 class="w-100">Welcome</h2>
                                <p>Dont Have an Account? Create your Account</p>
                                <button type="button" class="btn btn-outline-light" onclick="singup()">Sign Up</button>
                                
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
