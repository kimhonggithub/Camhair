
<x-guest-layout>
<div class="container">
        
        <div class="login_center">

            <h2 class="log_in_text">Log In</h2>
            <x-jet-validation-errors class="mb-4" />
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" :value="old('email')" required autofocus>
                  
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input placeholder="Password" name="password" type="password" class="form-control" id="exampleInputPassword1" required autocomplete="current-password">
                </div>
                <div class="mb-3 form-check">
                  <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                  <a class="log_forgot" href="{{route('password.request')}}">Forgot Password?</a>
                </div>
                <div>
                  
                  <button type="submit" class="btn btn_custom">Submit</button>
                </div>
              </form>
        </div>
</div>
</x-guest-layout>