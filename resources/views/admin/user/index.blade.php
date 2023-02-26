@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
							
							<div class="table-search">
								<div class="input-group search-area mb-xxl-0 mb-4">
									<input type="text" class="form-control" placeholder="Tìm kiếm">
									<span class="input-group-text"><a href="javascript:void(0)"><i
												class="flaticon-381-search-2"></i></a></span>
								</div>
							</div>
							<div>
								<a href="{{route('route_BackEnd_Users_Add')}}" class="btn btn-info mb-xxl-0 mb-4"><i
									class="fa fa-bed me-2"></i>Thêm mới</a>
								<a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i
										class="far fa-file-word me-2"></i>Tạo báo cáo</a>
							</div>
							
						</div>
						<div class="tab-content">
							<div class="tab-pane active show" id="All">
								<div class="table-responsive">
									<table
										class="table card-table  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
										id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value=""
															id="checkAll">
													</div>
												</th>
												<th>Tài khoản</th>
												<th>Email</th>
                                                <th>Chức vụ</th>
                                                <th>Ngày tạo</th>
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
														<div>
															<span class="text-primary">#01</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Hoangcun2605</a></h4>
														</div>
													</div>
												</td>
												
												<td>
													<div>

														<span class="fs-16">hoangcun2605@gmail.com</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">Admin</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">25/02/2023</span>
													</div>
												</td>
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
															<a class="dropdown-item" href="{{route('route_BackEnd_Users_Detail')}}">Edit</a>
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
														<div>
															<span class="text-primary">#01</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Hoangcun2605</a></h4>
														</div>
													</div>
												</td>
												
												<td>
													<div>

														<span class="fs-16">hoangcun2605@gmail.com</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">Admin</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">25/02/2023</span>
													</div>
												</td>
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
															<a class="dropdown-item" href="user-edit.html">Edit</a>
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
														<div>
															<span class="text-primary">#01</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Hoangcun2605</a></h4>
														</div>
													</div>
												</td>
												
												<td>
													<div>

														<span class="fs-16">hoangcun2605@gmail.com</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">Admin</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">25/02/2023</span>
													</div>
												</td>
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
															<a class="dropdown-item" href="user-edit.html">Edit</a>
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
														<div>
															<span class="text-primary">#01</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Hoangcun2605</a></h4>
														</div>
													</div>
												</td>
												
												<td>
													<div>

														<span class="fs-16">hoangcun2605@gmail.com</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">Admin</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">25/02/2023</span>
													</div>
												</td>
												
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
															<a class="dropdown-item" href="user-edit.html">Edit</a>
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
														<div>
															<span class="text-primary">#01</span>
															<h4 class="mb-0 mt-1"><a class="text-black"
																	href="guest-detail.html">Hoangcun2605</a></h4>
														</div>
													</div>
												</td>
												
												<td>
													<div>

														<span class="fs-16">hoangcun2605@gmail.com</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">Admin</span>
													</div>
												</td>
                                                <td>
													<div>

														<span class="fs-16">25/02/2023</span>
													</div>
												</td>
												
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
															<a class="dropdown-item" href="user-edit.html">Edit</a>
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