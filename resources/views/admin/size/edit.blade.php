@extends('admin.layout')

@section('page_title', 'Manage Size')

@section('size_select', 'active')

@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Edit Size</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.size.index') }}">
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
                            <form action="{{ route('admin.size.update',$size) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="size" class="control-label mb-1">Size</label>
                                    <input id="size" name="size" value="{{ $size->size }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>

                                    @error('size')
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
