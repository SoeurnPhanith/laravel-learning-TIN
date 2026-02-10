<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student List</title>

  <style>
    *{ box-sizing:border-box; font-family:"Segoe UI",Tahoma,sans-serif; }

    body{
      margin:0;
      padding:40px 15px;
      background: linear-gradient(135deg,#1e1b4b,#020617);
      color:#fff;
    }

    h1{
      text-align:center;
      margin-bottom:15px;
      letter-spacing:1px;
    }

    /* back button */
    .back-home{
      display:inline-block;
      margin:0 auto 25px;
      padding:10px 22px;
      background:#6366f1;
      color:white;
      text-decoration:none;
      border-radius:999px;
      font-weight:600;
      transition:.25s ease;
      box-shadow:0 8px 20px rgba(99,102,241,.45);
    }

    .back-home:hover{
      background:#4f46e5;
      transform:translateY(-2px);
    }

    .center{
      text-align:center;
    }

    table{
      width:100%;
      max-width:900px;
      margin:0 auto;
      border-collapse:collapse;
      background:rgba(255,255,255,0.08);
      border-radius:12px;
      overflow:hidden;
      box-shadow:0 15px 40px rgba(0,0,0,0.4);
    }

    thead th{
      text-align:left;
      padding:14px 18px;
      background:rgba(255,255,255,0.12);
      font-size:13px;
      letter-spacing:1px;
      text-transform:uppercase;
      border-bottom:1px solid rgba(255,255,255,0.18);
    }

    tbody td{
      padding:15px 18px;
      border-bottom:1px solid rgba(255,255,255,0.15);
      font-size:15px;
    }

    tbody tr{
      transition:all .25s ease;
    }

    tbody tr:hover{
      background:rgba(99,102,241,0.35);
      transform:scale(1.01);
    }

    th:nth-child(1), td:nth-child(1){ font-weight:600; color:#a5b4fc; }
    th:nth-child(2), td:nth-child(2){ text-align:center; }
    th:nth-child(3), td:nth-child(3){ color:#22c55e; font-weight:600; }
    th:nth-child(4), td:nth-child(4){ text-align:right; font-weight:bold; color:#facc15; }

    tbody tr:last-child td{ border-bottom:none; }

    @media(max-width:600px){
      table, thead, tbody, tr, th, td{ display:block; width:100%; }
      thead{ display:none; }

      tbody tr{
        margin:14px 0;
        border:1px solid rgba(255,255,255,0.15);
        border-radius:12px;
        background:rgba(255,255,255,0.06);
      }

      tbody td{
        display:flex;
        justify-content:space-between;
        gap:12px;
      }

      tbody td::before{
        font-weight:bold;
        color:#94a3b8;
      }

      tbody td:nth-child(1)::before{ content:"Name"; }
      tbody td:nth-child(2)::before{ content:"Age"; }
      tbody td:nth-child(3)::before{ content:"Skill"; }
      tbody td:nth-child(4)::before{ content:"Salary"; }

      td:nth-child(1), td:nth-child(3), td:nth-child(4){ color:#fff; }
    }
  </style>
</head>

<body>

  <h1>Student List Information</h1>

  <!-- 🔗 Back to Home -->
  <div class="center">
    <a href="{{ url('/') }}" class="back-home">← Back to Home</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Skill</th>
        <th>Salary</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($students as $s)
        <tr>
          <td>{{ $s['name'] }}</td>
          <td>{{ $s['age'] }}</td>
          <td>{{ $s['skill'] }}</td>
          <td>${{ $s['salary'] }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>
