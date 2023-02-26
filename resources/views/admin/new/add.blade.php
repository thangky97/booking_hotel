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
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="email-left-box px-0 mb-3">
									<div class="p-0">
										<a href="" class="btn btn-primary btn-block">Soạn bài đăng</a>
									</div>

									<div class="mail-list rounded overflow-hidden mt-4">
										<div class="intro-title d-flex justify-content-between my-0">
											<h5>Danh mục</h5>
											
										</div>
										<select class="form-select" id="single-select-field"
											data-placeholder="Choose one thing"
											>
											<option selected value="1"> Phòng</option>
											<option value="2"> Dịch vụ</option>
											<option value="3"> Sự kiện</option>
											<option value="4"> Khuyến mại</option>
										</select>

									</div>
								</div>
								<div class="email-right-box ms-0 ms-sm-4 ms-sm-0">
									<div class="toolbar mb-4" role="toolbar">
										<div class="btn-group mb-1">
											<button type="button" class="btn btn-primary light px-3"><i
													class="fa fa-archive"></i></button>
											<button type="button" class="btn btn-primary light px-3"><i
													class="fa fa-exclamation-circle"></i></button>
											<button type="button" class="btn btn-primary light px-3"><i
													class="fa fa-trash"></i></button>
										</div>
										
										<div class="btn-group mb-1">
											<button type="button" class="btn btn-primary light dropdown-toggle px-3"
												data-bs-toggle="dropdown">
												<i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="javascript: void(0);">Mới</a>
												<a class="dropdown-item" href="javascript: void(0);">Nổi bật</a>
												<a class="dropdown-item" href="javascript: void(0);">Khuyến mại</a>
												<a class="dropdown-item" href="javascript: void(0);">Hướng dẫn</a>
											</div>
										</div>
										
									</div>
									<div class="compose-content">
										<form action="#">
											<div class="mb-3">
												<input type="text" class="form-control bg-transparent"
													placeholder=" Tiêu đề:">
											</div>

											<div class="mb-3">
												<textarea id="email-compose-editor"
													class="textarea_editor form-control bg-transparent" rows="15"
													placeholder="Nội dung..."></textarea>
											</div>
										</form>
										<h5 class="mb-4"><i class="fa fa-paperclip"></i> Đính kèm file</h5>
										<form action="#" class="dropzone">
											<div class="fallback">
												<input name="file" type="file" multiple />
											</div>
										</form>
									</div>
									<div class="text-start mt-4 mb-3">
										<button class="btn btn-primary btn-sl-sm me-2" type="button"><span
												class="me-2"><i class="fa fa-paper-plane"></i></span>Đăng</button>
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