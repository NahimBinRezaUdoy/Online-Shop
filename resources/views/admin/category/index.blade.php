@extends('admin.layout')

@section('page_title', 'Category')
@section('category_select', 'active')

@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Category</h1>
        </div>

        <div class="col-2">
            <a href="{{ route('admin.category.create') }}">
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
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_slug }}</td>
                                <td>
                                
                                    <div class="row">

                                        <div class="col-md-3">
                                            <a href="{{ route('admin.category.edit' , $category) }}">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            </a>
                                        </div>
                                
                                        <div class="col-md-3">
                                            @if ($category->status == 1)
                                            <a href="{{ url('admin/category/status/0') }}/{{ $category->id }} "
                                                class="btn btn-success ">Active</a>
                                            @elseif($category->status == 0)
                                            <a href="{{ url('admin/category/status/1') }}/{{ $category->id }}"
                                                class="btn btn-warning ">Dactive</a>
                                            @endif
                                        </div>

                                
                                        <div class="col-md-3">
                                            <form action="{{ route('admin.category.delete', $category) }}" method="post">
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
