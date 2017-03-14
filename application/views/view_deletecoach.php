<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Coach</title>
  <script src="http://localhost:8082/ci226Bus/public/scripts/validation.js" type="text/javascript"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

  <div class="container"><br>
    <a href="http://localhost:8082/ci226Bus/adminhome" class="btn btn-primary btn-block">HOME</a><br>
    <h2>Coach Details</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Coach Number</th>
          <th>Type</th>
          <th>Fare</th>
          <th>Total Seat</th>
          <th>Departure Time</th>
          <th>Arrival Time</th>
          <th>Origin</th>
          <th>Destination</th>
        </tr>
      </thead>
      <tbody>
        {coach}
        <tr>
          <td>{id}</td>
          <td>{type}</td>
          <td>{fare}</td>
          <td>{totalseat}</td>
          <td>{departuretime}</td>
          <td>{arrivaltime}</td>
          <td>{origin}</td>
          <td>{destination}</td>
        </tr>
        
      </tbody>
    </table>
    <form method="post">  
      <div class="submit">
        <input type="submit" value="Confirm Delete" name="deletecoach" class="btn btn-primary btn-block">
      </div>
    </form>
    <br>
    <a href="http://localhost:8082/ci226Bus/adminhome/coachdetails/{id}" class="btn btn-primary btn-block">Cancel Delete</a>
    {/coach}
    <br>
    <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
    <br>
  </div>
</body>
</html>
