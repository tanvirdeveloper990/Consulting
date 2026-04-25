<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Inter", sans-serif;
        }

        body {
            height: 100vh;
            background: #0e0e0e;
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Rain Effect */
        .rain {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 0;
        }

        .drop {
            position: absolute;
            width: 2px;
            bottom: 100%;
            background: rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            animation: fall linear infinite;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }

        /* Login Card */
        .login-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 420px;
            padding: 35px 30px;
            border-radius: 16px;
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .login-title {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
        }

        .login-subtitle {
            color: #d1d5db;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.15) !important;
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #fff !important;
        }

        .form-control::placeholder {
            color: #d1d1d1 !important;
        }

        .input-group-text {
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #fff;
        }

        .btn-login {
            background: #00d4ff;
            border: none;
            padding: 10px 0;
            font-weight: 600;
            font-size: 16px;
            border-radius: 8px;
        }

        .btn-login:hover {
            background: #0ea5e9;
        }

        .remember-text {
            color: #d1d5db;
        }

        .text-danger {
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- Rain Background -->
    <div class="rain" id="rain"></div>

    <!-- Login Box -->
    <div class="login-card">

        <h2 class="login-title">Login Here</h2>
        <p class="login-subtitle">Sign in to continue</p>

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email">
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Password -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">

                <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
                    <i id="eyeIcon" class="fa-solid fa-eye"></i>

                </span>
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Remember -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember" class="form-check-input"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="remember-text">Remember Me</label>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-login w-100">Sign In</button>

        </form>

    </div>

    <!-- Rain Script -->
    <script>
        const rain = document.getElementById("rain");

        function createDrop() {
            const drop = document.createElement("div");
            drop.classList.add("drop");
            drop.style.left = `${Math.random() * window.innerWidth}px`;
            drop.style.animationDuration = `${0.4 + Math.random() * 0.6}s`;
            drop.style.opacity = 0.2 + Math.random() * 0.5;
            drop.style.height = `${15 + Math.random() * 25}px`;
            rain.appendChild(drop);

            setTimeout(() => drop.remove(), 1500);
        }

        setInterval(() => {
            for (let i = 0; i < 4; i++) createDrop();
        }, 60);
    </script>

    <!-- Password Toggle -->
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