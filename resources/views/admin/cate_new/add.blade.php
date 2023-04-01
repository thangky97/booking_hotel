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
                                    <a href="" class="btn btn-primary btn-block">Thêm Mới Danh mục Tin tức</a>
                                </div>

                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_Category_News_saveAdd') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên Phòng<span
                                                    class="text-danger">(*)</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Name Category_new">
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span class="text-danger">(*)</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value = "2">
                                            <label class="form-check-label" for="flexRadioDefault1" >Khóa</label>
                                            <div>
                                            <input class="form-check-input" type="radio" name="status" value = "1">
                                            <label class="form-check-label" for="flexRadioDefault2">Kích hoạt</label>
                                        </div>
                                        </div>

                                        <div class="text-start mt-4 mb-3">

                                            <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i
                                                class="fa fa-paper-plane"></i></span>Thêm mới</button>
                                                    <button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i
                                                                class="fa fa-times"></i></span><a
                                                            href="{{ route('route_BackEnd_Category_News_List') }}">Quay Lại</a></button>
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
@endsection
