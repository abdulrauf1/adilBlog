@extends('layouts.appPublic')

@section('content')
<div class="">
    <!-- hero section here ======= -->
    <div class="hero">
      <div class="left">
        <div class="inner">
          <h1>
            Your Personal Guide <br />
            to Win With Money
          </h1>
          <p>
            Whether you are a brand new church planter with a dream to change
            the world or a seasoned ministry veteran with decades of experience,
            these posts will help you articulate what you've always felt deep
            within you.
          </p>
        </div>
        <img class="heroBox" src="./img/20 1.svg" alt="" />
        <img class="quote" src="./img/quote.png" alt="quote" />
      </div>
      <div class="right">
        <img src="./img/heroRight.svg" alt="" />
      </div>
    </div>

    <!-- about section here ========= -->
    <div class="about" id="about">
      <h4>About Us</h4>
      <h1>
        How Fast box works
      </h1>
      <p>
        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
        <br />
        sint. Velit officia consequat duis enim velit mollit. Exercitation venia
      </p>
      <div class="row1">
        <div class="card1">
          <img src="./img/about1.svg" alt="img" />
          <div class="inner">
            <h4>You can get daily blog update</h4>
            <p>
              Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              amet sint. Velit officia consequat duis enim velit mollit.
              Exercitation venia
            </p>
          </div>
        </div>
        <div class="card1">
          <img src="./img/about1.svg" alt="img" />
          <div class="inner">
            <h4>You can get daily blog update</h4>
            <p>
              Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              amet sint. Velit officia consequat duis enim velit mollit.
              Exercitation venia
            </p>
          </div>
        </div>
        <div class="card1">
          <img src="./img/about1.svg" alt="img" />
          <div class="inner">
            <h4>You can get daily blog update</h4>
            <p>
              Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              amet sint. Velit officia consequat duis enim velit mollit.
              Exercitation venia
            </p>
          </div>
        </div>
        <div class="card1">
          <img src="./img/about1.svg" alt="img" />
          <div class="inner">
            <h4>You can get daily blog update</h4>
            <p>
              Amet minim mollit non deserunt ullamco est sit aliqua dolor do
              amet sint. Velit officia consequat duis enim velit mollit.
              Exercitation venia
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- latest blog section here ===================== -->
    <div class="latestBlog">
      <h4>Latest Blogs</h4>
      <h1>
        Read latest blogs <br />
        abour daily life
      </h1>
      <p>
        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
        <br />
        sint. Velit officia consequat duis enim velit mollit. Exercitation venia
      </p>
      <div class="row1">

      @if(!empty($blogs))
            @foreach($blogs as $key => $blog)
              <div class="card1" onclick="location.href='{{ url('blogDeatils',$blog->id) }}'">
                <img src="/storage/{{ $blog->blogURL }}" alt="" />
                <a href="#">{{$blog->category?'Un-Categorized':'Health'}}</a>
                
                  <div class="card1Body">
                    <h2>
                      {{$blog->title}}
                    </h2>
                    <p>
                      {{substr($blog->description,0,100)}}
                    </p>
                    
                  </div>
                  <div class="footer">
                    <p>UNSPOKEN SMILES | {{date_format($blog->created_at,"F d, Y")}}</p>
                  </div>
              </div>
            @endforeach
          @else
            No Blogs Available
          @endif
        
      </div>
    </div>

  

     <!-- how it works here ===================== -->
     <div class="howWorks">
      <h4>Latest Blogs</h4>
      <h1>What does it cost?</h1>
      <p>
        We offer 4 credit builder plans plans to fit your goals and your budget.
      </p>
      <div class="row1">
        <div class="price">
          <div class="card1">
            <img src="./img/offer1.svg" alt="" />
            <p>
              PERSONAL FINANCIAL <br />
              SET-UP
            </p>
            <h4>$ {{$plans[0]->paymentInstallments}}/mo</h4>
            <div class="admin">
              <p>Budgeting</p>
              <p>Debt pay-off plan</p>
              <p>Retirement Savings Plan</p>
              <p>Simple Estate Plan</p>
              <p>Financial Goal Setting</p>
              <p>$ {{$plans[0]->paymentAmount}} set-up Free</p>
              <a href="{{url('proceedPayment',$plans[0]->id) }}">Get Started</a>
            </div>
          </div>
        </div>
        <div class="price">
          <div class="card1">
            <img src="./img/offer2.svg" alt="" />
            <p>
              SELF-EMLOYED FINANCIAL <br />
              PLAN SET-UP
            </p>
            <h4>$ {{$plans[1]->paymentInstallments}}/mo</h4>
            <div class="admin">
              <p>Budgeting</p>
              <p>Tax Planning</p>
              <p>Debt pay-off plan</p>
              <p>Simple Estate Plan</p>
              <p>Financial Goal Setting</p>
              <p>$ {{$plans[1]->paymentAmount}} set-up Free</p>
            </div>
            <a href="{{url('proceedPayment',$plans[1]->id) }}">Get Started</a>
          </div>
        </div>
        <div class="price">
          <div class="card1">
            <img src="./img/offer3.svg" alt="" />
            <p>SELF-MOTIVATOR COURSE</p>
            <div class="admin">
              <p>Budgeting</p>
              <p>Tax Planning</p>
              <p>Debt pay-off plan</p>
              <p>Retirement Savings Plan</p>
              <p>Simple Estate Plan</p>
              <p>Financial Goal Setting</p>
              <p>$ {{$plans[2]->paymentAmount}} set-up Free</p>
            </div>
            <a href="{{url('proceedPayment',$plans[2]->id) }}">Get Started</a>
          </div>
          <div class="bottom">
            <div class="inner">
              <h6>
                6-weeks of detailed material to do this on your own. Homework
                spreadsheets and readings.
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- contact section here =================== -->
    <div class="contact" id="contactUs">
      @if(session()->has('success'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                {{ session()->get('message') }}.
            </div>
          @endif
      <h4>Latest Blogs</h4>
      <h1>What does it cost?</h1>
      <p>
        Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet
        sint. <br />
        Velit officia consequat duis enim velit mollit. Exercitation venia
      </p>
      <form action=" {{ url('contactUs') }} " method="post">
        @csrf
       
        <div class="left">
          <label for="name">FIRST NAME</label>
          <input type="text" name="firstName" id="firstName" class="@error('firstName') is-invalid @enderror" required/>
          @error('firstName')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          
          <label for="name">LAST NAME</label>
          <input type="text" name="lastName" id="lastName" class="@error('lastName') is-invalid @enderror" required />
          @error('lastName')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror

          <label for="name">EMAIL</label>
          <input type="email" name="email" id="name" class="@error('email') is-invalid @enderror" required />
          @error('email')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror

          <div class="emailPhone">
            <div class="ringPhone">
              <img src="./img/ringPhone.svg" alt="phone" />
              <span>
                <h3>Phone</h3>
                <p>111 111 111 111 111</p>
              </span>
            </div>
            <div class="ringPhone">
              <img src="./img/email.svg" alt="phone" />
              <span>
                <h3>E-MAIL</h3>
                <p>info@gmail.com</p>
              </span>
            </div>
          </div>
        </div>
        <div class="right">
          <label for="#"></label>
          <br />
          <textarea
            name="message"
            id="message"
            placeholder="LEAVE A MESSAGE FOR US"
            class="@error('message') is-invalid @enderror" required
          ></textarea>
          @error('message')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          
          <button type="submit" name="submit">SUBMIT</button>
          <div id="emailPhone">
            <div class="ringPhone">
              <img src="./img/ringPhone.svg" alt="phone" />
              <span>
                <h3>Phone</h3>
                <p>111 111 111 111 111</p>
              </span>
            </div>
            <div class="ringPhone">
              <img src="./img/email.svg" alt="phone" />
              <span>
                <h3>E-MAIL</h3>
                <p>info@gmail.com</p>
              </span>
            </div>
          </div>
        </div>
      </form>
    </div>

</div>
@endsection
