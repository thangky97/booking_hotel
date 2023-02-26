@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				
				
                <!-- row -->


                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-intro-title">Lịch hoạt động</h4>

                                <div class="">
                                    <div id="external-events" class="my-3">
                                        <p>Kéo và thả sự kiện của bạn hoặc nhấp vào lịch</p>
                                        <div class="external-event btn-primary light" data-class="bg-primary"><i class="fa fa-move"></i><span>Chủ đề mới</span></div>
                                        <div class="external-event btn-warning light" data-class="bg-warning"><i class="fa fa-move"></i>Sự kiện
                                        </div>
                                        <div class="external-event btn-danger light" data-class="bg-danger"><i class="fa fa-move"></i>Họp quản lý</div>
                                        <div class="external-event btn-info light" data-class="bg-info"><i class="fa fa-move"></i>Tạo chủ đề mới</div>
                                        <div class="external-event btn-dark light" data-class="bg-dark"><i class="fa fa-move"></i>Dự án mới</div>
                                        <div class="external-event btn-secondary light" data-class="bg-secondary"><i class="fa fa-move"></i>Họp hội đồng</div>
                                    </div>
                                    <!-- checkbox -->
									<div class="checkbox form-check checkbox-event custom-checkbox pt-3 pb-5">
										<input type="checkbox" class="form-check-input" id="drop-remove">
										<label class="form-check-label" for="drop-remove">Xóa sau khi thả</label>
									</div>
                                    <a href="javascript:void()" data-bs-toggle="modal" data-bs-target="#add-category" class="btn btn-primary btn-event w-100">
                                        <span class="align-middle"><i class="ti-plus"></i></span> Tạo mới
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="app-fullcalendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Tạo sự kiện mới</strong></h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Tạo sự kiện</button>

                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-bs-toggle="modal">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Thêm mới</strong></h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label form-label">Tên</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="Name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label form-label">Chọn màu loại</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="Color">
                                                    <option value="success">Xanh lá cây</option>
                                                    <option value="danger">Đỏ</option>
                                                    <option value="info">Xanh da trời</option>
                                                    <option value="pink">Hồng</option>
                                                    <option value="primary">Xám</option>
                                                    <option value="warning">Vàng</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-bs-toggle="modal">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>