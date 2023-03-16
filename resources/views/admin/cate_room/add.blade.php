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
                                    <a href="" class="btn btn-primary btn-block">Thêm Mới Loại Phòng</a>
                                </div>

                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_Categoryrooms_saveAdd') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên Phòng<span
                                                        class="text-danger">(*)</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                       placeholder="Tên Phòng">
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Giá Phòng<span
                                                        class="text-danger">(*)</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="price" id="price" class="form-control"
                                                       placeholder="Giá Phòng">
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

                                            <div class="form-group">
                                                <h5 class="mb-4"><i class="fa fa-paperclip"></i> Đính kèm File</h5>

                                                <div class="fallback">
                                                    <input type="file" multiple name="imgs[]"/>
                                                </div>

                                            </div>

                                            <div class="text-start mt-4 mb-3">

                                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i
                                                                class="fa fa-paper-plane"></i></span>Thêm mới</button>
                                                <div class="btn btn-danger light btn-sl-sm"><span class="me-2"><i
                                                                class="fa fa-times"></i></span><a
                                                            href="{{ route('route_BackEnd_Categoryrooms_List') }}">Quay Lại</a></div>
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
    <!-- Main content -->
    {{--  <section class="content Hotel">
        <div id="msg-box">
            <?php //Hiển thị thông báo thành công
            ?>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
        </div>

        <form class="form-horizontal " action="{{route('route_BackEnd_Categoryrooms_saveAdd')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="col-md-3 col-sm-4 control-label">NAME<span
                                    class="text-danger">(*)</span></label>

                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="name" id="name" class="form-control">
                                <span id="mes_sdt"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-sm-4 control-label">PRICE<span
                                    class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="file" name="price" id="price" class="form-control" value="">
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
                    </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-sm-4 control-label">IMAGE<span
                                    class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="file" name="image" class="form-control" value="">
                                <span id="mes_sdt"></span>
                            </div>
                        </div>


                        <!-- /.box-body -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"> Save</button>
                            <a href="" class="btn btn-default">Cancel</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>

                </div>
                <br>
                <div class="text-center">

                </div>
                <index-cs ref="index_cs"></index-cs>
    </section>  --}}
@endsection
