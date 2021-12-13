@extends("admin.layout")

@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">{{__(' Products')}}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}" style="text-decoration:none;font-size: 14px;">Dashboard</a></li>
                            <li class="breadcrumb-item active" style="font-size: 14px;">Add Products</li>
                            <li class="breadcrumb-item active"><a href="{{url('admin/all-products')}}" class="btn btn-primary" style="padding: 0 8px 2px 7px; font-size: 14px;">Products</a></li>
                        </ol>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                         @endif
                         @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                         @endif


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add New Data
                            </div>
                            <div class="card-body">
                                <form action="/admin/addProduct" method="post" class="form-inline" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="name" value="{{ old('name') }}" id="inputFirstName" type="text" placeholder="Product Name" />
                                                <label for="inputFirstName">Product Name</label>
                                                @error('name')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input class="form-control" name="quantity" value="{{ old('quantity') }}" id="inputLastName" type="number" placeholder="Quantity" />
                                                <label for="inputLastName">Quantity</label>
                                                @error('quantity')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input class="form-control" name="price" value="{{ old('price') }}" id="inputLastName" type="number" placeholder="Price" />
                                                <label for="inputLastName">Price</label>
                                                @error('price')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating col-md-6">
                                            <textarea class="form-control" name="Details" value="{{ old('Details') }}" id="inputEmail" rows="3"></textarea>
                                            <label for="inputEmail">Details</label>
                                            @error('Details')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="category_id">
                                                <option value="{{ old('category_id') }}" selected disable>Default select</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                           
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Choose Multiple Image</label>
                                        <input type="file" name="image[]" multiple class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">Add One</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
</div>

@endsection