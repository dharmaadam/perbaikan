<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CareIT - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #4f46e5, #3b82f6, #06b6d4);
      background-size: 400% 400%;
      animation: gradientBG 15s ease infinite;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    @keyframes gradientBG {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    .login-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      padding: 40px;
      width: 100%;
      max-width: 400px;
      text-align: center;
      transition: all 0.3s ease-in-out;
    }
    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    .login-card img {
      max-width: 100px;
      margin-bottom: 15px;
    }

    .login-card h4 {
      font-weight: 700;
      color: #1e293b;
    }
    .login-card p {
      font-size: 14px;
      color: #64748b;
      margin-bottom: 25px;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
    }

    .btn-primary {
      background: #6366f1;
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-primary:hover {
      background: #4f46e5;
      transform: scale(1.02);
    }

    .btn-success {
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-success:hover {
      background: #059669;
      transform: scale(1.02);
    }
  </style>
</head>
<body>

<div class="login-card">
  <!-- Logo -->
  <img src="{{ asset('images/logo ITcare.png') }}" alt="Logo CareIT">

  <h4>CareIT</h4>
  <p>Peduli Pada Perangkat IT</p>

  <!-- Alert Error -->
  @if($errors->has('loginError'))
      <div class="alert alert-danger text-start">
          {{ $errors->first('loginError') }}
      </div>
  @endif

  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3 text-start">
      <label class="form-label fw-semibold">Username</label>
      <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
    </div>
    <div class="mb-3 text-start">
      <label class="form-label fw-semibold">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
  </form>
</div>


</body>
</html>
