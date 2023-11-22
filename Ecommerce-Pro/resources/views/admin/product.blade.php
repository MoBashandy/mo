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
    .div-center {
        text-align: center;
        padding-top: 40px;
    }

    .h2ac {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .input-container {
        padding-bottom: 15px;
    }

    /* .label1 {
        margin-top: 7px;
        margin-right: 10px;
        text-align: center;
        background-color: #0090e7;
        padding: 8px 16px 16px 16px;
    } */

    .text-color {
        color: black;
        padding-bottom: 20px;
        text-align: center;
    }
    /* .r{
        color:black;
        background-color: #0090e7;

    } */
    label{
        display: inline-block;
        width: 200px;

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
                <div class="div-center">
                    <div>
                        <h2 class="h2ac">Add Product</h2>
                        <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-container">
                            <label class="label1">Product Title :</label>
                            <input type="text" class="text-color" name="title" placeholder="Write A Title" required>
                        </div>

                        <div class="input-container">
                            <label class="label1">Product Description :</label>
                            <input type="text" class="text-color" name="description" placeholder="Write A Description" required>
                        </div>

                        <div class="input-container">
                            <label class="r">Product Price :</label>
                            <input type="namber" class="text-color" name="price" placeholder="Write A Price" required>
                        </div>

                        <div class="input-container">
                            <label class="label1">Discount Price :</label>
                            <input type="namber" class="text-color" name="discount" placeholder="Write A Discount">
                        </div>

                        <div class="input-container">
                            <label class="r">Product Quantity :</label>
                            <input type="namber" class="text-color" min="0" name="quantity" placeholder="Write A Quantity" required>
                        </div>

                        <div class="input-container">
                            <label class="label1">Product Category :</label>
                            <select class="text-color" name="category" id="" required>
                                <option value="" selected="">Add A Category Here</option>
                                @foreach ($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-container">
                            <label class="label1" required>Product Image Here :</label>
                            <input type="file" name="image">
                            <input type="submit" value="Add Product" class="btn btn-primary" name="image">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
