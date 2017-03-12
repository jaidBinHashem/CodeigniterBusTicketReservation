<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
  <script src="http://localhost:8082/ci226Bus/public/scripts/validation.js" type="text/javascript"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Edit Coach</h2>
    <form method="post" onsubmit="return validateForm()">
    {coach}
      <div class="form-group">
        <label for="usr">Coach Id:</label>
        <input type="text" value="{id}" class="form-control" name="id" id="coachId" >
      </div>
      
      <div class="form-group">
        <label for="sel1">Route:</label>

        <select class="form-control" id="sel1" name="route">
          <option value="{routeid}">{origin}-{destination}</option>
          {roads}
          <option value="{routeid}">{origin}-{destination}</option>
          {/roads}
        </select>
      </div>

      <div class="form-group">
        <label for="usr">Type:</label>
        <select class="form-control" name="type">
          <option value="{type}">{type}</option>
          <option value="AC">AC</option>
          <option value="NON-AC">NON-AC</option>
        </select>
      </div>

      <div class="form-group">
        <label for="usr">Fare:</label>
        <input type="text" value="{fare}" class="form-control" name="fare" id="fare" >
      </div>

      <div class="form-group">
        <label for="usr">Total Seat:</label>
        <input type="text" value="{totalseat}" class="form-control" name="totalseat" id="totalSeat" >
      </div>

      <div class="form-group">
        <label for="usr">Departure Time:</label>
        <input type="text" value="{departuretime}" class="form-control" placeholder="00:00" name="departuretime" id="dtime" >
      </div>

      <div class="form-group">
        <label for="usr">Arrival Time:</label>
        <input type="text" value="{arrivaltime}" class="form-control" placeholder="00:00" name="arrivaltime" id="atime">
      </div>
      
      <div class="submit">
        <input type="submit" value="Edit Coach" name="editcoach" class="btn btn-primary">
      </div>
    </form><br>
    <a href="http://localhost:8082/ci226Bus/adminhome/coachdetails/{id}" class="btn btn-primary btn-block">Cancel Edit</a>
    {/coach}
    <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
    <br>
  </div>
</body>
</html>
