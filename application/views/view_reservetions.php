<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reserves</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

  <div class="container">
  <br>
  <a href="http://localhost:8082/ci226Bus/userhome" class="btn btn-primary btn-block">HOME</a><br>
    <h2>Reserves</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Coach Number</th>
          <th>User Name</th>
          <th>Type</th>
          <th>Seat</th>
          <th>Origin</th>
          <th>Destination</th>
          <th>Date</th>
          <th>Depature Time</th>
          <th>Available Time</th>
        </tr>
      </thead>
      <tbody>
        {reserves}
        <tr>
          <td>{coachid}</td>
          <td>{name}</td>
          <td>{type}</td>
          <td>{seat}</td>
          <td>{origin}</td>
          <td>{destination}</td>
          <td>{date}</td>
          <td>{departuretime}</td>
          <td>{arrivaltime}</td>
        </tr>
        {/reserves}
      </tbody>
    </table>
   <br>
   <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
 </div>

</body>
</html>
