

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
<!-- login -->

<!-- <div class="container">
    <div class="login_center">
        <form>


            <div class="form-outline mb-4">
                <input type="email" id="form2Example1" class="form-control" />
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>


            <div class="row mb-4">
                <div class="col d-flex justify-content-center">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>

                <div class="col">

                    <a href="#!">Forgot password?</a>
                </div>
            </div>


            <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>


            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
    </div>
</div> -->
   