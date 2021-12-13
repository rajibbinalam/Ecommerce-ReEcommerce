@extends("admin.layout")

@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">{{__('Add Products')}}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                                <form action="/admin/update/{{ $edit_products->id }}" method="post" class="form-inline" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="name" value="{{ $edit_products->name }}" id="inputFirstName" type="text" placeholder="Product Name" />
                                                <label for="inputFirstName">Product Name</label>
                                                @error('name')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input class="form-control" name="quantity" value="{{ $edit_products->quantity }}" id="inputLastName" type="number" placeholder="Quantity" />
                                                <label for="inputLastName">Quantity</label>
                                                @error('quantity')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-floating">
                                                <input class="form-control" name="price" value="{{ $edit_products->price }}" id="inputLastName" type="number" placeholder="Price" />
                                                <label for="inputLastName">Price</label>
                                                @error('price')
                                                    <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-floating col-md-6">
                                            <textarea class="form-control" name="Details" id="inputEmail" rows="3">{{ $edit_products->Details }}</textarea>
                                            <label for="inputEmail">Details</label>
                                            @error('Details')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="category_id" value="{{ $edit_products->category_id }}">
                                                <option selected disabled >Default select</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                           
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <img src="{{asset(explode('|',$edit_products->image)[0])}}" alt="{{$edit_products->name}}" height="50px" width="80px">
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