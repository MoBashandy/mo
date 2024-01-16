<!DOCTYPE html>
<html lang="en">
  <head>
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
    .title_deg{
        text-align:center;
        font-size:25px;
        font-weight: bold;
        padding-bottom: 40px;
}
    .table_deg{
        border:2px solid white;
        width: 70%;
        margin: auto;
        padding-top:50px;
        text-align: center;
}
    .th_deg{
    background-color: skyblue;

}
    .img_size{
        width: 200px;
        height: 100px;
}

    th{
        padding: 10px;
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
                @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button class="close" typy="button" data-dismiss="alert" eria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                <h1 class="title_deg">All Orders</h1>
                <div style="padding-left:550px; padding-bottom:30px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" name="search" placeholder="search">
                        <input type="submit" value="search" class ="btn btn-outline-primary">
                    </form>
                </div>
        <table class="table_deg">
            <tr class= "th_deg">
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Delivered</th>
                <th>Print PDF</th>
                <th>Send Email</th>
            </tr>
            @foreach($order as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivary_status}}</td>
                <td><img class="img_size" src="/product/{{$order->image}}"></td>
                <td>
                    @if($order->delivary_status=='processing')
                    <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure?')" class ="btn btn-primary">Delivered</a>
                    @else
                    <h5 style="color:green;">Delivered</h5>
                    @endif
                </td>
                <td><a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a></td>
                <td><a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a></td>
            </tr>
            @endforeach
        </table>
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
