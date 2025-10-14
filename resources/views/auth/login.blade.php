<x-guest-layout>
    <style>
        body {
            background-color: #f4f6f9;
        }
        .login-card {
            max-width: 420px;
            margin: 60px auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.1);
            padding: 40px 30px;
            position: relative;
        }
        .login-logo {
            position: absolute;
            top: -45px;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
        }
        .login-logo img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
        .btn-gradient {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            color: white;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-gradient:hover {
            transform: scale(1.03);
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }
        .register-btn {
            background: black;
            color: white;
            font-weight: 600;
            border-radius: 30px;
            padding: 10px 25px;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }
        .register-btn:hover {
            background: #333;
            transform: scale(1.05);
        }
    </style>

   

        <h4 class="mb-4 mt-4">Sign in to your account</h4>

        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-3 text-start">
                <label for="email" class="fw-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="form-control form-control-lg" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
            </div>

            <div class="form-group mb-3 text-start">
                <label for="password" class="fw-semibold">Password</label>
                <input id="password" type="password" name="password"
                       class="form-control form-control-lg" required>
                <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none small text-primary">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-gradient w-100 py-2">🔒 Log In</button>
        </form>
    </div>

    <div class="text-center mt-4">
        <p>Don't have an account?</p>
        <a href="{{ route('register') }}" class="register-btn">📝 Register Now</a>
    </div>
</x-guest-layout>
