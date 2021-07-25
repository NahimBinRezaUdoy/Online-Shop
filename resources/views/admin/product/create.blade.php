@extends('admin.layout')

@section('page_title', 'Manage Product')

@section('product_select', 'active')


@section('container')
    <div class="row">
        <div class="col-9">
            <h1>Create product</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('admin.product.index') }}">
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
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12 center">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="name" class="control-label mb-1">Name</label>
                                            <input id="name" name="name" value="{{ old('name') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>

                                            @error('name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="slug" class="control-label mb-1">Slug</label>
                                            <input id="slug" name="slug" value="{{ old('slug') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>

                                            @error('slug')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <input id="image" name="image" value="{{ old('image') }}" type="file"
                                                class="form-control" aria-required="true" aria-invalid="false"
                                                >

                                            @error('image')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_id" class="control-label mb-1">Category</label>
                                            <select id="category_id" name="category_id" value="{{ old('category_id') }}"
                                                type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                required>
                                                <option value="">Select Categories</option>
                                                {{-- @foreach ($category as $list)
                                                    @if ($category_id == $list->id)
                                                        <option selected value="{{ $list->id }}">
                                                            {{ $list->category_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $list->id }}">{{ $list->category_name }}
                                                        </option>
                                                    @endif
                                                @endforeach --}}

                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="brand" class="control-label mb-1">Brand</label>
                                            <input id="brand" name="brand" value="{{ old('brand') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="model" class="control-label mb-1">Model</label>
                                            <input id="model" name="model" value="{{ old('model') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="short_desc" class="control-label mb-1">Short Description</label>
                                            <input id="short_desc" name="short_desc" value="{{ old('short_desc') }}"
                                                type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="desc" class="control-label mb-1">Description</label>
                                            <input id="desc" name="desc" value="{{ old('desc') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="keywords" class="control-label mb-1">Keyword</label>
                                            <input id="keywords" name="keywords" value="{{ old('keywords') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="technical_spacification" class="control-label mb-1">Technical
                                                Spacification</label>
                                            <input id="technical_spacification" name="technical_spacification"
                                                value="{{ old('technical_spacification') }}" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" required>

                                        </div>
                                        <div class="col-md-4">
                                            <label for="uses" class="control-label mb-1">Uses</label>
                                            <input id="uses" name="uses" value="{{ old('uses') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>

                                        </div>
                                        <div class="col-md-4">
                                            <label for="warranty" class="control-label mb-1">warranty</label>
                                            <input id="warranty" name="warranty" value="{{ old('warranty') }}" type="text"
                                                class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                    </div>
                                </div>

                

                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <h2 class="m-2">Product Attributes</h2>
                    <div class="col-lg-12" id="product_attr_box">
                        @php
                            $loop_count_num = 1;
                            
                        @endphp
                        @foreach ($productAttrArr as $key => $value)
                            @php
                                $loop_count_prev = $loop_count_num;
                                $pAArr = (array) $value;
                            @endphp
                            <div class="card" id="product_attr_{{ $loop_count_num++ }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="sku" class="control-label mb-1">SKU</label>
                                                <input id="sku" name="sku[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" value="{{ $pAArr['sku'] }}"
                                                    required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="mrp" class="control-label mb-1">MRP</label>
                                                <input id="mrp" name="mrp[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" value="{{ $pAArr['mrp'] }}"
                                                    required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="price" class="control-label mb-1">Price</label>
                                                <input id="price" name="price[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="{{ $pAArr['price'] }}" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="size_id" class="control-label mb-1">Size</label>
                                                <select name="size_id[]" id="size_id" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false">
                                                    <option value="">Select</option>
                                                    @foreach ($sizes as $list)
                                                        @if ($pAArr['size_id'] == $list->id)
                                                            <option value="{{ $list->id }}" selected>
                                                                {{ $list->size }}</option>
                                                        @else
                                                            <option value="{{ $list->id }}">{{ $list->size }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="color_id" class="control-label mb-1">Color</label>
                                                <select name="color_id[]" id="color_id" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false"
                                                    value="{{ $pAArr['color_id'] }}">
                                                    <option value="">Select</option>
                                                    @foreach ($colors as $list)
                                                        @if ($pAArr['color_id'] == $list->id)
                                                            <option value="{{ $list->id }}" selected>
                                                                {{ $list->color }}</option>
                                                        @else
                                                            <option value="{{ $list->id }}">{{ $list->color }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="quantity" class="control-label mb-1">Quantity</label>
                                                <input id="quantity" name="quantity[]" type="text" class="form-control"
                                                    aria-required="true" aria-invalid="false" required
                                                    value="{{ $pAArr['quantity'] }}">
                                            </div>


                                            <div class="col-md-4">
                                                <label for="attr_image" class="control-label mb-1">Image</label>
                                                <input type="file" id="attr_image" name="attr_image[]" class="form-control"
                                                    aria-required="true" aria-invalid="false" required>
                                            </div>

                                            @if ($loop_count_num == 2)
                                                <div style="margin-top: 30px" class="col-md-2">
                                                    <button class="btn btn-success" onclick="add_more()">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            @else
                                                <a href="{{ url('admin/product/product_attr_delete/') }}/{{ $pAArr['id'] }}/{{ $id }}"
                                                    style="margin-top: 30px" class="col-md-2">
                                                    <button class="btn btn-secondary">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div> --}}
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                </div>
            </form>
            <!-- END Form-->
        </div>
    </div>



    {{-- <script>
        var loop_count = 1;

        function add_more() {
            loop_count++;

            var html = '<div class="card" id="product_attr_' + loop_count +
                '"><div class="card-body"><div class="form-group"><div class="row" >';

            html +=
                '<div class="col-md-3"><label for="sku" class="control-label mb-1">SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true"aria-invalid="false" required></div>'

            html +=
                '<div class="col-md-3"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true"aria-invalid="false" required></div>'

            html +=
                '<div class="col-md-3"><label for="price" class="control-label mb-1">Price</label><input id="price[]" name="price" type="text" class="form-control"aria-required="true" aria-invalid="false" required></div>'

            html +=
                '<div class="col-md-3"><label for="size_id" class="control-label mb-1">Size</label><select name="size_id[]" id="size_id" type="text" class="form-control"aria-required="true" aria-invalid="false"><option value="">Select</option>@foreach ($sizes as $list)<option value="{{ $list->id }}">{{ $list->size }}</option>@endforeach</select></div>'

            html +=
                '<div class="col-md-3"><label for="color_id" class="control-label mb-1">Color</label><select name="color_id[]" id="color_id" type="text" class="form-control" aria-required="true" aria-invalid="false"><option value="">Select</option>@foreach ($colors as $list)<option value="{{ $list->id }}">{{ $list->color }}</option>@endforeach</select></div>'

            html +=
                '<div class="col-md-3"><label for="quantity" class="control-label mb-1">Quantity</label><input id="quantity" name="quantity[]" type="text" class="form-control" aria-required="true" aria-invalid="false"required></div>'

            html +=
                '<div class="col-md-4"><label for="attr_image" class="control-label mb-1">Image</label><input type="file" id="attr_image" name="attr_image[ ]" class="form-control" aria-required="true" aria-invalid="false"required></div>'

            html +=
                '<div style="margin-top: 30px" class="col-md-2"><button class="btn btn-danger" onclick = remove_more("' +
                loop_count + '")> <i class = "fa fa-minus"></i></button></div>'

            html += '</div></div></div></div>';

            jQuery('#product_attr_box').append(html)
        }

        function remove_more(loop_count) {
            jQuery('#product_attr_' + loop_count).remove();
        }

    </script> --}}
@endsection
