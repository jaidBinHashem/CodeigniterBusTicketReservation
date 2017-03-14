<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reserve Seat</title>
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
        <?php foreach($coach as $co){?>
        <tr>
          <td><?php echo $co['id']; ?></td>
          <td><?php echo $co['type']; ?></td>
          <td><?php echo $co['fare']; ?></td>
          <td><?php echo $co['totalseat']; ?></td>
          <td><?php echo $co['departuretime']; ?></td>
          <td><?php echo $co['arrivaltime']; ?></td>
          <td><?php echo $co['origin']; ?></td>
          <td><?php echo $co['destination']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>



    <div class="container">
      <h2>Please select seats</h2>
      <form method="post">
        <div class="form-group">
          <select multiple class="form-control" name="selectedseates[]" id="sel2">
          <?php for($i=0; $i<count($seats); $i++) {?>
            <option><?php echo $seats[$i]; ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="submit">
        <input type="submit" value="Reserve" name="reserve" class="btn btn-primary">
        </div>
      </form>
    </div>



    <br>
    <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
    <br>
  </div>
</body>
</html>
