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
        
        <section class="panel dashboardContent important">
          <h3>Payment Details</h3>
          <h4>Payment Plans</h4>
          @if(!empty($paymentPlans))
            @foreach($paymentPlans as $key => $plan)
              <section class="panel mainTxt important">
                <div class="row1">
                  <div class="leftt">
                    <div class="top">
                      <p>
                        {{$plan->title}}
                      </p>
                    </div>
                    <p class="bottomPara">{{$plan->description}}</p>
                  </div>
                  <div class="rightt">
                    <div class="editDelete">
                        
                          
                          <button class="no-style" onclick="location.href='{{ url('/getUpdatePlan'.'/'.$plan->id) }}'" ><img style="cursor: pointer;" src="./../img/edit.svg" alt=""></button>
                        
                      </div>
                      <div class="b">
                        <button style="background: green;color:white"> $ {{$plan->paymentInstallments}} / Month</button>
                        <button style="background: green;color:white"> $ {{$plan->paymentAmount}} total</button>
                      </div>
                    
                  </div>
                  
                </div>
              </section>
            @endforeach
          @else
            <section class="panel mainTxt important">
              <div class="row1">
                No Payment Plan Found
              </div>
            </section>
          @endif

          
          <br><br><br>

          <div class="manageUser">
            <div class="adminDetails">
            <h3>Payment History</h3>

            <table>
            <tr>
              <th>Sr. #</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Plan</th>
              <th>Amount</th>
            </tr>
         

              @if(!empty($paymentHistory))
                @foreach($paymentHistory as $key => $payment)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->email}}</td>
                    <td>{{$payment->contact}}</td>
                    <td>{{$payment->title}}</td>
                    <td>{{($payment->paymentInstallments)?'$ '.$payment->paymentInstallments.' / month':'$ '.$payment->paymentAmount.' total'}}</td>
                  </tr>
                  
                @endforeach
            
              @else
                <tr>No Admin Found</tr>
              @endif
          </table>
            </div>
          </div>
          
          <div class="tabsNext">
            @if(!empty($paymentHistory))
              @if($paymentHistory->hasMorePages())
                <a href="{{$paymentHistory->previousPageUrl()}}">
                  <div class="prev">
                    <img src="./img/prev.svg" alt="" />
                  </div>
                </a>
                
              
                <a href="{{$paymentHistory->nextPageUrl()}}">
                  <div class="next">
                      <img src="./img/prev.svg" alt="" />
                  </div>
                </a>
              @endif
            @endif
          </div>
        </section>
      
      </main>
    
@endsection
