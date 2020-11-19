<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

    <title>B8 Admin Panel</title>
</head>

<body class="font-primary">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#items">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#categories">Categories</a>
                </li>

                <a class="navbar-brand">
                    <img src="{{ URL::asset('images/B8_Logo.svg') }}" style="filter: invert(1);">
                </a>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#orders">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="#">Exit</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="tab-content">
            <div class="tab-pane fade active" id="items">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Consist</th>
                                <th>Caring</th>
                                <th>Price</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">
                                    <button class="btn btn-success btn-block" data-toggle="modal"
                                        data-target="#createItemModal">+ Add new item</button>
                                </td>

                            </tr>
                            @foreach ($items as $item)
                                <tr class="clickable-row" onclick="showUpdateItemModal({{ $item->id }})">
                                    <th scope="row">{{ $item->id }}</th>
                                    <td class="text-nowrap font-weight-bold">{{ $item->title }}</td>
                                    <td>{{ $item->category->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->consist }}</td>
                                    <td>{{ $item->caring }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        @foreach ($item->sizes as $size)
                                            <b>{{ $size->title }}, </b>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="categories">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">
                                    <button class="btn btn-success btn-block" data-toggle="modal"
                                        data-target="#createCatModal">+ Add new item</button>
                                </td>

                            </tr>
                            @foreach ($categories as $category)
                                <tr class="clickable-row" onclick="showUpdateCatModal({{ $category->id }})">
                                    <th scope="row">{{ $category->id }}</th>
                                    <td class="text-nowrap font-weight-bold">{{ $category->title }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="orders">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Info</th>
                                <th>Order List</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="clickable-row" onclick="showUpdateOrderModal({{ $order->id }})">
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>
                                        <p class="font-weight-bold">{{ $order->last_name }} {{ $order->first_name }}</p>

                                            @if ($order->status == 'pending')
                                                <span>Status: <span class="text-danger font-weight-bold text-capitalize">{{$order->status}}</span></span>
                                            @else
                                                <span>Status: <span class="text-success font-weight-bold text-capitalize">{{$order->status}}</span></span>
                                            @endif
                                        <br>
                                        <p>Delivery info:</p>
                                        <ul type="none">
                                            <li><p class="small">{{ $order->country }}, {{ $order->city }}</p></li>
                                            <li><p class="small">{{ $order->warehouse }}</p></li>
                                        </ul>
                                        <p>Contact info:</p>
                                        <ul type="none">
                                            <li><p class="small">Email: {{ $order->email }}</p></li>
                                            <li><p class="small">Phone: {{ $order->phone }}</p></li>
                                        </ul>
                                        <p>Comments/Questions:</p>
                                        <p class="small">{{ $order->comments }}</p>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Size</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach ($order->order_lists as $order_list)
                                                            <tr>
                                                                <td class="text-nowrap small">{{ $order_list->item->title }}</td>
                                                                <td class="text-nowrap small">{{ $order_list->size->title }}</td>
                                                                <td class="text-nowrap small">{{ $order_list->quantity }}</td>
                                                                <td class="text-nowrap small">${{ $order_list->price }}</td>
                                                                <td class="text-nowrap small">${{ $order_list->price * $order_list->quantity }}</td>
                                                            </tr>
                                                            @php
                                                                $total += $order_list->price * $order_list->quantity;
                                                            @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <p>Payment info:</p>
                                                <p class="small">Payment method: <span class="text-capitalize font-weight-bold">{{ $order->payment_method }}</span></p>
                                                <p class="small">Promocode:
                                                    @if ($order->promocode_id == NULL)
                                                        <span class="font-weight-bold text-muted">None</span>
                                                    @else
                                                        <span class="font-weight-bold">{{ $order->promocode_id }}</span>
                                                    @endif
                                                </p>
                                                <h3 class="font-weight-bold">Total: <span class="color-primary">${{ $total }}</span></h3>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="createItemModal" tabindex="-1" role="dialog" aria-labelledby="createItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createItemModalLabel">Create new item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/item" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="file" class="form-control-file" multiple name="photo[]">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" min="0" step="any" class="form-control" name="price" placeholder="Price" required>
                                </div>
                                <div class="form-group">
                                    <select name="size[]" class="form-control" multiple>
                                        @foreach ($item_sizes->unique('title') as $size)
                                            <option value="{{$size->id}}">{{$size->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="category" class="form-control">
                                        @foreach ($categories->unique('title') as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Description" col="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="consist" placeholder="Consist of" col="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="caring" placeholder="Caring advices" col="3" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel">Edit item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <div class="modal-body">
                        <form action="/item/" method="POST" name="editItem">
                        @csrf
                        @method('PUT')
                        <input type="text" name="id" id="item_id" value="" required hidden>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                {{-- <div class="form-group">
                                    <input type="file" class="form-control-file" multiple name="photo[]" id="item_photo">
                                </div> --}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="item_title" placeholder="Title" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" min="0" step="any" class="form-control" name="price" id="item_price" placeholder="Price" required>
                                </div>
                                <div class="form-group">
                                    <select name="size[]" id="item_size" class="form-control" multiple>
                                        @foreach ($item_sizes->unique('title') as $size)
                                            <option value="{{$size->id}}">{{$size->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="category" id="item_category" class="form-control">
                                        @foreach ($categories->unique('title') as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="item_description" placeholder="Description" col="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="consist" id="item_consist" placeholder="Consist of" col="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="caring" id="item_caring" placeholder="Caring advices" col="3" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success" >Save changes</button>

                        </form>
                        <form action="/item" method="POST" name="deleteItem">
                            @csrf
                            @method('delete')
                            <input type="text" name="id" id="item_id_delete" value="" required hidden>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="createCatModal" tabindex="-1" role="dialog" aria-labelledby="createCatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCatModalLabel">Create new item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/category" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCatModal" tabindex="-1" role="dialog" aria-labelledby="editCatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCatModalLabel">Edit category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form action="/category" method="POST" name="editCat">
                            @csrf
                            @method('PUT')
                            <input type="text" name="id" id="cat_id" value="" required hidden>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="cat_title" placeholder="Title" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success" >Save changes</button>

                        </form>

                        <form action="/category" method="POST">
                            @csrf
                            @method('delete')
                            <input type="text" name="id" id="cat_id_delete" value="" required hidden>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalLabel">Edit category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/order" method="POST" name="editOrder">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="text" name="id" id="order_id" value="" required hidden>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="status" id="order_status" required>
                                        <option value="closed">Closed</option>
                                        <option value="aborted">Aborted</option>
                                        <option value="paid">Paid</option>
                                        <option value="pending">Pending</option>
                                        <option value="sent">Sent</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Iconify, JQuery, Popper.js and Bootstrap.js -->
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- User scripts -->
    <script src="{{ URL::asset('js/admin.js') }}"></script>
</body>

</html>
