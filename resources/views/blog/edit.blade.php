<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
{{-- ck editor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>


<body>
    <style>
        .container {
            width: 500px
             padding:30px



        }
    </style>
    <br> <br>
    <div class="container">
        <h2>Blog form</h2>
        <form action="{{route('blog.update',$data->id)}}"method=post enctype="multipart/form-data">
            @csrf

               <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="blog title" name="title" value="{{old('title',$data->title)}}">
                <span class="text-danger">@error('title'){{$message}} @enderror</span>

                </div>

                <br><br>
                <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="description"> {{{old('description',$data->description)}}}"</textarea>
                <span class="text-danger">@error('description'){{$message}} @enderror</span>

                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" id="description"> {{{old('description')}}}</textarea>
                    <span class="text-danger">@error('description'){{$message}} @enderror</span>
                    </div>


                <br><br>
                <div class="form-group">
                <label for="image">image:</label>
                 <input type="file" class="form-control" id="image" name="image" >
                 <span class="text-danger">@error('image'){{$message}} @enderror</span>

                </div>

                <br><br>
                <button type="submit" class="btn btn-info">update</button>

                <script>
                    ClassicEditor
                    .create(document.querySelector('#description'))
                    .catch(error=>{
                      console.error(error); })
               </script>
        </form>
    </div>


</body>
    </head>
</html>
