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
					<div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">Tất cả({{count($list)}})</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#Pending" role="tab">Phòng trống</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Phòng đã đặt</a>
							</li>
						</ul>
					</div>
					<div class="table-search">
						<div class="input-group search-area mb-xxl-0 mb-4">
							<input type="text" class="form-control" placeholder="Tìm kiếm">
							<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
						</div>
					</div>
					<div>
						<a href="{{route('route_BackEnd_Rooms_Add')}}" class="btn btn-info mb-xxl-0 mb-4"><i class="fa fa-bed me-2"></i>Thêm mới</a>
						<a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
					</div>
				</div>
				<div class="tab-content">
					<div class="tab-pane active show" id="All">
						<div class="table-responsive">
							<table class="table card-table default-table display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg " id="guestTable-all">
								<thead>
									<tr>
										<th class="bg-none">
											<div class="form-check style-1">
												<input class="form-check-input" type="checkbox" value="" id="checkAll">
											</div>
										</th>
										<th>Tên phòng</th>
										<th>Loại phòng</th>
										<th>Tầng</th>
										<th>Người lớn</th>
										<th>Trẻ em</th>
										<th>Giường</th>
										<th>Trạng thái</th>
										<th class="bg-none"></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($list as $a)
									<tr>
										<td>
											<div class="form-check style-1">
												<input class="form-check-input" type="checkbox" value="">
											</div>
										</td>
										<td>
											<div class="guest-bx">
												<img class="me-3" src="{{asset("storage/".$a->images)}}" alt="">
												<div>
													<span class="text-primary">#000{{$a->id}}</span>
													<h4 class="mb-0 mt-1"><a class="text-black" href="">{{$a->name}}</a></h4>
												</div>
											</div>
										</td>
										<td>
											@foreach ($loai_phong as $lp)
											@if ($a->cate_room == $lp->id)
											<p class="text-black">{{$lp->name}}</p>				
											@endif
											@endforeach
										</td>
										<td>
											<div>
												<span class="fs-16">
													@if ($a->floor==1)
													<p class="text-primary">Tầng 1</p>
													@elseif($a->floor==2)
													<p class="text-primary">Tầng 2</p>
													@elseif($a->floor==3)
													<p class="text-primary">Tầng 3</p>
													@elseif($a->floor==4)
													<p class="text-primary">Tầng 4</p>
													@elseif($a->floor==5)
													<p class="text-primary">Tầng 5</p>
													@elseif($a->floor==6)
													<p class="text-primary">Tầng 6</p>
													@elseif($a->floor==7)
													<p class="text-primary">Tầng 7</p>
													@elseif($a->floor==8)
													<p class="text-primary">Tầng 8</p>
													@elseif($a->floor==9)
													<p class="text-primary">Tầng 9</p>
													@elseif($a->floor==10)
													<p class="text-primary">Tầng 10</p>
													@elseif($a->floor==11)
													<p class="text-primary">Tầng 11</p>
													@elseif($a->floor==12)
													<p class="text-primary">Tầng 12</p>
													@elseif($a->floor==13)
													<p class="text-primary">Tầng 13</p>
													@else
													<p class="text-primary">Tầng 14</p>
													@endif
												</span>
											</div>
										</td>
										<td>
											<div>
												<span class="fs-16">{{$a->adult}} Người</span>
											</div>
										</td>
										<td>
											<div>
												<span class="fs-16">{{$a->childrend}} Người</span>
											</div>
										</td>
										<td>
											<div>
												<span class="fs-16">{{$a->bed}} Giường</span>
											</div>
										</td>
										<td>
											<div>
												<span class="text-danger d-block">
													@if ($a->status==1)
													<p class="text-success">Có thể sử dụng</p>
													@elseif($a->status==2)
													<p class="text-danger">Đã sử dụng</p>
													@else
													<p class="text-warning">Đang bảo trì</p>
													@endif
												</span>
											</div>
										</td>
										<td>
											<div class="dropdown dropstart">
												<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
														<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{route('route_BackEnd_Rooms_Detail',$a->id)}}">Edit</a>
													<a class="dropdown-item" href="javascript:void(0);">Delete</a>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
									
											
								</tbody>
							</table>
						</div>
					</div>
				</div>
				{{$list->links('paginate.index')}} 
			</div>
		</div>
	</div>
</div>