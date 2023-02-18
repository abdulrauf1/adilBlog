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

      <section class="panel writeBlog important">
        <form action=" {{ url('updatePlan',$plan[0]->id) }} " method="post">
          @csrf
        
          
          <label for="title" clas="label"><img src="./../img/edit.svg" alt=""> Title</label>
          <input type="text" placeholder="Add Title..." class="@error('title') is-invalid @enderror" id="title" name="title" value="{{ $plan[0]->title }}">
          @error('title')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          
          

          <label for="description" class="label"><img src="./../img/edit.svg" alt="">Description</label>
          <textarea name="desc" id="desc" value="{{ $plan[0]->description }}" class="@error('desc') is-invalid @enderror" style="height: 99px;">{{ $plan[0]->description }}</textarea>
          @error('desc')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror

          <label for="paymentInstallments" clas="label"><img src="./../img/edit.svg" alt=""> Payment Installments / month</label>
          <input type="text" class="@error('paymentInstallments') is-invalid @enderror" id="paymentInstallments" name="paymentInstallments" value="{{$plan[0]->paymentInstallments }}">
          @error('paymentInstallments')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror

          <label for="paymentAmount" clas="label"><img src="./../img/edit.svg" alt=""> paymentAmount Total</label>
          <input type="text"  class="@error('paymentAmount') is-invalid @enderror" id="paymentAmount" name="paymentAmount" value="{{$plan[0]->paymentAmount }}">
          @error('paymentAmount')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror

          <button class="submit">Update</button>
        </form>
      </section>
    </main>
    
@endsection
