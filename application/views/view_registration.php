<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <script src="http://localhost:8082/ci226Bus/public/scripts/validation.js" type="text/javascript"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
      <h2>Registration</h2>
      <form method="post" onsubmit="return validateRegistration()">

        <div class="form-group">
          <label for="usr">User Name:</label>
          <input type="text" class="form-control" name="username" id="username" >
        </div>


        <div class="form-group">
          <label for="usr">Password:</label>
          <input type="password" class="form-control" name="password" id="password" >
        </div>

        <div class="form-group">
          <label for="usr">Re Type Password:</label>
          <input type="password" class="form-control" name="repassword" id="repassword" >
        </div>

        <div class="form-group">
          <label for="usr">Full Name:</label>
          <input type="text" class="form-control" name="fullname" id="fullname" >
        </div>

        <div class="form-group">
          <label for="usr">Email:</label>
          <input type="text" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
          <label for="usr">Mobile No. :</label>
          <input type="text" class="form-control" name="mobile" id="mobile">
        </div>

        <div class="submit">
          <input type="submit" value="Register" name="register" class="btn btn-primary">
        </div>
      </form><br>
	  <label><?php echo $message; ?></label>
      <a href="http://localhost:8082/ci226Bus" class="btn btn-primary btn-block">Login</a>
      <br>
    </div>
  </body>
  </html>
