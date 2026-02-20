<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Table</title>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background:#f4f6f9;
        padding:40px;
    }

    .table-container{
        max-width:1000px;
        margin:auto;
        background:white;
        padding:20px;
        border-radius:12px;
        box-shadow:0 8px 20px rgba(0,0,0,0.08);
    }

    h2{
        margin-bottom:20px;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:#4f46e5;
        color:white;
    }

    th,td{
        padding:14px;
        text-align:left;
    }

    tbody tr{
        border-bottom:1px solid #eee;
        transition:0.2s;
    }

    tbody tr:hover{
        background:#f9fafb;
    }

    .badge{
        padding:5px 10px;
        border-radius:8px;
        font-size:12px;
        font-weight:bold;
    }

    .male{background:#dbeafe;color:#1e40af;}
    .female{background:#fce7f3;color:#be185d;}

    .action-btn{
        padding:6px 12px;
        border:none;
        border-radius:6px;
        cursor:pointer;
        font-size:13px;
        margin-right:5px;
    }

    .edit{background:#facc15;}
    .delete{background:#ef4444;color:white;}
    .table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.btn-add{
    text-decoration:none;
    background:#22c55e;
    color:white;
    padding:10px 16px;
    border-radius:8px;
    font-size:14px;
    font-weight:bold;
    transition:0.2s;
}

.btn-add:hover{
    background:#16a34a;
}


</style>
</head>
<body>

<div class="table-container">
   
    <div class="table-header">
        <h2>Teacher List</h2>
        <a href="{{ route('teacher.create') }}" class="btn-add">+ Add Teacher</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Skill</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($teacher as $t )
            <tbody>
                <tr>
                    <td>{{$t -> id}}</td>
                    <td>{{$t -> name}}</td>
                    <td><span class="badge female">{{$t -> gender}}</span></td>
                    <td>{{$t -> skill}}</td>
                    <td>{{$t -> salary}}</td>
                    <td>
                        <button class="action-btn edit">Edit</button>
                        <button class="action-btn delete">Delete</button>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>
</div>

</body>
</html>
