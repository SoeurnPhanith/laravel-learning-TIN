<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Info</title>

  <style>
    *{
      box-sizing:border-box;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    body{
      margin:0;
      padding:40px;
      background:#ffffff;
      color:#1f2937;
    }

    h1{
      text-align:center;
      margin-bottom:30px;
      font-size:26px;
      color:#166534;
    }

    .container{
      max-width:900px;
      margin:auto;
    }

    table{
      width:100%;
      border-collapse:collapse;
      background:#fff;
      border-radius:10px;
      overflow:hidden;
      box-shadow:0 10px 25px rgba(0,0,0,0.12);
    }

    th, td{
      padding:14px 16px;
      text-align:left;
      font-size:15px;
    }

    th{
      background:#22c55e;
      color:white;
      font-weight:600;
      text-transform:uppercase;
      letter-spacing:.5px;
    }

    td{
      border-bottom:1px solid #e5e7eb;
    }

    tr:last-child td{
      border-bottom:none;
    }

    tr:hover{
      background:#f0fdf4;
    }

    td:nth-child(1){
      font-weight:600;
      color:#166534;
    }

    td:nth-child(4){
      text-transform:capitalize;
    }

    td:nth-child(5){
      font-weight:600;
      color:#15803d;
    }

    @media(max-width:600px){
      body{ padding:20px; }
      table{ font-size:14px; }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Student List Information</h1>

    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Skill</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($students as $s)
        <tr>
          <td>{{ $s['id'] }}</td>
          <td>{{ $s['name'] }}</td>
          <td>{{ $s['age'] }}</td>
          <td>{{ $s['gender'] }}</td>
          <td>{{ $s['skill'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>
</html>
