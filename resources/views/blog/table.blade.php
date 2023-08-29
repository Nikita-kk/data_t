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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</head>

<main>

    <body>
        <a href="{{ route('blog.form') }}"><button type="button" class="btn btn-primary">Add</button></a>

        @if (session()->has('msg'))
            <div class="alert alert-primary">
                {{ session()->get('msg') }}
                <a href="" class="close" data-dismiss="alert" aria-label="close">X</a>
            </div>
        @endif

        <table class="table table-dark">
            <thead>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">

                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <link rel="stylesheet"
                        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
                    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
                    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
                </head>

                <body>
                    <table class="table table-bordered yajra-datatable">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">description</th>
                                <th scope="col">image</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $d)
                              <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->name}}</td>

                              </tr>
                              @endforeach --}}
                        </tbody>
                    </table>
                </body>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
                <script type="text/javascript">
                    $(function() {

                        var table = $('.yajra-datatable').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('blog.table.list') }}",
                            columns: [{
                                    data: 'id',
                                    name: 'id'
                                },
                                {
                                    data: 'title',
                                    name: 'title'
                                },
                                // {data: 'description', name: 'description'}, description ajax
                                {
                                    data: 'description',
                                    name: 'description',
                                    render: function(data, type, full, meta) {
                                        var tmp = document.createElement(
                                            "DIV"); //this code remove html tags from the string.
                                        tmp.innerHTML = data;
                                        return tmp.textContent || tmp.innerText || "";
                                    },
                                },

                                // for ajax image
                                {
                                    data: 'image',
                                    name: 'image',
                                    render: function(data, type, full, meta) {
                                        return '<img src="' + window.location.origin + '/uploads/' + data +
                                            '" width="50" height="50"/>';
                                    },
                                    orderable: false,
                                    searchable: false
                                },
                                {
                                    data: 'status',
                                    name: 'status'
                                },


                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: true,
                                    searchable: true
                                },
                            ]
                        });
                    });
                </script>

                </html>
