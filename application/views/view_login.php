<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <style>
            @import url(http://fonts.googleapis.com/css?family=Roboto:400);
            body {
              background-color:#fff;
              -webkit-font-smoothing: antialiased;
              font: normal 14px Roboto,arial,sans-serif;
            }

            .container {
                padding: 25px;
                position: fixed;
            }

            .form-login {
                background-color: #EDEDED;
                padding-top: 10px;
                padding-bottom: 20px;
                padding-left: 20px;
                padding-right: 20px;
                border-radius: 15px;
                border-color:#d2d2d2;
                border-width: 5px;
                box-shadow:0 1px 0 #cfcfcf;
            }

            h4 { 
             border:0 solid #fff; 
             border-bottom-width:1px;
             padding-bottom:10px;
             text-align: center;
            }

            .form-control {
                border-radius: 10px;
            }

            .wrapper {
                text-align: center;
            }
            .btn btn-primary btn-block{
                float:left;
            }

        </style>
	</head>
	<body>
		<!--Pulling Awesome Font -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <form method='post' class='form-validate' onsubmit="return validateRegistration()" id="test">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-5 col-md-3">
                        <div class="form-login">
                            <h4>Welcome</h4>
                            <input type="text" name="username" placeholder="username" class="form-control input-sm chat-input"  />
                            </br>
                            <input type="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
                            </br>
							<div>
								<?php echo $captcha?>
							</div>
							<div>
								<?php echo $captchaField ?>
							</div>

<br>
                            <div class="submit">
                                <input type="submit" value="Login" name="buttonLogin" class="btn btn-primary center-block">
                                <br>
                                <a href="http://localhost:8082/ci226Bus/registration" class="btn btn-primary">Registration</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <label class="col-md-12 text-center"><?php echo $message; ?></label>
            </div>
        </form>
	</body>
</html>