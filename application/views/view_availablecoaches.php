<!DOCTYPE html>
<html lang="en">
<head>
  <title>Available Coaches</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

  <div class="container">
    <h2>Available Coaches</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Coach Number</th>
          <th>Type</th>
          <th>Origin</th>
          <th>Destination</th>
          <th>Depature Time</th>
          <th>Available Time</th>
        </tr>
      </thead>
      <tbody>
        {coaches}
        <tr>
          <td><a href="http://localhost:8082/ci226Bus/userhome/reserveseat/{id}">{id}</a></td>
          <td>{type}</td>
          <td>{origin}</td>
          <td>{destination}</td>
          <td>{departuretime}</td>
          <td>{arrivaltime}</td>
        </tr>
        {/coaches}
      </tbody>
    </table>
   <br>
   <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
 </div>

</body>
</html>
