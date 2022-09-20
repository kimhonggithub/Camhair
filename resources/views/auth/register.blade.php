
<x-guest-layout>

<div class="container">
        
            <div class="login_center">

                <h2 class="log_in_text">Register</h2>
                <x-jet-validation-errors class="mb-4" />
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" :value="name" required autofocus autocomplete="name">
                        
                      </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" :value="email">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Rewrite Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required autocomplete="new-password">
                      </div>
                  
                    <button type="submit" class="btn btn_custom">Submit</button>
                  </form>
            </div>
    </div>
</x-guest-layout>