<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Students Table</title>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background:#f4f6f9;
        padding:40px;
    }

    .container{
        max-width:1100px;
        margin:auto;
        background:white;
        padding:25px;
        border-radius:12px;
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
    }

    h1{
        margin-bottom:15px;
    }

    .btn-add{
        display:inline-block;
        margin-bottom:20px;
        padding:10px 18px;
        background:#4f46e5;
        color:white;
        text-decoration:none;
        border-radius:8px;
        transition:0.2s;
    }

    .btn-add:hover{
        background:#4338ca;
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
        vertical-align: middle;
    }

    tbody tr{
        border-bottom:1px solid #eee;
        transition:0.2s;
    }

    tbody tr:hover{
        background:#f9fafb;
    }

    img{
        width:45px;
        height:45px;
        object-fit:cover;
        border-radius:50%;
        border:2px solid #e5e7eb;
    }

    .badge{
        padding:4px 10px;
        border-radius:20px;
        font-size:12px;
        color:white;
        display:inline-block;
        text-transform: capitalize;
    }

    .male{
        background:#3b82f6;
    }

    .female{
        background:#ec4899;
    }

    /* ✅ Action Buttons */
    .action-btn{
        display:flex;
        gap:8px;
        align-items:center;
    }

    .btn{
        padding:7px 12px;
        border-radius:6px;
        text-decoration:none;
        color:white;
        font-size:13px;
        border:none;
        cursor:pointer;
        transition:0.2s;
    }

    .btn-edit{
        background:#10b981;
    }

    .btn-edit:hover{
        background:#059669;
    }

    .btn-delete{
        background:#ef4444;
    }

    .btn-delete:hover{
        background:#dc2626;
    }
</style>

</head>
<body>

<div class="container">

    <h1>Show Students</h1>

    <a href="{{route('student.create')}}" class="btn-add">+ Add Student</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Image</th>
                <th>CreateAt</th>
                <th>UpdateAt</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($allStudent as $stu)
            <tr>
                <td>{{$stu->id}}</td>
                <td>{{$stu->full_name}}</td>

                <td>
                    <span class="badge {{$stu->gender=='male'?'male':'female'}}">
                        {{$stu->gender}}
                    </span>
                </td>

                <td>{{$stu->age}}</td>
                <td>{{$stu->phone_number}}</td>
                <td>{{$stu->dob}}</td>

                <td>
                    <img src="{{ asset('storage/'.$stu->image) }}" alt="student">
                </td>

                <td>{{$stu->created_at}}</td>
                <td>{{$stu->updated_at}}</td>

                <td>
                    <div class="action-btn">
                        <a href="{{route('student.edit', $stu->id)}}" class="btn btn-edit">Edit</a>

                        <form action="{{route('student.delete', $stu->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
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