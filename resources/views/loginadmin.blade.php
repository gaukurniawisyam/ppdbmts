<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        }

        .form-header {
            margin-bottom: 1rem;
        }

        .logo {
            width: 100px; /* Default logo size */
            margin-bottom: 15px;
        }

        .title {
            font-size: 24px; /* Default title size */
            margin-bottom: -10px;
            margin-top: -10px;
            text-align: left;
        }

        .description {
            color: #6c757d; /* Grey text */
            text-align: left;
            font-size: 16px; /* Default description size */
        }

        .form-control {
            position: relative;
            margin-bottom: 1rem;
            border-radius: 4px;
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
            font-size: 14px; /* Adjust the placeholder font size here */
        }

        .form-label {
            font-weight: bold;
            text-align: left;
            display: block;
            margin-bottom: 0.5rem;
            font-size: 14px; /* Default label size */
        }

        .btn-primary {
            background-color: #259A25; /* Custom button color */
            border: none;
            border-radius: 4px;
            padding: 0.75rem;
            margin-top: 1rem;
            width: 100%; /* Match width with login-form */
            color: white; /* Change text color to white */
            font-family: 'Google Sans', sans-serif;
            font-size: 16px; /* Adjust button text size here */
        }

        .hidden {
            display: none;
        }

        @media (max-width: 576px) {
            .login-form {
                padding: 1rem;
                width: 90%;
            }

            .form-control, .btn-primary {
                width: 100%; /* Match width with login-form in mobile */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <div class="form-header">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
                <h4 class="title">Login Admin</h4>
                <p class="description">MTs DDI Bowong Cindea Bungoro</p>
            </div>
            <form id="loginForm" method="post" action="{{ url('loginadmincek') }}">
                @csrf
                <div id="emailStep">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="admin@gmail.com">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="showPasswordStep()">Next</button>
                </div>
                <div id="passwordStep" class="hidden">
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPasswordStep() {
            const emailInput = document.getElementById('email');
            const email = emailInput.value;

            fetch('/getadminname', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.name) {
                    document.querySelector('.title').innerText = `Selamat datang ${data.name}`;
                    document.getElementById('password').setAttribute('required', 'required'); // Add the required attribute
                } else {
                    document.querySelector('.title').innerText = 'Admin tidak ditemukan';
                }

                document.getElementById('emailStep').classList.add('hidden');
                document.getElementById('passwordStep').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching admin name:', error);
                document.querySelector('.title').innerText = 'Terjadi kesalahan';
            });
        }
    </script>
</body>
</html>
