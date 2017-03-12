<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
  <script type="text/javascript" src="http://localhost:8082/ci226Bus/public/scripts/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="http://localhost:8082/ci226Bus/public/scripts/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="http://localhost:8082/ci226Bus/public/css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="http://localhost:8082/ci226Bus/public/css/jquery-ui.theme.css">
  <link rel="stylesheet" type="text/css" href="http://localhost:8082/ci226Bus/public/css/jquery-ui.structure.css">
  <script src="http://localhost:8082/ci226Bus/public/scripts/validation.js" type="text/javascript"></script>



<script type="text/javascript">
    $(document).ready(function($){
            $('#to').autocomplete({
          source: 'http://localhost:8082/ci226Bus/userhome/getDestination', 
          type: 'GET'
            });
        });

    $(document).ready(function($){
            $('#from').autocomplete({
          source: 'http://localhost:8082/ci226Bus/userhome/getOrigin', 
          type: 'GET'
            });
        });
  </script>





  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
      <h2>Welcome</h2>
      <form method="post" onsubmit="return validateSearch()">
        <div class="form-group">
          <label for="usr">From</label>
          <input type="text" placeholder="Dhaka" class="form-control" name="from" id="from" >
        </div>

        <div class="form-group">
          <label for="usr">To</label>
          <input type="text" placeholder="Chittagongs" class="form-control" name="to" id="to" >
        </div>

        <div class="form-group">
          <label for="usr">Date Of Journey</label>
          <input type="text" placeholder="YYYY-MM-DD" class="form-control" name="date" id="date" >
        </div>

        <div class="submit">
          <input type="submit" value="Search" name="search" class="btn btn-primary">
        </div>
      </form><br>
      <a href="http://localhost:8082/ci226Bus/userhome/myreserves" class="btn btn-primary btn-block">My Reserves</a>
      <br>
      <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
      <br>
    </div>
  </body>
  </html>
