@extends('admin.layout')

@section('page_title', 'Coupon')

@section('coupon_select', 'active')

@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Coupon</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.coupon.create') }}">
                <button type="button" class="btn btn-success">Add New</button>
            </a>
        </div>
    </div>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->

            <div class="text text-success mb-1">
                {{ session('message') }}
            </div>

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titlle</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->title }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->value }}</td>
                                <td>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <a href="{{ route('admin.coupon.edit' , $coupon) }}">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            </a>
                                        </div>
                                
                                        <div class="col-md-3">
                                            @if ($coupon->status == 1)
                                            <a href="{{ url('admin/coupon/status/0') }}/{{ $coupon->id }} "
                                                class="btn btn-success ">Active</a>
                                            @elseif($coupon->status == 0)
                                            <a href="{{ url('admin/coupon/status/1') }}/{{ $coupon->id }}"
                                                class="btn btn-warning ">Dactive</a>
                                            @endif
                                        </div>
                                
                                        <div class="col-md-3">
                                            <form action="{{ route('admin.coupon.delete', $coupon) }}" method="post">
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
