@extends('admin.layout')

@section('page_title', 'Manage Color')

@section('color_select', 'active')

@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Edit Color</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.color.index') }}">
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
                            <form action="{{ route('admin.color.update',$color) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="color" class="control-label mb-1">color</label>
                                    <input id="color" name="color" value="{{ $color->color }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>

                                    @error('color')
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
