<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Google Sans', sans-serif;
            background-color: #f0f4f9; /* Light grey background */
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-form h4 {
            font-size: 30px;
            margin-bottom: -10px; /* Adjusted margin */
        }

        .login-form p {
            color: #6c757d; /* Grey text */
            margin-bottom: 35px; /* Increased margin */
        }

        .form-control {
            position: relative;
            margin-bottom: 1rem;
            border-radius: 10px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            width: calc(100% - 2rem);
            font-family: 'Google Sans', sans-serif;
        }

        .form-control input {
            width: calc(100% - 2.5rem); /* Space for the eye icon */
            padding-right: 2.5rem;
            font-size: 16px; /* Adjust the input text font size here */
        }

        .form-control input::placeholder {
            font-size: 20px; /* Adjust the placeholder font size here */
        }

        .form-label {
            font-weight: bold;
            text-align: left;
            display: block;
            margin-bottom: 0.5rem;
        }

        .toggle-password {
            position: absolute;
            margin-left: -40px;
            margin-top: 6px; 
            cursor: pointer;
            user-select: none;
        }

        .btn-primary {
            background-color: #259A25; /* Custom button color */
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            margin-top: 0rem;
            width: 100%; /* Match width with login-form */
            color: white; /* Change text color to white */
            font-family: 'Google Sans', sans-serif;
            font-size: 17px; /* Adjust font size here */
        }

        .btn-outline-secondary {
            border: 1px solid #6c757d;
            border-radius: 10px;
            padding: 0.75rem;
            margin-top: 1rem;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            width: calc(100% - 2rem);
            font-family: 'Google Sans', sans-serif;
        }

        .btn-outline-secondary img {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        .pw {
            position: relative;
        }

        .pw img {
            height: 27px;
        }

        @media (max-width: 576px) {
            .login-form {
                padding: 1rem;
                width: 90%;
            }

            .form-control, .btn-primary, .btn-outline-secondary {
                width: 100%; /* Match width with login-form in mobile */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 100px; margin-bottom: -15px; margin-top: 10px;">
            <h4 class="text-center">Silakan Masuk</h4>
            <p class="text-center mb-4">Pendaftaran MTs DDI Bowong Cindea Bungoro</p>
            <form method="post" action="{{ url('logincek') }}">
                @csrf
                <div class="mb-4"> <!-- Adjusted margin -->
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Contoh@gmail.com">
                </div>
                <div class="pw mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password Anda">
                    <span class="toggle-password" onclick="togglePasswordVisibility()">
                        <img src="{{ asset('img/eye.png')}}" alt="Show/Hide Password" id="togglePasswordIcon">
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Masuk</button>
            </form>
            <p class="text-center mt-3">
                Belum memiliki akun? <a href="{{ url('daftar') }}">Daftar</a>
            </p>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var togglePasswordIcon = document.getElementById("togglePasswordIcon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePasswordIcon.src = "{{ asset('img/eye.png') }}";
            } else {
                passwordField.type = "password";
                togglePasswordIcon.src = "{{ asset('img/eye-off.png')}}";
            }
        }
    </script>
</body>
</html>
