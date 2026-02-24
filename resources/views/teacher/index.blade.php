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
        overflow:hidden;
    }

    .table-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:18px;
    }

    h2{
        margin:0;
        font-size:20px;
        font-weight:700;
        color:#111827;
    }

    .btn-add{
        text-decoration:none;
        background:#22c55e;
        color:white;
        padding:10px 16px;
        border-radius:10px;
        font-size:14px;
        font-weight:700;
        transition:0.2s;
        box-shadow:0 6px 14px rgba(34,197,94,0.25);
    }

    .btn-add:hover{
        background:#16a34a;
        transform: translateY(-1px);
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
        font-size:14px;
    }

    tbody tr{
        border-bottom:1px solid #eee;
        transition:0.2s;
    }

    tbody tr:hover{
        background:#f9fafb;
    }

    .badge{
        display:inline-flex;
        align-items:center;
        gap:6px;
        padding:6px 10px;
        border-radius:999px;
        font-size:12px;
        font-weight:700;
        text-transform:capitalize;
    }

    .male{background:#dbeafe;color:#1e40af;}
    .female{background:#fce7f3;color:#be185d;}

    /* ✅ make Edit + Delete normal (same row) */
    .actions{
        display:flex;
        align-items:center;
        gap:8px;
        white-space:nowrap;
    }

    .action-btn{
        padding:8px 12px;
        border:none;
        border-radius:10px;
        cursor:pointer;
        font-size:13px;
        font-weight:700;
        text-decoration:none;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        transition:0.2s;
    }

    .edit{
        background:#fbbf24;
        color:#111827;
        box-shadow:0 6px 14px rgba(251,191,36,0.25);
    }

    .edit:hover{
        transform: translateY(-1px);
        filter:brightness(0.98);
    }

    .delete{
        background:#ef4444;
        color:white;
        box-shadow:0 6px 14px rgba(239,68,68,0.25);
    }

    .delete:hover{
        transform: translateY(-1px);
        filter:brightness(0.98);
    }

    /* remove default form spacing */
    form{
        margin:0;
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
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($teacher as $t )
            <tr>
                <td>{{$t -> id}}</td>
                <td>{{$t -> name}}</td>

                <td>
                    <span class="badge {{ strtolower($t->gender) == 'male' ? 'male' : 'female' }}">
                        {{$t -> gender}}
                    </span>
                </td>

                <td>{{$t -> skill}}</td>
                <td>{{$t -> salary}}</td>
                <td> <img src="{{ asset('storage/'.$t->image) }}" alt="" width="50px"></td>
                <td>
                    <div class="actions">
                        <a class="action-btn edit" href="{{route('teacher.edit', $t->id)}}">Edit</a>

                        <form action="{{ route('teacher.delete', $t->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

</body>
</html>