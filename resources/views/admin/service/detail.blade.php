@extends('templates/admin.layoutadmin')
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- row -->
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
                                            <div>Tên Dịch vụ<span class="text-danger">(*)</span></div>
                                            <input type="text" name="name" class="form-control bg-transparent"
                                                placeholder=" Tên dịch vụ" value="{{ $objItem->name }}">
                                        </div>
                                        <div class="form-group">
                                            <h5 class="mb-4"><i class="fa fa-paperclip"></i>Ảnh</h5>

                                            <div class="fallback">
                                                <input name="images" type="file" />
                                            </div>

                                        </div>

                                        <div class="form-group mt-3">
                                            <div>Giá<span class="text-danger">(*)</span></div>
                                            <input type="number" name="price" class="form-control bg-transparent"
                                                placeholder="Giá" value="{{ $objItem->price }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span
                                                    class="text-danger">(*)</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="2">
                                                <label class="form-check-label" for="flexRadioDefault1">Khóa</label>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1">
                                                    <label class="form-check-label" for="flexRadioDefault2">Kích
                                                        hoạt</label>
                                                </div>
                                            </div>
                                            <div class="text-start mt-4 mb-3">

                                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                        class="me-2"><i class="fa fa-paper-plane"></i></span>Cập
                                                    Nhật</button>
                                                <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                        class="me-2"><i class="fa fa-times"></i></span><a
                                                        href="{{ route('route_BackEnd_Service_List') }}">Quay
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