
<div class="form-area p-5" style="animation: downOut 2s;">
    <div class="container">
        @if($success)
        <div class="alert alert-success" role="alert">

            <h4 class="alert-heading">Thank you for your email</h4>
            <hr>
            <p class="mb-0">{{ $success }}</p>
            </div>
        
        @endif
        <div class="row single-form g-0">
            <div class="col-sm-12 col-lg-4">
                <img src="{{asset('image/cotact.jpg')}}" class="img-fluid rounded-start" alt="">
                <!-- <div class="left"> -->

                <!-- <h2><span class="card-img-overlay">Contact Us for</span> <br>Business Enquies</h2> -->
                <!-- </div> -->
            </div>
            <div class="col-sm-12 col-lg-8">
                <div class="right">
                    <i class="fa fa-caret-left"></i>
                    <form wire:submit.prevent="contactFormSubmit" action="/contact" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your Name</label>
                            <input wire:model="name" type="text" class="form-control @error ('name') is-invalid @enderror" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input wire:model="email" type="email" name="email" class="form-control @error ('email') is-invalid @enderror" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="example@gmail.com" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Message</label>
                            <textarea wire:model="message" type="password" class="form-control @error ('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="Your message here..." >
                            {{ old('comment') }}
                            </textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                         
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('livewire/frontend/contact/contact-css')





