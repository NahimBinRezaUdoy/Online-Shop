@extends('admin.layout')

@section('page_title', 'Product')
@section('product_select', 'active')

@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Product</h1>
        </div>

        <div class="col-2">
            <a href="{{ route('admin.product.create') }}">
                <button type="button" class="btn btn-success">Add New</button>
            </a>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">

            <div class="text text-success mb-1">
                {{ session('message') }}
            </div>
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40 ">
                <table class="table table-borderless table-data3 ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            
                            <th>image</th>
                             {{-- <th>brand</th>
                            <th>model</th>
                           <th>short_desc</th>
                            <th>desc</th>
                            <th>keywords</th>
                            <th>technical_spacification</th>
                            <th>uses</th>
                            <th>warranty</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->image }}</td>
                                

                                {{-- @if ($product->image != '')
                                    <td><img style="width: 100px" src="{{ asset('storage/media/' . $product->image) }}"></td>
                                @endif --}}

                                 {{-- <td>{{ $product->brand }}</td>
                                <td>{{ $product->model }}</td> --}}
                               
                               
                                <td>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <a href="{{ route('admin.product.edit' , $product) }}">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            </a>
                                        </div>
                                
                                        <div class="col-md-3">
                                            @if ($product->status == 1)
                                            <a href="{{ url('admin/product/status/0') }}/{{ $product->id }} "
                                                class="btn btn-success ">Active</a>
                                            @elseif($product->status == 0)
                                            <a href="{{ url('admin/product/status/1') }}/{{ $product->id }}"
                                                class="btn btn-warning ">Dactive</a>
                                            @endif
                                        </div>
                                
                                        <div class="col-md-3">
                                            <form action="{{ route('admin.product.delete', $product) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                    
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
