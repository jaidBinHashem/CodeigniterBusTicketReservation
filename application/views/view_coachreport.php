<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coach Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<br>
    <a href="http://localhost:8082/ci226Bus/adminhome" class="btn btn-primary btn-block">HOME</a>
  <h2>Coach Report</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Coach Number</th>
        <th>Total Reserved Numbers</th>
      </tr>
    </thead>
    <tbody>
    {report}
      <tr>
        <td>{coachid}</td>
        <td>{count}</td>
      </tr>
     {/report}
    </tbody>
  </table>
  <br>
  <a href="http://localhost:8082/ci226Bus/home/logout" class="btn btn-primary btn-block">Logout</a>
</div>

</body>
</html>
