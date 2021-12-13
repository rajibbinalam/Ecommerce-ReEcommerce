@extends("admin.layout")

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Categories</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add New Data
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/addCategory" class="form-inline">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="name" id="inputFirstName" type="text" placeholder="Product Name" />
                                    <label for="inputFirstName">Category Name</label>
                                    @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Add One</button>
                            </div>
                        </div>
                    </form>

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Posts</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    @foreach($categories as $category)
                        <tbody>
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>Post Number</td>
                                <td>{{$category->created_at}}</td>
                                <td><a href="{{url('/admin/categories/delete/'.$category->id)}}" class="btn btn-danger" style="padding: 0px 3px 2px 3px">Delete</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>    

                </div>
            </div>
        </div>
    </main>
    <div style="position: absolute; right: 39px; bottom: 25px;">{{$categories->links()}}</div>
</div>

@endsection