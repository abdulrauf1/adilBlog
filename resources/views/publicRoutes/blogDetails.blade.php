@extends('layouts.appPublic')

@section('content')
<div class="">
    <!-- blog details section here ============= -->
    <div class="blogDetail">
      <div class="headerDir">
        <a href="{{ url('/home') }}">Home ></a>
        <a href="{{ url('/blogs') }}">Blog ></a>
        <a href="{{ url('/blogDeatils',$blogDetail->id) }}">Details</a>
      </div>
      <img src="/storage/{{ $blogDetail->blogURL }}" alt="" />
      <h1>
        {{$blogDetail->title}}
      </h1>
      <p>
        {{$blogDetail->description}}
      </p>

    </div>
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
</div>
@endsection
