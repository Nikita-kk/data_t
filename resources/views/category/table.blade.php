
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
<main>
<body>
    @if (session()->has('msg'))
       <div class="alert alert-primary">
        {{session()->get('msg')}}
        <a href="" class="close" data-dismiss="alert" aria-label="close">X</a>
       </div>
    @endif
    <a href="{{route('category.form')}}"><button type="button" class="btn btn-primary">Add</button></a>



    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">actions</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->title}}</td>

             <td><a href="{{route('category.edit',$d->id)}}"><button class="btn-warning rounded">edit</button></a>
               <a href="{{route('category.delete',$d->id)}}"><button class="btn-danger rounded">delete</button></a></td>
          </tr>
             @endforeach
        </tbody>
      </table>
      {{$data->links()}}
</main>

</body>
    </head>
</html>
