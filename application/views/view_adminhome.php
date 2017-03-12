<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2>HOME</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Coach Number</th>
        <th>Type</th>
        <th>Origin</th>
    	<th>Destination</th>
      </tr>
    </thead>
    <tbody>
    {coachNumber}
      <tr>
        <td><a href="http://localhost:8082/ci226Bus/adminhome/coachdetails/{id}">{id}</a></td>
        <td>{type}</td>
        <td>{origin}</td>
        <td>{destination}</td>
      </tr>
     {/coachNumber}
    </tbody>
  </table>
  <div>
  	<a href="http://localhost:8082/ci226Bus/adminhome/coaches" class="btn btn-primary">Coaches</a>
  	<a href="http://localhost:8082/ci226Bus/adminhome/routes" class="btn btn-primary">Routes</a>
  	<a href="http://localhost:8082/ci226Bus/adminhome/reservations" class="btn btn-primary">Reservations</a>
  </div>
  <br>
  <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
</div>

</body>
</html>
