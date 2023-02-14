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

      <section class="panel writeBlog important">
        <form action="{{ route('writeBlog') }} " enctype="multipart/form-data" method="post">
          @csrf
        
          <label class="filelabel">
            <img src="./../img/uploadBlog.svg" alt="" />
            <span class="title"> Add File </span>
            <input
              class="FileUpload1 @error('booking_attachment') is-invalid @enderror"
              id="FileInput"
              name="booking_attachment"
              type="file"
            />
            
          </label>
          @error('booking_attachment')
                <span class="invalid-feedback" role="alert">
                    <strong><h5>{{ $message }}</h5></strong>
                </span>
            @enderror
          <label for="title" clas="label"><img src="./../img/edit.svg" alt=""> Title</label>
          <input type="text" placeholder="Add Title..." class="@error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
          @error('title')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          <label for="category" clas="label"><img src="./../img/edit.svg" alt=""> Category</label>
          <select name="category" id="" class="@error('category') is-invalid @enderror">
            <option value="">Select Option</option>
            <option value="0">Health</option>
            <option value="1">Un Categorize</option>
          </select>
          @error('category')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          

          <label for="description" class="label"><img src="./../img/edit.svg" alt="">Description</label>
          <textarea name="desc" id="desc" placeholder="Write a description...." class="@error('category') is-invalid @enderror"></textarea>
          @error('desc')
              <span class="invalid-feedback" role="alert">
                <strong><h5>{{ $message }}</h5></strong>
              </span>
          @enderror
          <button class="submit">Submit</button>
        </form>
      </section>
    </main>
    <script>
      $("#FileInput").on("change", function (e) {
        var labelVal = $(".title").text();
        var oldfileName = $(this).val();
        fileName = e.target.value.split("\\").pop();

        if (oldfileName == fileName) {
          return false;
        }
        var extension = fileName.split(".").pop();

        if ($.inArray(extension, ["jpg", "jpeg", "png"]) >= 0) {
          $(".filelabel img").removeClass().addClass("fa fa-file-image-o");
          $(".filelabel img, .filelabel .title").css({ color: "#fff" });
          $(".filelabel").css({ border: " 2px solid #208440" });
        } else if (extension == "pdf") {
          $(".filelabel img").removeClass().addClass("fa fa-file-pdf-o");
          $(".filelabel img, .filelabel .title").css({ color: "red" });
          $(".filelabel").css({ border: " 2px solid red" });
        } else if (extension == "doc" || extension == "docx") {
          $(".filelabel img").removeClass().addClass("fa fa-file-word-o");
          $(".filelabel img, .filelabel .title").css({ color: "#fff" });
          $(".filelabel").css({ border: " 2px solid #2388df" });
        } else {
          $(".filelabel img").removeClass().addClass("fa fa-file-o");
          $(".filelabel img, .filelabel .title").css({ color: "#fff" });
          $(".filelabel").css({ border: " 2px solid black" });
        }

        if (fileName) {
          if (fileName.length > 10) {
            $(".filelabel .title").text(
              fileName.slice(0, 4) + "..." + extension
            );
          } else {
            $(".filelabel .title").text(fileName);
          }
        } else {
          $(".filelabel .title").text(labelVal);
        }
      });
    </script>

@endsection
