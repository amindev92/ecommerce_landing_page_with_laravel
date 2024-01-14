</html>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <table class="center my-4 py-4 mx-auto ">

            <thead>
                <td>title</td>
                <td>Qty</td>
                <td>image</td>
                <td>price</td>
                <td>Action</td>
            </thead>

            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td>{{$item->product_title}}</td>
                        <td>{{$item->quantity}}</td>
                        <td><img src="product_img/{{$item->image}}" style="width: 50px; height:50px;"></td>
                        <td>{{$item->price}}</td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="{{url('remove_cart', $item->id)}}" >Remove</a>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>


        <div class="container mx-auto w-50">
        
            <div class="row text-center">

                <a href="{{url('cash_order')}}" class="btn btn-primary">Cash on Delivery</a>
                <a href="" class="btn btn-primary">Pay using card</a>

            </div>
        
        </div>
        <!-- footer start -->
        @include('home.footer')

        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
</body>

</html>
