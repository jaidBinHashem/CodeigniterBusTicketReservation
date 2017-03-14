<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coaches</title>
  <script src="http://localhost:8082/ci226Bus/public/scripts/validation.js" type="text/javascript"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  
  <div class="container"><br>
    <a href="http://localhost:8082/ci226Bus/adminhome" class="btn btn-primary btn-block">HOME</a><br>
    <h2>Coaches</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Route Id</th>
          <th>Origin</th>
          <th>Destination</th>
        </tr>
      </thead>
      <tbody>
        {routes}
        <tr>
          <td>{routeid}</td>
          <td>{origin}</td>
          <td>{destination}</td>
        </tr>
        {/routes}
      </tbody>
    </table>


    <div class="container">
      <h2>Add Road</h2>
      <form method="post" onsubmit="return validateAddRoute()">
        

        

        <div class="form-group">
          <label for="usr">Origin:</label>
          <input type="text" class="form-control" name="origin" id="origin" >
        </div>

        <div class="form-group">
          <label for="usr">Destination:</label>
          <input type="text" class="form-control" name="destination" id="destination" >
        </div>

        

        <div class="submit">
          <input type="submit" value="Add Route" name="addroute" class="btn btn-primary">
        </div>
        <label><?php echo $message; ?></label>
      </form><br>
      <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
      <br>
    </div>
  </body>
  </html>
