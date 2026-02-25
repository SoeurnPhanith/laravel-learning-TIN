<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Student</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body{
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Liberation Sans", sans-serif;
      min-height: 100vh;
      display: grid;
      place-items: center;
      padding: 28px;
      background:
        radial-gradient(900px 600px at 15% 10%, rgba(99,102,241,0.18), transparent 60%),
        radial-gradient(900px 600px at 85% 20%, rgba(14,165,233,0.16), transparent 55%),
        radial-gradient(900px 600px at 60% 90%, rgba(34,197,94,0.10), transparent 55%),
        linear-gradient(180deg, #f8fafc, #eef2ff);
      color: #0f172a;
    }

    .wrap{
      width: 100%;
      max-width: 920px;
      display: grid;
      grid-template-columns: 1.05fr 1fr;
      gap: 18px;
      align-items: stretch;
    }

    /* LEFT INFO PANEL */
    .panel{
      border-radius: 22px;
      padding: 26px 24px;
      position: relative;
      overflow: hidden;
      background:
        radial-gradient(600px 420px at 20% 15%, rgba(255,255,255,0.65), rgba(255,255,255,0.10) 70%),
        linear-gradient(135deg, rgba(99,102,241,0.90), rgba(14,165,233,0.85));
      box-shadow: 0 20px 55px rgba(15, 23, 42, 0.18);
      border: 1px solid rgba(255,255,255,0.25);
      color: #fff;
    }

    .panel::before{
      content:"";
      position:absolute;
      inset:-120px -120px auto auto;
      width: 260px;
      height: 260px;
      background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.55), rgba(255,255,255,0.12) 55%, transparent 70%);
      transform: rotate(15deg);
    }
    .panel::after{
      content:"";
      position:absolute;
      inset:auto auto -140px -140px;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.30), rgba(255,255,255,0.10) 55%, transparent 70%);
    }

    .brand{
      position: relative;
      display:flex;
      align-items:center;
      gap:10px;
      margin-bottom: 18px;
    }
    .dot{
      width: 12px;
      height: 12px;
      border-radius: 999px;
      background: rgba(255,255,255,0.95);
      box-shadow: 0 0 0 6px rgba(255,255,255,0.20);
    }
    .brand h2{
      font-size: 16px;
      font-weight: 800;
      letter-spacing: 0.2px;
      opacity: 0.95;
    }

    .panel h1{
      position: relative;
      font-size: 30px;
      line-height: 1.15;
      letter-spacing: -0.4px;
      margin-top: 6px;
    }
    .panel p{
      position: relative;
      margin-top: 12px;
      font-size: 14px;
      line-height: 1.55;
      opacity: 0.92;
      max-width: 42ch;
    }

    .tips{
      position: relative;
      margin-top: 18px;
      padding: 14px 14px;
      border-radius: 16px;
      background: rgba(255,255,255,0.16);
      border: 1px solid rgba(255,255,255,0.22);
      backdrop-filter: blur(6px);
    }
    .tips ul{
      list-style: none;
      display: grid;
      gap: 10px;
      margin-top: 10px;
    }
    .tips li{
      display:flex;
      gap:10px;
      align-items:flex-start;
      font-size: 13px;
      line-height: 1.45;
      opacity: 0.95;
    }
    .tick{
      flex: 0 0 auto;
      width: 18px;
      height: 18px;
      border-radius: 6px;
      background: rgba(255,255,255,0.22);
      border: 1px solid rgba(255,255,255,0.28);
      display:grid;
      place-items:center;
      font-weight: 900;
    }

    /* FORM CARD */
    .card{
      border-radius: 22px;
      padding: 22px;
      background: rgba(255,255,255,0.78);
      border: 1px solid rgba(226,232,240,0.75);
      box-shadow: 0 18px 50px rgba(15,23,42,0.10);
      backdrop-filter: blur(10px);
    }

    .card-head{
      display:flex;
      justify-content:space-between;
      align-items:flex-start;
      gap: 12px;
      margin-bottom: 14px;
    }
    .card-head .meta h3{
      font-size: 16px;
      font-weight: 800;
      color: #0f172a;
      letter-spacing: -0.2px;
    }
    .card-head .meta span{
      display:block;
      margin-top: 4px;
      font-size: 12px;
      color: #64748b;
    }
    .badge{
      padding: 8px 10px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 800;
      color: #4f46e5;
      background: rgba(99,102,241,0.12);
      border: 1px solid rgba(99,102,241,0.18);
      white-space: nowrap;
    }

    form{
      margin-top: 8px;
    }
    .grid{
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    .field{
      display:flex;
      flex-direction:column;
      gap: 8px;
    }

    label{
      font-size: 12px;
      font-weight: 800;
      color:#334155;
      letter-spacing: 0.2px;
    }

    input, select{
      width: 100%;
      padding: 12px 12px;
      border-radius: 14px;
      border: 1px solid rgba(226,232,240,0.9);
      background: rgba(248,250,252,0.9);
      outline: none;
      font-size: 14px;
      color:#0f172a;
      transition: 0.15s ease;
    }

    input::placeholder{
      color:#94a3b8;
    }

    input:focus, select:focus{
      background:#fff;
      border-color: rgba(99,102,241,0.65);
      box-shadow: 0 0 0 5px rgba(99,102,241,0.14);
    }

    .full{ grid-column: 1 / -1; }

    .radio-row{
      display:flex;
      gap:10px;
      flex-wrap: wrap;
      padding: 10px;
      border-radius: 14px;
      border: 1px solid rgba(226,232,240,0.9);
      background: rgba(248,250,252,0.9);
    }
    .radio{
      display:flex;
      align-items:center;
      gap:8px;
      padding: 10px 12px;
      border-radius: 999px;
      border: 1px solid rgba(226,232,240,0.95);
      background: #fff;
      font-size: 13px;
      color:#0f172a;
      transition: 0.15s ease;
      user-select: none;
    }
    .radio input{
      accent-color: #4f46e5;
      transform: translateY(0.5px);
    }
    .radio:hover{
      transform: translateY(-1px);
      box-shadow: 0 10px 20px rgba(15,23,42,0.06);
    }

    .hint{
      font-size: 12px;
      color:#64748b;
      line-height: 1.45;
      margin-top: 2px;
    }

    /* custom file input */
    .file{
      position: relative;
      padding: 12px;
      border-radius: 14px;
      border: 1px dashed rgba(99,102,241,0.55);
      background: rgba(99,102,241,0.06);
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 10px;
    }
    .file strong{
      font-size: 13px;
      color:#0f172a;
    }
    .file span{
      font-size: 12px;
      color:#64748b;
    }
    .file input[type="file"]{
      position:absolute;
      inset:0;
      opacity:0;
      cursor:pointer;
    }
    .chip{
      padding: 8px 10px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 800;
      color:#0f172a;
      background: rgba(255,255,255,0.85);
      border: 1px solid rgba(226,232,240,0.95);
      white-space: nowrap;
    }

    .actions{
      display:flex;
      gap: 12px;
      justify-content:flex-end;
      margin-top: 16px;
      flex-wrap: wrap;
    }

    button{
      border: 0;
      cursor:pointer;
      padding: 12px 16px;
      border-radius: 14px;
      font-weight: 900;
      font-size: 14px;
      transition: 0.15s ease;
    }

    .btn-secondary{
      background: #fff;
      color:#0f172a;
      border: 1px solid rgba(226,232,240,0.95);
    }
    .btn-secondary:hover{
      background: #f8fafc;
      transform: translateY(-1px);
    }

    .btn-primary{
      background: linear-gradient(135deg, #4f46e5, #0ea5e9);
      color:#fff;
      box-shadow: 0 14px 25px rgba(79,70,229,0.22);
    }
    .btn-primary:hover{
      transform: translateY(-1px);
      box-shadow: 0 18px 30px rgba(79,70,229,0.26);
    }

    /* responsive */
    @media (max-width: 860px){
      .wrap{ grid-template-columns: 1fr; }
      .panel{ order: 2; }
      .card{ order: 1; }
    }
    @media (max-width: 520px){
      .grid{ grid-template-columns: 1fr; }
      .actions button{ width:100%; }
      .actions{ justify-content:stretch; }
    }
  </style>
</head>
<body>

  <div class="wrap">

    <section class="panel" aria-hidden="true">
      <div class="brand">
        <div class="dot"></div>
        <h2>Student Manager</h2>
      </div>

      <h1>Add New Student<br/>Beautiful & Clean Form</h1>
      <p>
        This form matches your Laravel table:
        <b>full_name</b>, <b>gender</b>, <b>age</b>, <b>phone_number</b>, <b>dob</b>, <b>image</b>.
      </p>

      <div class="tips">
        <div style="font-weight:900; font-size:13px;">Quick tips</div>
        <ul>
          <li><span class="tick">✓</span> Use correct phone number format.</li>
          <li><span class="tick">✓</span> Upload a clear student image.</li>
          <li><span class="tick">✓</span> Date of birth should be real.</li>
        </ul>
      </div>
    </section>

    <section class="card">
      <div class="card-head">
        <div class="meta">
          <h3>Student Information</h3>
          <span>All fields are required.</span>
        </div>
        <div class="badge">Add Student</div>
      </div>

      <!-- HTML + CSS only (no JS). Add action/method later for Laravel -->
      <form action="{{route('student.insert')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid">
`
          <div class="field full">
            <label for="full_name">Full Name</label>
            <input id="full_name" name="full_name" type="text" placeholder="Enter full name" required />
            <div class="hint">Saved into <b>full_name</b> column.</div>
          </div>

          <div class="field">
            <label>Gender</label>
            <div class="radio-row">
              <label class="radio"><input type="radio" name="gender" value="male" required> Male</label>
              <label class="radio"><input type="radio" name="gender" value="female" required> Female</label>
              <label class="radio"><input type="radio" name="gender" value="other" required> Other</label>
            </div>
            <div class="hint">Saved into <b>gender</b> column.</div>
          </div>

          <div class="field">
            <label for="age">Age</label>
            <input id="age" name="age" type="number" min="1" max="120" placeholder="e.g. 20" required />
            <div class="hint">Saved into <b>age</b> column.</div>
          </div>

          <div class="field">
            <label for="phone_number">Phone Number</label>
            <input id="phone_number" name="phone_number" type="tel" placeholder="e.g. 012345678" required />
            <div class="hint">Saved into <b>phone_number</b> column.</div>
          </div>

          <div class="field">
            <label for="dob">Date of Birth</label>
            <input id="dob" name="dob" type="date" required />
            <div class="hint">Saved into <b>dob</b> column.</div>
          </div>

          <div class="field full">
            <label>Student Image</label>
            <div class="file">
              <div>
                <strong>Upload image</strong><br>
                <span>PNG, JPG, JPEG</span>
              </div>
              <div class="chip">Choose File</div>
              <input type="file" name="image" accept="image/*" required />
            </div>
            <div class="hint">
              Your table uses <b>longText('image')</b>. Backend can store image path (recommended) or base64.
            </div>
          </div>

        </div>

        <div class="actions">
          <button class="btn-secondary" type="reset">Clear</button>
          <button class="btn-primary" type="submit">Save Student</button>
        </div>
      </form>
    </section>

  </div>

</body>
</html>