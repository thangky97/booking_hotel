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
                            <div id="msg-box">
                                <?php //Hiển thị thông báo thành công
                                ?>
                                @if (Session::has('success'))
                                    <div class="alert alert-success solid alert-dismissible fade show">
                                        <span><i class="mdi mdi-check"></i></span>
                                        <strong>{{ Session::get('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                                <?php //Hiển thị thông báo lỗi
                                ?>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                        <span><i class="mdi mdi-help"></i></span>
                                        <strong>{{ Session::get('errors') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="email-left-box px-0 mb-3">
                                <div class="p-0">
                                    <a href="" class="btn btn-primary btn-block">Sửa Banner</a>
                                </div>

                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                <div class="compose-content">
                                    <form class=""
                                        action="{{ route('route_BackEnd_Banner_Update', ['id' => request()->route('id')]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
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

                                        <div class="form-group" style="margin-top: 25px">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1"
                                                        {{ isset($objItem) && $objItem->status === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Kích
                                                        hoạt</label>
                                                </div>
                                                <input class="form-check-input" type="radio" name="status" value="0"
                                                    {{ isset($objItem) && $objItem->status === 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Khóa</label>
                                                @error('status')
                                                    <div class="mt-1">
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
                                                        href="{{ route('route_BackEnd_Banner_List') }}">Hủy</a></button>
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
