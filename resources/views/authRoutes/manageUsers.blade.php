@extends('layouts.appAdmin')

@section('content')
<main role="main">
  
      <section class="panel important">
          @if(session()->has('message'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{ session()->get('message') }}.
            </div>
          @endif
      </section>

      <section class="panel important">
        <h2>Good Afternoon,Jacob</h2>
        <p>Have a nice day!</p>
      </section>

      <section class="panel manageUser important">
        <h3>Add Admin</h3>
        <form method="POST" action="{{ route('manageUsers') }}">
          @csrf
          <label for="name">Name</label>
          
          <input id="name" type="text" placeholder="Name..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          <label for="email">Email</label>
          
          <input id="email" type="email" placeholder="Email..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          <label for="pass">Password</label>
          
          <input id="password" type="password" placeholder="Password..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
              <br><br>
          @enderror
          <button type="submit" class="submit">Add Admin</button>
        </form>

        <div class="adminDetails">
          <h3>Admin Details</h3>
          
         
          <table>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
            @if(count($users))
              @foreach($users as $key => $user)
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>

                <td>
                  <form id="delete-user" action="{{ url('/manageUsers',$user->id) }}" method="POST" >
                                        @csrf
                                        <!-- <a type="submit"><img style="cursor: pointer;" src="{{ asset('img/icons8-delete-24.png') }}" alt=""></a> -->
                                        <button class="no-style" type="submit" ><img style="cursor: pointer;" src="./../img/delete.svg" alt=""></button>
                                    </form> 
                                    </td>
              </tr>
              @endforeach
            @else
              <tr>No Admin Found</tr>
            @endif
          </table>
        </div>
      </section>

    </main>
    
@endsection
