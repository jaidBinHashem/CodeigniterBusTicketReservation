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
          <th>Coach Number</th>
          <th>Origin</th>
          <th>Destination</th>
        </tr>
      </thead>
      <tbody>
        {coachNumber}
        <tr>
          <td><a href="http://localhost:8082/ci226Bus/adminhome/coachdetails/{id}">{id}</a></td>
          <td>{origin}</td>
          <td>{destination}</td>
        </tr>
        {/coachNumber}
      </tbody>
    </table>


    <div class="container">
      <h2>Add Coach</h2>
      <form method="post" onsubmit="return validateForm()">
        
        <div class="form-group">
          <label for="sel1">Route:</label>

          <select class="form-control" id="sel1" name="route">
            {roads}
            <option value="{routeid}">{origin}-{destination}</option>
            {/roads}
          </select>
        </div>

        <div class="form-group">
          <label for="usr">Coach Id:</label>
          <input type="text" placeholder="DHK-CTG-000" class="form-control" name="id" id="coachId" >
        </div>

        <div class="form-group">
          <label for="usr">Type:</label>
          <select class="form-control" name="type">
            <option value="AC">AC</option>
            <option value="NON-AC">NON-AC</option>
          </select>
        </div>

        <div class="form-group">
          <label for="usr">Fare:</label>
          <input type="text" class="form-control" name="fare" id="fare" >
        </div>

        <div class="form-group">
          <label for="usr">Total Seat:</label>
          <input type="text" class="form-control" name="totalseat" id="totalSeat" >
        </div>

        <div class="form-group">
          <label for="usr">Departure Time:</label>
          <input type="text" class="form-control" placeholder="00:00" name="departuretime" id="dtime" >
        </div>

        <div class="form-group">
          <label for="usr">Arrival Time:</label>
          <input type="text" class="form-control" placeholder="00:00" name="arrivaltime" id="atime">
        </div>

        <div class="submit">
          <input type="submit" value="Add Coach" name="addcoach" class="btn btn-primary">
        </div>
        <label><?php echo $message; ?></label>
      </form><br>
      <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
      <br>
    </div>
  </body>
  </html>
