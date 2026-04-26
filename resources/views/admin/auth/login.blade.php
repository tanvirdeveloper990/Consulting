<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login | Consulting Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Consulting Professional Gradient */
            background: linear-gradient(-45deg, #0f172a, #1e293b, #0369a1, #0c4a6e);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Abstract Circles for depth */
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
            z-index: 0;
        }

        .shape-1 { width: 300px; height: 300px; top: -100px; right: -50px; }
        .shape-2 { width: 200px; height: 200px; bottom: -50px; left: -30px; }

        /* Modern Glassmorphism Card */
        .login-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-title {
            color: #ffffff;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            color: #94a3b8;
            font-size: 14px;
        }

        /* Form Styling */
        .form-label {
            color: #e2e8f0;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .input-group {
            background: rgba(255, 255, 255, 0.07);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
        }

        .input-group:focus-within {
            border-color: #38bdf8;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: #94a3b8;
            padding-left: 15px;
        }

        .form-control {
            background: transparent !important;
            border: none;
            color: #fff !important;
            padding: 12px 15px;
            font-size: 15px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-control::placeholder {
            color: #64748b !important;
        }

        /* Login Button */
        .btn-login {
            background: #38bdf8;
            color: #0f172a;
            border: none;
            padding: 12px;
            font-weight: 700;
            border-radius: 12px;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #7dd3fc;
            transform: translateY(-1px);
            box-shadow: 0 10px 20px -5px rgba(56, 189, 248, 0.4);
        }

        .remember-text {
            color: #94a3b8;
            font-size: 13px;
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .form-check-input:checked {
            background-color: #38bdf8;
            border-color: #38bdf8;
        }
    </style>
</head>

<body>

    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>

    <div class="login-card">
        <div class="login-header">
            <h2 class="login-title">Admin Portal</h2>
            <p class="login-subtitle">Consulting Management System</p>
        </div>

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control" placeholder="admin@consulting.com" required>
                </div>
                @error('email')
                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                    <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
                        <i id="eyeIcon" class="fa-solid fa-eye"></i>
                    </span>
                </div>
                @error('password')
                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="remember-text">Keep me logged in</label>
                </div>
            </div>

            <button type="submit" class="btn btn-login w-100">Access Dashboard</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const pass = document.getElementById("password");
            const icon = document.getElementById("eyeIcon");

            if (pass.type === "password") {
                pass.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                pass.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>

</body>
</html>