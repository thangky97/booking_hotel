@extends('templates/admin.layoutadmin')

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
								<a href="{{route('route_BackEnd_Category_New_add')}}" class="btn btn-info mb-xxl-0 mb-4"><i
									class="fa fa-bed me-2"></i>Thêm mới</a>
								<a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i
										class="far fa-file-word me-2"></i>Tạo báo cáo</a>
							</div>

						</div>


                            {{--  thong bao  --}}
                        <section class="content booking Hotel">
                            <div id="msg-box">
                                <?php //Hiển thị thông báo thành công
                                ?>
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>{{ Session::get('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true"></span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                                <?php //Hiển thị thông báo lỗi
                                ?>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>{{ Session::get('errors') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            {{-- @if (count($list) <= 0)
                                <p class="alert alert-warning">
                                    Không có dữ liệu phù hợp
                                </p>
                            @endif --}}

                                    {{--  end thong bao  --}}

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
												<th class="text-center">name category_new</th>
                                                <th class="text-center">Trạng thái</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($category as $c)
											<tr>
												<td>
													<div class="form-check style-1">
														<input class="form-check-input" type="checkbox" value="">
													</div>
												</td>
                                                <td>
													<div class="text-center">

														<span>{{ $c->name }}</span>
													</div>
												</td>
                                                <td class="text-center">{{ $c->status == 1 ? 'kích hoạt' : 'khóa' }}</td>

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
															<a class="dropdown-item" href="{{route('route_BackEnd_Category_New_Detail', $c->id)}}">Edit</a>
															<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="dropdown-item"
																href="{{route('route_Category_New_Delete', $c->id)}}">Delete</a>
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
					</div>
				</div>
			</div>
		</div>

        <br>
        <div class="text-center">
            {{$category->links()}}
        </div>
        <index-cs ref="index_cs"></index-cs>
    </section>

@endsection
