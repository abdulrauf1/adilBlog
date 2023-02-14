@extends('layouts.appAdmin')

@section('content')
    <main role="main">
        
    <section class="panel manageUser important">
        <h3>Profile - {{Auth::user()->name}}</h3>

        @if(session()->has('message'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{ session()->get('message') }}.
            </div>
        @endif
        

        @if(session()->has('error'))
            <div class="alertError">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{ session()->get('error') }}.
            </div>
        @endif

        <form method="POST" action="{{ url('/myAccount') }}">
          @csrf
          <label for="name">Name</label>
          
          <input id="name" type="text" placeholder="Name..." value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          <label for="email">Email</label>
          
          <input id="email" type="email" placeholder="Email..." value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror

          <label for="pass">Old Password</label>
          
          <input id="oldPassword" type="password" placeholder="Old Password..." class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required autocomplete="oldPassword">

          @error('oldPassword')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
              <br><br>
          @enderror

          <label for="pass">New Password</label>
          
          <input id="newPassword" type="password" placeholder="New Password..." class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="newPassword">

          @error('newPassword')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
              <br><br>
          @enderror
          <button type="submit" class="submit">Update</button>
        </form>

        
      </section>
      
    </main>
    
@endsection
