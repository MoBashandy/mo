<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="Home/admin/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="Home/admin/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="Home/admin/template/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="Home/admin/template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="Home/admin/template/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="Home/admin/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="Home/admin/template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style type="text/css">
        label{
            display: inline-block;
            width: 300px;
            font-size: 18px;
            font-weight: bold;
        }
        input{
            color: :black;
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

          <div class="main-panel">
            <div class="content-wrapper">
                <div class="div-center text-center">
                    <h1>Send Email To <span style="color :blue">{{$order->email}}</span></h1>
                </div>
                <div style="padding-left: 32%">
                    <form action="{{url('send_user_email',$order->id)}}" method="POST">
                        @csrf
                        <div style="padding-top: 30px ; padding-right: 30px">
                            <label for="">Email Greeting : </label>
                            <input type="text" name="greeting">
                        </div>
                        <div style="padding-top: 30px ; padding-right: 30px">
                            <label for="">Email Firstline : </label>
                            <input type="text" name="first">
                        </div>
                        <div style="padding-top: 30px ; padding-right: 30px">
                            <label for="">Email Body : </label>
                            <input type="text" name="body">
                        </div>
                        <div style="padding-top: 30px ; padding-right: 30px">
                            <label for="">Email Button Name : </label>
                            <input type="text" name="button">
                        </div>
                        <div style="padding-top: 30px ; padding-right: 30px">
                            <label for="">Email URL : </label>
                            <input type="text" name="url">
                        </div>
                        <div style="padding-top: 30px ; padding-right: 30px">
                            <label for="">Email Last Line : </label>
                            <input type="text" name="last">
                        </div>
                        <div style="padding-top: 30px ; padding-left: 215px">
                            <input style="padding :10px; font-weight: bold;font-size: 18px; " type="submit" value="Send" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="Home/admin/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="Home/admin/template/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="Home/admin/template/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="Home/admin/template/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="Home/admin/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="Home/admin/template/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="Home/Home/admin/template/assets/js/off-canvas.js"></script>
    <script src="Home/admin/template/assets/js/hoverable-collapse.js"></script>
    <script src="Home/admin/template/assets/js/misc.js"></script>
    <script src="Home/admin/template/assets/js/settings.js"></script>
    <script src="Home/admin/template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="Home/admin/template/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
