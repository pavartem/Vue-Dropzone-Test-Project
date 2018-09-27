<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">


        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
        <div id="app">
            <div class="container">

                <form action="/watermark" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <articles></articles>

                </form>


            </div>

        </div>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>



