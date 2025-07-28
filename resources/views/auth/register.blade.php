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

.login-wrapper {
    width: 100%;
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
        <form method="POST" action="{{route('reg.post')}}">
            @csrf
            <img class="mb-4" src="{{ asset('img/Robot 2.png') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal"><b>Register</b></h1>
            <div class="form-floating mb-3">
                <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Enter Full name" value="{{old('fullname')}}">
                <label for="fullname">Full name</label>
                @error('fullname')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
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
          
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
             <div class="text-centre mt-3">
                 <span><b>Already have an account?</b> <a href="{{route('login')}}">Login</a></span>
            </div>
        </form>
    </div>
    <p class="copyright-block">Copyright © {{ now()->year }}</p>
</div>

</x-Authlayout>
