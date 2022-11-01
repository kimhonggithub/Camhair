
<x-base-layout>
    <div class="form-area p-5" style="animation: downOut 2s;">
        <div class="container">
            <div class="row single-form g-0">
                <div class="col-sm-12 col-lg-5">
                    <img src="{{asset('image/img/login_img.jpg')}}" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-sm-12 col-lg-7">
                    <div class="right">
                        <x-jet-validation-errors class="mb-4" />
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Email Address" :value="old('email')"
                                    required autofocus>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input placeholder="Password" name="password" type="password" class="form-control"
                                    id="exampleInputPassword1" required autocomplete="current-password">
                            </div>
                            <div class="mb-3 form-check">
                                <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                <a class="log_forgot" href="{{route('password.request')}}">Forgot Password?</a>

                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn_custom">Log in</button>
                            </div>
                            <a class="lead text-muted mt-suto" style="text-decoration: none;" href="{{route('register')}}">Don't have an account? <strong class="fw-bold">Register here</strong></a>
                        </form>
                        <hr>
                        <a href="{{route('termsCod')}}" class="text-muted" style="text-decoration: none;">Terms of use </a><a href="{{route('policy')}}" class="text-muted" style="text-decoration: none;">. Privacy policy</a></p>
                    </div>
                  
                </div>
                
            </div>
        </div>
    </div>
    @include('livewire/frontend/contact/contact-css')
</x-base-layout>

