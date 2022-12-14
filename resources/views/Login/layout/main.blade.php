<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/signin.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
  <body class="gambar" style="background-image:url('{{ URL::asset('gambar/4.jpeg') }}');background-size:cover"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <div class="container">
        @yield('container')
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(#click).click(function(){
          $(#icon).toggleClass(bi bi-eye-slash);

          var input = (#pass);
          if(input.attr("type")  === "password"){
            input.attr("type", "text");
          }else{
            input.attr("type", "password");
          }
        });
      });
    </script>
  </body>
</html>