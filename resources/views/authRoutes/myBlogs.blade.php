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

      @if(count($blogs))
        @foreach($blogs as $key => $blog)
          <section class="panel mainTxt important">
            <div class="row1">
              <div class="leftt">
                <div class="top">
                  <img src="/storage/{{ $blog->blogURL }}" alt="" />
                  <p>
                    {{$blog->title}}
                  </p>
                </div>
                <p class="bottomPara">UNSPOKEN SMILES | {{date_format($blog->created_at,"F d, Y")}}</p>
              </div>
              <div class="rightt">
                <div class="editDelete">
                  <!-- <form id="edit-blog" action="{{ url('/editBlog',$blog->id) }}" method="POST" >
                      @csrf
                      <button class="no-style" type="submit" ><img style="cursor: pointer;" src="./../img/edit.svg" alt=""></button>
                    </form>  -->
                    <form id="delete-blog" action="{{ url('/deleteBlog',$blog->id) }}" method="POST" >
                      @csrf
                      <button class="no-style" type="submit" ><img style="cursor: pointer;" src="./../img/delete.svg" alt=""></button>
                    </form>
                  </div>
                  <div class="b"><button>Health</button></div>
                
              </div>
              
            </div>
          </section>
        @endforeach
      @else
        <section class="panel mainTxt important">
          <div class="row1">
            No Blog Data Found
          </div>
        </section>
      @endif

      
    </main>
@endsection
