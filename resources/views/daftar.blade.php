<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Google Sans', sans-serif;
            background-color: #f0f4f9; /* Light grey background */
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .register-form {
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        .register-form h4 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .register-form p {
            color: #6c757d; /* Grey text */
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

        .form-control input, .form-control textarea {
            font-size: 16px; /* Adjust the input text font size here */
        }

        .form-control input::placeholder, .form-control textarea::placeholder {
            font-size: 20px; /* Adjust the placeholder font size here */
        }

        .form-label {
            font-weight: bold;
            text-align: left;
            display: block;
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background-color: #259A25; /* Custom button color */
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            margin-top: 1rem;
            width: 100%; /* Match width with register-form */
            color: white; /* Change text color to white */
            font-family: 'Google Sans', sans-serif;
            font-size: 17px; /* Adjust font size here */
        }

        .login-link {
            margin-top: 1rem;
            display: block;
            color: #259A25;
            font-size: 16px;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .register-form {
                padding: 1rem;
                width: 90%;
            }

            .form-control, .btn-primary {
                width: 100%; /* Match width with register-form in mobile */
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-form">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 100px; margin-bottom: -15px; margin-top: 10px;">
            <h4 class="text-center">Daftar</h4>
            <p class="text-center mb-4">Silakan buat akun untuk melanjutkan pendaftaran</p>
            <form method="post" action="{{ url('daftarsimpan') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password">
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">No. HP</label>
                    <input type="number" class="form-control" id="nohp" name="nohp" required placeholder="Masukkan No. HP">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required placeholder="Masukkan Alamat" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
            <a href="{{ url('login') }}" class="login-link">Sudah memiliki akun? Login</a>
        </div>
    </div>
</body>
</html>
