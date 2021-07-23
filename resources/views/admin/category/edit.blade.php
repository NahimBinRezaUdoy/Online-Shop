@extends('admin.layout')

@section('page_title', 'Manage Category')

@section('category_select', 'active')

@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Edit Category</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.category.index') }}">
                <button type="button" class="btn btn-success">Back</button>
            </a>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12 ">

            <div class="text text-success mb-1">
                {{ session('message') }}
            </div>

            <!-- Create Form-->
            <div class="row">
                <div class="col-lg-11 center">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.category.update' , $category) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" class="control-label mb-1">Category Name</label>
                                    <input id="category_name" name="category_name"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $category->category_name }}">

                                    @error('category_name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                    <input id="category_slug" name="category_slug"
                                        type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $category->category_slug }}">

                                    @error('category_slug')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Update
                                    </button>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Form-->
        </div>
    </div>
@endsection
