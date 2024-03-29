<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
</head>
  <body >
    @auth
    <div class="row zindex" style="height:55px;">
      <div class="col-3">
        <div class="mx-2" style="float:left;">
          <img style="height:40px; margin-top: 8px; " src="/gambar/Lambang_ITK.png" alt="Lambang ITK">
        </div>  
        <h3 class="mt-3" ><span class="text-success float:left;">SIM</span><span class="text-primary">PBJ</span></</h3>
      </div>
      <div class="col-4">
      </div>
      <div class="col-5 text-end" style="margin-top: 13px;">
        <h3 class="me-2 textt">{{ auth()->user()->name }}</h3>
      </div>
    </div>
    @endauth      
    @include('Perencanaan.partials.navbar1')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <div class="container">
        @yield('container')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script>
      var minDate, maxDate;
 
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[6] );
          
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );
          
        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });
          
            // DataTables initialisation
            var table = $('#myTable').DataTable();
          
            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
        });
    </script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script type="text/javascript">

      var pusher = new Pusher('bfacd022be6ada60977b', {
        cluster: 'ap1'
      });
      var channel = pusher.subscribe('status-liked');
      channel.bind('liked-status', function(data) {
        tampilNotif();
       
      });
      tampilNotif();
      function tampilNotif()
      {
        $.ajax({
          url:"{{ url('/api/getnotif') }}",
          type:"post",
          data:{
            admin_id:'{{ Auth::user()->Admin_id }}',
          },
          success:function(res)
          {
            console.log(res);
            var isi ='';
            var notif = res;
            var date = new Date().toISOString().slice(0, 19).replace('T', ' ');
            for(i=0; i<notif.length; i++)
            {
              isi += "<li><a class='dropdown-item'>"+notif[i]['name']+" "+notif[i]['deskripsi']+" | "+notif[i]['created_at']+"</li></a>";
              console.log(notif[i]["deskripsi"]);
            }
            document.getElementById('isinotif').innerHTML=isi;
          }
        });
      }
    </script>
    </body>
</html>