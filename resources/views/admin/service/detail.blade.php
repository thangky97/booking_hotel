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
                                    <a href="" class="btn btn-primary btn-block">Sửa Dịch vụ</a>
                                </div>
                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">
                                <div class="compose-content">
                                    <form class=""
                                        action="{{ route('route_BackEnd_Service_Update', ['id' => request()->route('id')]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <div>Tên Dịch vụ<span class="text-danger">*</span></div>
                                            <input type="text" name="name" class="form-control bg-transparent"
                                                placeholder=" Tên dịch vụ" value="{{ $objItem->name }}">
                                            @error('name')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="">Ảnh
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-12">
                                                <div class="form-file">
                                                    <input type="file" name="images"
                                                        class="form-file-input form-control" style="margin-bottom: 6px">
                                                    @if (isset($objItem) && $objItem->images)
                                                        <img src="{{ asset($objItem->images ? '' . Storage::url($objItem->images) : '') }}"
                                                            alt="banner" width="100">
                                                    @endif
                                                    @error('images')
                                                        <div class="mt-1">
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <div>Giá<span class="text-danger">*</span></div>
                                            <input type="number" name="price" class="form-control bg-transparent"
                                                placeholder="Giá" value="{{ $objItem->price }}">
                                            @error('price')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1"
                                                        {{ isset($objItem) && $objItem->status === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Có thể sử
                                                        dụng</label>
                                                </div>
                                                <input class="form-check-input" type="radio" name="status" value="2"
                                                    {{ isset($objItem) && $objItem->status === 2 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Đã sử dụng</label>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="0"
                                                        {{ isset($objItem) && $objItem->status === 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Đang bảo
                                                        trì</label>
                                                </div>
                                                @error('status')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="text-start mt-4 mb-3">

                                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                        class="me-2"><i class="fa fa-paper-plane"></i></span>Cập
                                                    Nhật</button>
                                                <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                        class="me-2"><i class="fa fa-times"></i></span><a
                                                        href="{{ route('route_BackEnd_Service_List') }}">Hủy</a></button>
                                            </div>
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
