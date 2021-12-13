@extends("admin.layout")

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{__('Products')}}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{url('/home')}}" style="text-decoration:none;font-size: 14px;">Dashboard</a></li>
                <li class="breadcrumb-item active" style="font-size: 14px;">Product</li>
                <li class="breadcrumb-item active"><a href="{{url('admin/add-product')}}" class="btn btn-primary" style="padding: 0 8px 2px 7px; font-size: 14px;">Add New Product</a></li>
            </ol>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Products DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->Details}}</td>
                                <td><img src="{{asset(explode('|',$product->image)[0])}}" alt="{{$product->name}}" height="50px" width="80px"></td>
                                <td>
                                    <a href="{{url('/admin/all-products/edit/'.$product->id)}}" class="btn btn-primary" style="padding: 3px 10px 4px 10px; font-size: 14px;">Edit</a>
                                    <a href="{{url('/admin/all-products/delete/'.$product->id)}}" class="btn btn-danger" style="padding: 3px 10px 4px 10px; font-size: 14px;">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
        @endsection
