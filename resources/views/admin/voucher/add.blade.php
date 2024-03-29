@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="email-left-box px-0 mb-3">
                                <div class="p-0">
                                    <a href="" class="btn btn-primary btn-block">Thêm voucher</a>
                                </div>
                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">
                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_Voucher_store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên voucher<span
                                                    class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên mã">
                                                @error('name')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Mã voucher<span
                                                    class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="code" id="code" class="form-control" placeholder="Mã code">
                                                @error('code')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Số tiền giảm<span
                                                    class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="discount" id="discount" class="form-control"
                                                    placeholder="Tiền giảm">
                                                @error('discount')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Số lượng<span
                                                    class="text-danger"> *</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="limit" id="limit" class="form-control"
                                                    placeholder="Nhập số lượng mã voucher">
                                                @error('limit')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt-4">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Ngày bắt đầu
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="date_start" class="form-control">
                                                    @error('date_start')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label">Ngày kết thúc
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="date" name="date_end" class="form-control">
                                                    @error('date_end')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span
                                                    class="text-danger"> *</span></label>
                                            <div>
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="1">
                                                <label class="form-check-label" for="flexRadioDefault2">Kích hoạt</label>
                                            </div>
                                            <input class="form-check-input" type="radio" name="status" value=" 2">
                                            <label class="form-check-label" for="flexRadioDefault1">Khóa</label>
                                            @error('status')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="text-start mt-4 mb-3">
                                            <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                    class="me-2"><i class="fa fa-paper-plane"></i></span>Thêm mới</button>
                                            <div class="btn btn-danger light btn-sl-sm"><span class="me-2"><i
                                                        class="fa fa-times"></i></span><a href="{{ route('route_BackEnd_Voucher_index') }}">Hủy</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
