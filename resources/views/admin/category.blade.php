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

                    <div class="center">
                        <h2 class="title-category">Add Category</h2>

                        <form action="{{ url('add_category') }}" method="post">

                            @csrf

                            <input type="text" name="categoryName" class="input_category" id="categoryName">
                            <input type="submit" class="btn btn-success h-full" name="submit" value="add Category">

                        </form>

                    </div>

                    <table class="center">

                        <thead>

                            <td>Category name</td>
                            <td>
                                Action
                            </td>

                        </thead>

                        <tbody>

                            @foreach ($data as $item)
                                <tr>

                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        <a href="{{ url('delete_category', $item->id) }}"
                                            class="btn btn-danger">Delete</a>
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
