@extends('templates/admin.layoutadmin')
{{--  @section('title', $title)  --}}
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
                                <a href="" class="btn btn-primary btn-block">Sửa Loại Phòng</a>
                            </div>

                        </div>
                        <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                    <div class="compose-content">
                                        <form action="#">

                                            <div class="mb-3">
                                                <div>Tên loại phòng</div>
                                                <input type="text" name="username" class="form-control bg-transparent"
                                                    placeholder=" Tên loại phòng">
                                            </div>

                                            <div class="mb-3">
                                                <div>Số lượng</div>
                                                <input type="text" name="username" class="form-control bg-transparent"
                                                    placeholder=" Số lượng phòng">
                                            </div>

                                        </form>

                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="button"><span
                                                class="me-2"><i class="fa fa-paper-plane"></i></span>Cập nhật</button>
                                        <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                class="me-2"><i class="fa fa-times"></i></span>Làm mới</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
