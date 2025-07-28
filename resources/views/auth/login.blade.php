<x-Authlayout>
    <x-slot:heading>
        LOGIN PAGE
    </x-slot:heading>

    <x-slot:styles>
        <style>
       body {
            height:100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
}
.form-check-label{
    font-weight: normal;
}


.login-wrapper {
    width: 95%;
    max-width: 360px;
    margin: 0 auto;
    position: relative;
}
.form-signin {
    width: 100%;
    background: #ffffff;
    border-radius: 5px;
    position: relative;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);}

.login-content {
    background: #faf8f8;
    border-radius: 5px 5px 0 0;
    padding: 1rem;
}

.form-signin input[type="email"],
.form-signin input[type="password"] {
    margin-bottom: 15px;
}

.copyright-block {
    margin-top: 5px; /* slightly overlaps bottom spacing */
    background-color: #009688;
    color: #ffffff;
    text-align: center;
    border-radius: 0 0 5px 5px; /* Rounded bottom corners */
    padding: 2px;
    font-size: 0.95rem;
    font-weight: 500;
    width: 100%; /* 🔥 This makes it equal to form width */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}

        </style>
    </x-slot:styles>

    <div class="login-wrapper">
    <div class="login-content form-signin">
        <form method="POST" action="{{route('login.post')}}">
            @csrf
           @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

            <img class="mb-4" src="{{ asset('img/Robot 1.png') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal"><b>Login</b></h1>
            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
                <label class="form-check-label" for="checkDefault">Remember me</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            {{-- <span>new here? <a href="">Sign up</a></span> --}}
            {{-- <p class="text-center mt-3">New here? <a href="#">Sign up</a></p> --}}
            <div class="text-left mt-3">
                 <span><b>New here?</b> <a href="{{route('reg-user')}}">Sign up</a></span>
            </div>
            
        </form>
    </div>
    <p class="copyright-block">Copyright © {{ now()->year }}</p>
</div>

</x-Authlayout>
