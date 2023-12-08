@extends('admin.layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/admin/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/admin/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إضافة المنتجات</h4>
               
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2023</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 m-auto">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1"> إضافة منتج</h4>
                <p class="mb-2">
                    يمكنك إضافة منتج جديد من هنا
                </p>
            </div>
            <div class="card-body pt-0">
                <form class="form-horizontal" action="{{ route('product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName"
                            placeholder="الإسم">
                    </div>
                    <div class="form-group">
                        <textarea name="description" value="{{ old('description') }}" class="form-control" id="inputName"
                            placeholder="الوصف"></textarea>
                    </div>
                    <div class="form-group">
                        <p class="mg-b-10">اختر التصنيف</p>
                        <select name="section_id" class="form-control select2">
                            <option label="اختر تصنيف للمنتج">
                            </option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">
                                    {{ $section->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control"
                            id="inputName" placeholder="الكمية">
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                            id="inputName" placeholder="السعر">
                    </div>
                    <div class="form-group">
                        <input type="number" name="discount" value="{{ old('discount') }}" class="form-control"
                            id="inputName" placeholder="الخصم">
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file" id="inputName">
                    </div>

                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary">اضف</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/admin/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/admin/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/admin/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

    <script src="{{ URL::asset('assets/admin/js/form-elements.js') }}"></script>

    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>
@endsection
