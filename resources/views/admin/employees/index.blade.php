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
							<div class="card-tabs mt-3 mt-sm-0">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">Tất cả</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Pending" role="tab">Hoạt động</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Không hoạt động</a>
									</li>
								</ul>
							</div>
							<a href="javascript:void(0);" class="btn btn-primary mt-3"><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
						</div>
						<div class="tab-content">	
							<div class="tab-pane active show" id="All">
								<div class="table-responsive">
									<table class="table card-table display mb-4 dataTablesCard table-responsive-lg" id="guestTable-all">
										<thead>
											<tr>
												<th class="bg-none">
													<div class="form-check style-1">
													  <input class="form-check-input" type="checkbox" value="" id="checkAll">
													</div>
												</th>
												<th>Tên nhân viên</th>
												<th>Mô tả công việc</th>
												<th>Giờ làm việc</th>
												<th>Liên hệ</th>
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
													<div class="concierge-bx">
														<img class="me-3 rounded" src="images/avatar/pic1.jpg" alt="">
														<div>
															<span class="text-primary">#EMP-00025</span>
															<h4 class="mt-1"><a class="text-black" href="guest-detail.html">Rio Fernandez</a></h4>
															<span class="fs-14">Join on January 21th, 2015</span>
														</div>
													</div>
												</td>
												<td class="job-desk">
													<div>
														<span class="fs-16">Act as a liaison between guests and any department necessary including the kitchen, housekeeping, etc</span>
													</div>
												</td>
												<td>
													<div>
														<h5 class="font-w600">Tuesday, Friday, Sunday</h5>
														<span>08:00 AM - 04:00 PM</span>
													</div>
												</td>
												<td>
													<div class="text-nowrap">
														<span class="text-black font-w500"><i class="fas fa-phone-volume me-2 text-primary"></i>+12 3456 678</span>
													</div>
												</td>
												<td><span class="text-danger font-w600">INACTIVE</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
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
													<div class="concierge-bx">
														<img class="me-3 rounded" src="images/avatar/pic2.jpg" alt="">
														<div>
															<span class="text-primary">#EMP-00025</span>
															<h4 class="mt-1"><a class="text-black" href="guest-detail.html">Thomas Djons</a></h4>
															<span class="fs-14">Join on January 21th, 2015</span>
														</div>
													</div>
												</td>
												<td class="job-desk">
													<div>
														<span class="fs-16">Answering guest inquiries, directing phone calls, coordinating travel plans, and more.</span>
													</div>
												</td>
												<td>
													<div>
														<h5 class="font-w600">Tuesday, Friday, Sunday</h5>
														<span>08:00 AM - 04:00 PM</span>
													</div>
												</td>
												<td>
													<div class="text-nowrap">
														<span class="text-black font-w500"><i class="fas fa-phone-volume me-2 text-primary"></i>+12 3456 678</span>
													</div>
												</td>
												<td><span class="text-danger font-w600">INACTIVE</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
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
													<div class="concierge-bx">
														<img class="me-3 rounded" src="images/avatar/pic3.jpg" alt="">
														<div>
															<span class="text-primary">#EMP-00025</span>
															<h4 class="mt-1"><a class="text-black" href="guest-detail.html">Margaretha</a></h4>
															<span class="fs-14">Join on January 21th, 2015</span>
														</div>
													</div>
												</td>
												<td class="job-desk">
													<div>
														<span class="fs-16">Act as a liaison between guests and any department necessary including the kitchen, housekeeping, etc</span>
													</div>
												</td>
												<td>
													<div>
														<h5 class="font-w600">Tuesday, Friday, Sunday</h5>
														<span>08:00 AM - 04:00 PM</span>
													</div>
												</td>
												<td>
													<div class="text-nowrap">
														<span class="text-black font-w500"><i class="fas fa-phone-volume me-2 text-primary"></i>+12 3456 678</span>
													</div>
												</td>
												<td><span class="text-success font-w600">ACTIVE</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
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
													<div class="concierge-bx">
														<img class="me-3 rounded" src="images/avatar/pic4.jpg" alt="">
														<div>
															<span class="text-primary">#EMP-00025</span>
															<h4 class="mt-1"><a class="text-black" href="guest-detail.html">James Junaidi</a></h4>
															<span class="fs-14">Join on January 21th, 2015</span>
														</div>
													</div>
												</td>
												<td class="job-desk">
													<div>
														<span class="fs-16">Act as a liaison between guests and any department necessary including the kitchen, housekeeping, etc</span>
													</div>
												</td>
												<td>
													<div>
														<h5 class="font-w600">Tuesday, Friday, Sunday</h5>
														<span>08:00 AM - 04:00 PM</span>
													</div>
												</td>
												<td>
													<div class="text-nowrap">
														<span class="text-black font-w500"><i class="fas fa-phone-volume me-2 text-primary"></i>+12 3456 678</span>
													</div>
												</td>
												<td><span class="text-danger font-w600">INACTIVE</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
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
													<div class="concierge-bx">
														<img class="me-3 rounded" src="images/avatar/pic5.jpg" alt="">
														<div>
															<span class="text-primary">#EMP-00025</span>
															<h4 class="mt-1"><a class="text-black" href="guest-detail.html">Margaretha</a></h4>
															<span class="fs-14">Join on January 21th, 2015</span>
														</div>
													</div>
												</td>
												<td class="job-desk">
													<div>
														<span class="fs-16">Act as a liaison between guests and any department necessary including the kitchen, housekeeping, etc</span>
													</div>
												</td>
												<td>
													<div>
														<h5 class="font-w600">Tuesday, Friday, Sunday</h5>
														<span>08:00 AM - 04:00 PM</span>
													</div>
												</td>
												<td>
													<div class="text-nowrap">
														<span class="text-black font-w500"><i class="fas fa-phone-volume me-2 text-primary"></i>+12 3456 678</span>
													</div>
												</td>
												<td><span class="text-success font-w600">ACTIVE</span></td>
												<td>
													<div class="dropdown dropstart">
														<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="javascript:void(0);">Edit</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
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