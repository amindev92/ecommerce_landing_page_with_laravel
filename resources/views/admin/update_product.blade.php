<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <style>
        .center {
            margin: 0 auto;
            text-align: center;
            width: 50%;
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

                    <div class="center">
                        <h2 class="title-category">Add Product</h2>


                        <form action="{{ url('update_product_item',$product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_title">productTitle</label>
                                <input type="text" name="product_title" class="form-control" id="productTitle"
                                    value="{{ $product->product_title }}">
                            </div>
                            <div class="form-group">
                                <label for="product_description">productDescription</label>
                                <input type="text" name="product_description" class="form-control"
                                    id="productDescription" value="{{$product->product_description}}">
                            </div>
                            <div class="form-group">
                                <label for="product_image">productImage</label>
                                <input type="file" name="product_image" class="form-control" id="productImage">
                            </div>
                            <div class="form-group">
                                <label for="product_category">productCategory</label>
                                <select class="form-control form-control-lg" name="product_category">
                                    <option>{{$product->product_category}}</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_price">productPrice</label>
                                <input type="text" name="product_price" class="form-control" id="productPrice" value="{{$product->product_price}}">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">discountPrice</label>
                                <input type="text" name="discount_price" class="form-control" id="discountPrice" value="{{$product->product_discount}}">
                            </div>
                            <div class="form-group">
                                <label for="product_quantity">productQuantity</label>
                                <input type="text" name="product_quantity" class="form-control" id="productQuantity" value="{{$product->product_quantity}}">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>



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
