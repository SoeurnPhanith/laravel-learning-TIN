<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Teacher</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Jost:wght@300;400;500&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root{
      --gold:#c9a84c;
      --gold-light:#f0d078;
      --cream:#fdf6ec;
      --dark:#0a0a0f;
      --glass-bg:rgba(255,255,255,0.08);
      --glass-border:rgba(201,168,76,0.25);
      --input-bg:rgba(255,255,255,0.06);
      --text-light:rgba(255,255,255,0.85);
      --text-muted:rgba(255,255,255,0.45);
    }

    body{
      min-height:100vh;
      font-family:'Jost',sans-serif;
      background:var(--dark);
      display:flex;
      align-items:center;
      justify-content:center;
      padding:2rem;
      overflow:hidden;
      position:relative;
    }

    /* Atmospheric background blobs */
    .bg-blob{
      position:fixed;
      border-radius:50%;
      filter:blur(80px);
      pointer-events:none;
      z-index:0;
    }
    .bg-blob-1{
      width:500px;height:500px;
      background:radial-gradient(circle,rgba(180,120,20,0.35) 0%,transparent 70%);
      top:-150px;left:-150px;
      animation:drift1 12s ease-in-out infinite alternate;
    }
    .bg-blob-2{
      width:400px;height:400px;
      background:radial-gradient(circle,rgba(80,40,120,0.4) 0%,transparent 70%);
      bottom:-100px;right:-100px;
      animation:drift2 15s ease-in-out infinite alternate;
    }
    .bg-blob-3{
      width:300px;height:300px;
      background:radial-gradient(circle,rgba(20,80,160,0.3) 0%,transparent 70%);
      top:50%;left:60%;
      animation:drift3 10s ease-in-out infinite alternate;
    }

    @keyframes drift1{ from{transform:translate(0,0) scale(1);} to{transform:translate(60px,40px) scale(1.1);} }
    @keyframes drift2{ from{transform:translate(0,0) scale(1);} to{transform:translate(-40px,-60px) scale(1.15);} }
    @keyframes drift3{ from{transform:translate(0,0) scale(1);} to{transform:translate(30px,-50px) scale(0.9);} }

    /* Subtle noise overlay */
    body::after{
      content:'';
      position:fixed;
      inset:0;
      background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events:none;
      z-index:1;
      opacity:0.4;
    }

    /* Main card */
    .form-card{
      position:relative;
      z-index:2;
      width:100%;
      max-width:520px;
      background:var(--glass-bg);
      backdrop-filter:blur(28px) saturate(180%);
      -webkit-backdrop-filter:blur(28px) saturate(180%);
      border:1px solid var(--glass-border);
      border-radius:24px;
      padding:3rem 2.8rem;
      box-shadow:
        0 8px 60px rgba(0,0,0,0.5),
        0 0 0 1px rgba(255,255,255,0.04) inset,
        0 1px 0 rgba(255,255,255,0.1) inset;
      animation:cardIn 0.8s cubic-bezier(0.23,1,0.32,1) forwards;
    }

    @keyframes cardIn{
      from{opacity:0;transform:translateY(30px) scale(0.97);}
      to{opacity:1;transform:translateY(0) scale(1);}
    }

    .form-card::before{
      content:'';
      position:absolute;
      top:0;left:10%;right:10%;
      height:1px;
      background:linear-gradient(90deg,transparent,var(--gold),transparent);
      border-radius:50%;
    }

    .form-header{ text-align:center; margin-bottom:2.4rem; }
    .form-badge{
      display:inline-block;
      font-size:0.65rem;
      font-weight:500;
      letter-spacing:0.22em;
      text-transform:uppercase;
      color:var(--gold);
      background:rgba(201,168,76,0.12);
      border:1px solid rgba(201,168,76,0.3);
      padding:0.3rem 1rem;
      border-radius:50px;
      margin-bottom:1rem;
    }
    .form-title{
      font-family:'Cormorant Garamond',serif;
      font-size:2.6rem;
      font-weight:600;
      color:#fff;
      line-height:1.1;
      letter-spacing:-0.02em;
    }
    .form-title span{ color:var(--gold); }
    .form-subtitle{
      margin-top:0.5rem;
      font-size:0.83rem;
      color:var(--text-muted);
      letter-spacing:0.03em;
    }

    .divider{
      height:1px;
      background:linear-gradient(90deg,transparent,rgba(201,168,76,0.2),transparent);
      margin:0 0 2rem;
    }

    .form-group{
      margin-bottom:1.4rem;
      opacity:0;
      transform:translateX(-10px);
      animation:slideIn 0.5s cubic-bezier(0.23,1,0.32,1) forwards;
    }
    .form-group:nth-child(1){ animation-delay:0.15s; }
    .form-group:nth-child(2){ animation-delay:0.22s; }
    .form-group:nth-child(3){ animation-delay:0.29s; }
    .form-group:nth-child(4){ animation-delay:0.36s; }
    .form-group:nth-child(5){ animation-delay:0.43s; }

    @keyframes slideIn{ to{opacity:1;transform:translateX(0);} }

    label{
      display:block;
      font-size:0.72rem;
      font-weight:500;
      letter-spacing:0.14em;
      text-transform:uppercase;
      color:var(--gold-light);
      margin-bottom:0.5rem;
    }

    .input-wrapper{ position:relative; }
    .input-icon{
      position:absolute;
      left:1rem;
      top:50%;
      transform:translateY(-50%);
      color:var(--text-muted);
      font-size:1rem;
      pointer-events:none;
      transition:color 0.3s;
    }

    input[type="text"],
    input[type="number"],
    select{
      width:100%;
      padding:0.85rem 1rem 0.85rem 2.8rem;
      background:var(--input-bg);
      border:1px solid rgba(255,255,255,0.1);
      border-radius:12px;
      color:var(--text-light);
      font-family:'Jost',sans-serif;
      font-size:0.92rem;
      font-weight:300;
      outline:none;
      transition:border-color 0.3s, background 0.3s, box-shadow 0.3s;
      appearance:none;
      -webkit-appearance:none;
    }

    input[type="text"]::placeholder,
    input[type="number"]::placeholder{ color:var(--text-muted); font-weight:300; }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus{
      border-color:var(--gold);
      background:rgba(255,255,255,0.1);
      box-shadow:0 0 0 3px rgba(201,168,76,0.12), 0 0 20px rgba(201,168,76,0.08);
    }

    /* NOTE: icon is after input in your HTML, so use ~ to target it */
    input[type="text"]:focus ~ .input-icon,
    input[type="number"]:focus ~ .input-icon{ color:var(--gold); }

    .select-wrapper{ position:relative; }
    .select-wrapper::after{
      content:'▾';
      position:absolute;
      right:1rem;
      top:50%;
      transform:translateY(-50%);
      color:var(--text-muted);
      pointer-events:none;
      font-size:0.8rem;
    }

    select option{ background:#1a1a2e; color:#fff; }

    .gender-group{ display:flex; gap:0.75rem; }
    .gender-option{ flex:1; position:relative; }

    .gender-option input[type="radio"]{
      position:absolute;
      opacity:0;
      width:0;height:0;
    }

    .gender-option label{
      display:flex;
      align-items:center;
      justify-content:center;
      gap:0.5rem;
      padding:0.75rem 0.5rem;
      background:var(--input-bg);
      border:1px solid rgba(255,255,255,0.1);
      border-radius:12px;
      cursor:pointer;
      color:var(--text-muted);
      font-size:0.8rem;
      font-weight:400;
      letter-spacing:0.06em;
      text-transform:uppercase;
      transition:all 0.3s;
      margin-bottom:0;
    }

    .gender-option label:hover{
      border-color:rgba(201,168,76,0.4);
      color:var(--text-light);
    }

    .gender-option input[type="radio"]:checked + label{
      background:rgba(201,168,76,0.15);
      border-color:var(--gold);
      color:var(--gold-light);
      box-shadow:0 0 16px rgba(201,168,76,0.1);
    }

    .skill-hint{
      font-size:0.68rem;
      color:var(--text-muted);
      margin-top:0.4rem;
      letter-spacing:0.03em;
    }

    .salary-prefix{
      position:absolute;
      left:1rem;
      top:50%;
      transform:translateY(-50%);
      color:var(--gold);
      font-size:0.9rem;
      font-weight:500;
      pointer-events:none;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button{
      -webkit-appearance:none;
      margin:0;
    }

    .btn-submit{
      width:100%;
      margin-top:0.5rem;
      padding:1rem;
      background:linear-gradient(135deg,#b8860b 0%, var(--gold) 50%, #e8c060 100%);
      background-size:200% 200%;
      border:none;
      border-radius:12px;
      color:#0a0a0f;
      font-family:'Jost',sans-serif;
      font-size:0.82rem;
      font-weight:600;
      letter-spacing:0.2em;
      text-transform:uppercase;
      cursor:pointer;
      transition:all 0.4s ease;
      position:relative;
      overflow:hidden;
      box-shadow:0 4px 24px rgba(201,168,76,0.3);
      opacity:0;
      animation:slideIn 0.5s 0.5s cubic-bezier(0.23,1,0.32,1) forwards;
    }

    .btn-submit::before{
      content:'';
      position:absolute;
      inset:0;
      background:linear-gradient(135deg,transparent 40%, rgba(255,255,255,0.25) 50%, transparent 60%);
      transform:translateX(-100%);
      transition:transform 0.6s ease;
    }

    .btn-submit:hover{
      background-position:right center;
      transform:translateY(-2px);
      box-shadow:0 8px 36px rgba(201,168,76,0.45);
    }
    .btn-submit:hover::before{ transform:translateX(100%); }
    .btn-submit:active{ transform:translateY(0); }

    .form-footer{
      text-align:center;
      margin-top:1.5rem;
      font-size:0.72rem;
      color:var(--text-muted);
      letter-spacing:0.04em;
      opacity:0;
      animation:slideIn 0.5s 0.6s forwards;
    }
    .form-footer a{ color:var(--gold); text-decoration:none; }

    @media (max-width:480px){
      .form-card{ padding:2rem 1.6rem; }
      .form-title{ font-size:2rem; }
    }
  </style>
</head>
<body>

  <!-- Background atmosphere -->
  <div class="bg-blob bg-blob-1"></div>
  <div class="bg-blob bg-blob-2"></div>
  <div class="bg-blob bg-blob-3"></div>

  <!-- Form card -->
  <div class="form-card">
    <div class="form-header">
      <div class="form-badge">✦ Faculty Portal</div>
      <h1 class="form-title">Create <span>Teacher</span></h1>
      <p class="form-subtitle">Register a new faculty member to the system</p>
    </div>

    <div class="divider"></div>

    <!-- Take Method for thorow data from controller to form -->
      <form action="{{route('teacher.update', $teacher->id)}}" method="POST" autocomplete="on" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div class="form-group">
          <label for="name">Full Name</label>
          <div class="input-wrapper">
            <input type="text" id="name" name="name"
                  placeholder="e.g. Dr. Amelia Carter"
                  autocomplete="name"
                  value="{{ $teacher->name }}"
                  required/>

            <span class="input-icon">◈</span>

            @error('name')
              <p style="color:red">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Gender -->
        <div class="form-group">
          <label>Gender</label>
          <div class="gender-group">

            <div class="gender-option">
              <input type="radio" name="gender" id="male" value="male" {{ $teacher->gender=='male'?'checked':'' }} required/>
              <label for="male">♂ Male</label>
            </div>

            <div class="gender-option">
              <input type="radio" name="gender" id="female" value="female" {{ $teacher->gender=='female'?'checked':'' }} required/>
              <label for="female">♀ Female</label>
            </div>

            <div class="gender-option">
              <input type="radio" name="gender" id="other" value="other" {{ $teacher->gender=='other'?'checked':'' }} required/>
              <label for="other">⊕ Other</label>
            </div>
          </div>

          @error('gender')
            <p style="color:red">{{ $message }}</p>
          @enderror
        </div>

        <!-- Skills -->
        <div class="form-group">
          <label for="skill-input">Skills</label>
          <div class="input-wrapper">
            <input type="text"
                  id="skill-input"
                  name="skill"
                  placeholder="e.g. Mathematics, Physics, English…"
                  value="{{ $teacher->skill }}"
                  autocomplete="off"
                  required/>

            <span class="input-icon">✦</span>
          </div>

          @error('skill')
            <p style="color:red">{{ $message }}</p>
          @enderror

          <p class="skill-hint">Separate multiple skills with commas</p>
        </div>

        <!-- Salary -->
        <div class="form-group">
          <label for="salary">Monthly Salary</label>
          <div class="input-wrapper">
            <input type="number"
                  id="salary"
                  name="salary"
                  placeholder="e.g. 45,000"
                  value="{{ $teacher->salary }}"
                  min="0"
                  inputmode="numeric"
                  required/>

            <span class="salary-prefix">$</span>
          </div>

          @error('salary')
            <p style="color:red">{{ $message }}</p>
          @enderror
        </div>
         <div class="row mt-3">
                <div class="col-12">
                    <label for="" class="mb-3">Image</label>
                    <input type="file" name="image" id="" class="form-control" >
                    <img src="{{ asset('storage/'.$teacher->image) }}" alt="" width="50px">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-submit">✦Save</button>
      </form>


    <p class="form-footer">Manage existing staff in the <a href="#">Faculty Dashboard →</a></p>
  </div>

</body>
</html>
