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
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="images/profile/profile.png" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">Tên Quản trị viên</h4>
											<p>Chức vụ</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">Email</h4>
											<p>Email</p>
										</div>
										
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-xl-12">
						<div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
							<div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">Tất cả</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Pending" role="tab">Phòng</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Dịch vụ</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Khuyến mại</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Mới nhất</a>
									</li>
								</ul>
							</div>
							<div class="table-search">
								<div class="input-group search-area mb-xxl-0 mb-4">
									<input type="text" class="form-control" placeholder="Tìm kiếm">
									<span class="input-group-text"><a href="javascript:void(0)"><i
												class="flaticon-381-search-2"></i></a></span>
								</div>
							</div>
							<div>
								
								<a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i
										class="far fa-file-word me-2"></i>Tạo báo cáo</a>
							</div>
						</div>
						<div class="tab-content">
							<div class="tab-pane active show" id="All">
								<div class="table-responsive">
									<table
										class="table card-table default-table display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
										id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value=""
															id="checkAll">
													</div>
												</th>
												<th>Tên bài đăng</th>
												<th>Loại</th>
												<th>Thẻ</th>
												<th>Chi tiết</th>
												<th>Trạng thái</th>
												<th class="bg-none"></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="guest-bx">
														<img class="me-3" src="images/hotel/pic11.jpg" alt="">
														<div>
															<span class="text-primary">#bv1</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Phòng thường giảm giá....</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Phòng</span>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Hot</span>
													</div>
												</td>
												<td>
													<div>

														<span class="fs-16">Phòng thường giảm giá 10% vào các dịp lễ ....</span>
													</div>
												</td>
												<td><span class="text-danger font-w600">Ẩn</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link"
															data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item"
																href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="guest-bx">
														<img class="me-3" src="images/hotel/pic22.jpg" alt="">
														<div>
															<span class="text-primary">#0001</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Queen A-0001</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Dịch vụ</span>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Khuyến mại</span>
													</div>
												</td>
												<td>
													<div>

														<span class="fs-16">Khuyến mại các dịch vụ như: tour quanh đảo....</span>
													</div>
												</td>
												<td><span class="text-success font-w600">Đang hiển thị</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link"
															data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item"
																href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="guest-bx">
														<img class="me-3" src="images/hotel/pic33.jpg" alt="">
														<div>
															<span class="text-primary">#0001</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Queen A-0001</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Sales</span>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Khuyến mại</span>
													</div>
												</td>
												<td>
													<div>

														<span class="fs-16">Ngày 30/4 - 1/5 giảm giá tất cả dịch vụ ....</span>
													</div>
												</td>
												<td><span class="text-success font-w600">Đang hiển thị</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link"
															data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item"
																href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="guest-bx">
														<img class="me-3" src="images/hotel/pic11.jpg" alt="">
														<div>
															<span class="text-primary">#0001</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Queen A-0001</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Dịch vụ</span>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Hot</span>
													</div>
												</td>
												<td>
													<div>

														<span class="fs-16">Hỗ trợ khách có nhu cầu đặt vé ....</span>
													</div>
												</td>
												<td><span class="text-danger font-w600">Ẩn</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link"
															data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item"
																href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
												<td>
													<div class="guest-bx">
														<div id="carouselExampleControls" class="carousel slide me-3"
															data-bs-ride="carousel">
															<div class="carousel-inner">
																<div class="carousel-item active">
																	<img src="images/hotel/pic11.jpg"
																		class="d-block w-100" alt="...">
																</div>
																<div class="carousel-item">
																	<img src="images/hotel/pic22.jpg"
																		class="d-block w-100" alt="...">
																</div>
																<div class="carousel-item">
																	<img src="images/hotel/pic33.jpg"
																		class="d-block w-100" alt="...">
																</div>
															</div>
															<button class="carousel-control-prev" type="button"
																data-bs-target="#carouselExampleControls"
																data-bs-slide="prev">
																<i class="fas fa-chevron-left text-black"></i>
															</button>
															<button class="carousel-control-next" type="button"
																data-bs-target="#carouselExampleControls"
																data-bs-slide="next">
																<i class="fas fa-chevron-right text-black"></i>
															</button>
														</div>
														<div>
															<span class="text-primary">#0002</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Deluxe B-0004</a></h4>
														</div>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Phòng</span>
													</div>
												</td>
												<td>
													<div>
														<span class="fs-16">Hot</span>
													</div>
												</td>
												<td>
													<div>

														<span class="fs-16">Phòng thường giảm giá 10% vào các dịp lễ ....</span>
													</div>
												</td>
												<td><span class="text-success font-w600">Đang hiển thị</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link"
															data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
																<path
																	d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
																	stroke="#262626" stroke-width="2"
																	stroke-linecap="round" stroke-linejoin="round" />
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item"
																href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>