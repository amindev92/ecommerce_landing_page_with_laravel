<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <style>
        .center {
            margin: 0 auto;
            text-align: center;
        }

        table.center {
            margin-top: 4rem;
            border: 1px solid white;
            text-align: center;
            width: 50%;
        }

        .title-category {
            margin-bottom: 3rem;
        }

        .input_category {
            color: black;
            border: none;
            outline: none;
        }
    </style>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">

                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <table class="center">

                        <thead>

                            <td>Name</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>product title</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Payment status</td>
                            <td>Delivery Status</td>
                            <td>Iamge</td>
                            <td>PDF</td>

                        </thead>

                        <tbody>

                            @foreach ($orders as $item)
                                <tr>
                               
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->product_title }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->payment_status }}</td>
                                    <td>{{ $item->delivery_status }}</td>
                                    <td>
                                        <img style="height: 50px; width: 50px;"
                                            src="product_img/{{ $item->image }}"
                                            alt="{{ $item->product_title }}">
                                    </td>
                               
                                    <td>
                                        <a class="btn btn-primary" href='print/{{$item->id}}'>PDF</a>
                                    </td>


                                </tr>
                            @endforeach


                        </tbody>

                    </table>

                </div>
                <!-- content-wrapper ends -->

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
