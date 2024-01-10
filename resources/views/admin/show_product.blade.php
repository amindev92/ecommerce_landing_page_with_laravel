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
                            <td>price</td>
                            <td>image</td>
                            <td>category</td>
                            <td>Edit</td>
                            <td>Remove</td>

                        </thead>

                        <tbody>

                            @foreach ($products as $item)
                                <tr>
                               
                                    <td>{{ $item->product_title }}</td>
                                    <td>{{ $item->product_price }}</td>
                                    <td>
                                        <img style="height: 50px; width: 50px;"
                                            src="product_img/{{ $item->product_image }}"
                                            alt="{{ $item->product_title }}">
                                    </td>
                                    <td>{{ $item->product_category }}</td>
                                    <td>
                                        <a href="{{ url('delete_product', $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('update_product', $item->id) }}"
                                            class="btn btn-primary">Edit</a>
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
