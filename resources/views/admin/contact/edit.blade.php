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
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                                <?php //Hiển thị thông báo lỗi
                                ?>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                        <span><i class="mdi mdi-help"></i></span>
                                        <strong>{{ Session::get('errors') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                            </div>
                            {{--  <div class="email-left-box px-0 mb-3">
                                <div class="p-0">
                                    <a href="" class="btn btn-primary btn-block">Thêm Mới Loại Phòng</a>
                                </div>

                            </div>  --}}
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_Contact_Detail', $id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên liên hệ<span
                                                    class="text-danger"> *</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    style="background: #f3f3f3"
                                                    value="{{ old('name', $editContact->name) }}" disabled>
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Số điện thoại<span
                                                    class="text-danger"> *</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                    style="background: #f3f3f3"
                                                    value="{{ old('phone', $editContact->phone) }}" disabled>
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Email<span
                                                    class="text-danger"> *</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    style="background: #f3f3f3"
                                                    value="{{ old('email', $editContact->email) }}" disabled>
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label block">Nội
                                                dung<span class="text-danger"> *</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="content" id="content" class="form-control"
                                                    style="background: #f3f3f3"
                                                    value="{{ old('content', $editContact->content) }}" disabled>
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tiêu đề<span
                                                    class="text-danger"> *</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="title" id="title" class="form-control"
                                                    style="background: #f3f3f3"
                                                    value="{{ old('title', $editContact->title) }}" disabled>
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span
                                                    class="text-danger"> *</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value="0"
                                                    {{ isset($editContact) && $editContact->status === 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Chưa liên hệ</label>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1"
                                                        {{ isset($editContact) && $editContact->status === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Đã liên
                                                        hệ</label>
                                                </div>
                                            </div>
                                            <div class="text-start mt-4 mb-3">

                                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                        class="me-2"><i class="fa fa-paper-plane"></i></span>Cập
                                                    Nhật</button>
                                                <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                        class="me-2"><i class="fa fa-times"></i></span><a
                                                        href="{{ route('route_BackEnd_Contact_List') }}">Quay
                                                        Lại</a></button>
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
