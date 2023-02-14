@extends('layouts.appPublic')

@section('content')
<div class="">
    <!-- blog hero section here =========== -->
    <div class="heroBlog">
      <img class="ring" src="./img/RingBlog.svg" alt="" />
      <h1>ELITE <span>WEALTH</span> COACHING</h1>
      <div class="blog">
        <h1>
          <sup>“</sup>&nbsp;<span>BLOG</span>&nbsp;<sub>“</sub>
          <img src="./img/starBlog.svg" alt="" />
        </h1>
      </div>
      <form action="{{ url('/blogSearch') }}" method="GET">
        <input type="text" name="search" required placeholder="Search here..." />
        <button type="submit">Go</button>
      </form>
    </div>

    <!-- all blog section here =========== -->
    <div class="allBlogs">
      <div class="row1">
        <div class="left">
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
          <div class="tabsNext">
            @if(!empty($blogs))
              
                <a href="{{$blogs->previousPageUrl()}}">
                  <div class="prev">
                    <img src="./img/prev.svg" alt="" />
                  </div>
                </a>
                
                @for($i = 1; $i <= $pages; $i++)
                  <a href="{{$blogs->url($i)}}" style="text-decoration:none;"><div class="{{ (Request::input('page') == $i) ? 'pageBtn active' : 'pageBtn' }}">{{$i}}</div></a>
                @endfor   
                <a href="{{$blogs->nextPageUrl()}}">
                  <div class="next">
                      <img src="./img/prev.svg" alt="" />
                  </div>
                </a>
              
            @endif
          </div>
        </div>
        <div class="right">
          <button>Meet the founder</button>
          <img class="founder" src="./img/Jared Headshot.jpg" alt="" />
          <h2>Jared Headshot</h2>
          <p>
            Described as “a visionary leader and unshakable optimist,” Jean Paul
            has devoted his entire professional life leveraging capitalism and
            philanthropy — to direct attention to people who have been left
            behind.
          </p>
          <a href="#"
            ><img class="linkedin" src="./img/founderLinkedin.svg" alt=""
          /></a>
          <div class="podcost">
            <img src="./img/podcost.png" alt="" />
            <div class="text">
              <h3>Discover proptech trend & insight</h3>
              <p>
                Amet minim mollit non deserunt ullamco est sit aliq Amet minim
                mollit non deserunt ullamco est sit aliq
              </p>
            </div>
          </div>
          <div class="podcost">
            <img src="./img/podcost.png" alt="" />
            <div class="text">
              <h3>Discover proptech trend & insight</h3>
              <p>
                Amet minim mollit non deserunt ullamco est sit aliq Amet minim
                mollit non deserunt ullamco est sit aliq
              </p>
            </div>
          </div>
          <div class="podcost">
            <img src="./img/podcost.png" alt="" />
            <div class="text">
              <h3>Discover proptech trend & insight</h3>
              <p>
                Amet minim mollit non deserunt ullamco est sit aliq Amet minim
                mollit non deserunt ullamco est sit aliq
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
