@extends('admin.layout')

@section('page_title', 'Manage Coupon')

@section('coupon_select', 'active')

@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Create Coupon</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.coupon.index') }}">
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
                            <form action="{{ route('admin.coupon.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title</label>
                                    <input id="title" name="title" value="{{ old('title') }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>

                                    @error('title')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="code" class="control-label mb-1">Code</label>
                                    <input id="code" name="code" value="{{ old('code') }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>

                                    @error('code')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="value" class="control-label mb-1">Value</label>
                                    <input id="value" name="value" value="{{ old('value') }}" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>

                                    @error('value')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
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
