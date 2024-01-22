<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('Home/admin/template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('Home/admin/template/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('Home/admin/template/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('Home/admin/template/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('Home/admin/template/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Home/admin/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('Home/admin/template/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('Home/admin/template/assets/images/favicon.png')}}" />
    <style type="text/css">
        .div-center{
            text-align: center;
            padding-top: 40px;
        }
        .h2ac{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text-color{
            color: black ;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid whitesmoke;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->

        @include('admin.navbar')
          <!-- partial -->


        <!-- main-panel ends -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div-center text-center">
                    <!-- Add the 'text-center' class for horizontal centering -->
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button class="close" typy="button" data-dismiss="alert" eria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h2 class="h2ac">Add category</h2>
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input type="text" name="category" class="text-color" placeholder="write category name" method="get">
                        <input type="submit" name="submit" value="add category" class="btn btn-primary">
                    </form>
                  </div>
                  <table class="center">
                    <tr>
                        <td>Category name</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->category_name}}</td>
                        <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('delete_cateory',$data->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                  </table>
            </div>
          </div>

      </div>
    </div>

    <!-- plugins:js -->
    <script src="{{asset('Home/admin/template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('Home/admin/template/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('Home/Home/admin/template/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/js/misc.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/js/settings.js')}}"></script>
    <script src="{{asset('Home/admin/template/assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('Home/admin/template/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
