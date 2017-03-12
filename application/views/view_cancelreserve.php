<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Reserves</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

  <div class="container">
    <br>
    <a href="http://localhost:8082/ci226Bus/userhome" class="btn btn-primary btn-block">HOME</a><br>
    <h2>My Reserves</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Reserve Id</th>
          <th>Coach Number</th>
          <th>Seat</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        {reserve}
        <tr>
          <td>{id}</td>
          <td>{coachid}</td>
          <td>{seat}</td>
          <td>{date}</td>
        </tr>
        {/reserve}
      </tbody>
    </table>
    <form method="post">
      <div class="submit text-center">
      <input type="submit" value="Cancel Reservation" name="cancel" class="btn btn-primary centered">
      </div>
    </form>
    <br>
    <a href="http://localhost:8082/ci226Bus/userhome/myreserves" class="btn btn-primary btn-block">Back</a>
    <br>
    <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
  </div>

</body>
</html>
