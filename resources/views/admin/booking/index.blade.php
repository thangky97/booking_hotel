@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <section class="content booking Hotel">
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">

                            <ul class="nav nav-tabs" role="tablist">
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#All" role="tab">Tất cả</a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#Active" role="tab">Còn hạn</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Canceled" role="tab">Không sử dụng</a>
                                </li>
                            </ul>
                        </div>
                        <div class="table-search">
                            <div class="input-group search-area mb-xxl-0 mb-4">
                                <input type="text" class="form-control" placeholder="Tìm kiếm ">
                                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                            </div>
                        </div>
                        <div>
                            <a href="{{route('route_BackEnd_Bookings_Adduser')}}" class="btn btn-info mb-xxl-0 mb-4" style="margin-right: 30px"><i class="bi bi-minecart-loaded"></i> Thêm mới</a>
                        </div>

                    </div>
                    <div id="msg-box">
                        <?php //Hiển thị thông báo thành công
                        ?>
                        @if (Session::has('success'))
                        <div class="alert alert-success solid alert-dismissible fade show">
                            <span><i class="mdi mdi-check"></i></span>
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                        @endif
                        <?php //Hiển thị thông báo lỗi
                        ?>
                        @if (Session::has('error'))
                        <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <strong>{{ Session::get('errors') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
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
                    <div class="tab-content">
                        <div class="tab-pane active show" id="Active">
                            <div class="table-responsive">
                                <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                    <thead>
                                        <tr>

                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Khách hàng</th>
                                            <th class="h5 text-center">Ngày đặt</th>
                                            <th class="h5 text-center">Ngày trả</th>
                                            <th class="h5 text-center">Người</th>
                                            <th class="h5 text-center">Cccd</th>
                                            <th class="h5 text-center w180">Thanh toán</th>
                                            <th class="h5 text-center">Thanh toán</th>
                                            <th class="h5 text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($listBookings as $index => $item)
                                        @if($item->status_booking==1)
                                        <tr>

                                            <td class="text-center">
                                                {{$i++}}
                                            </td>
                                            <td class="text-center">
                                                <p>
                                                    @foreach ($listUsers as $user)
                                                    <?php if ($item->user_id == $user->id) {
                                                        echo $user->name;
                                                    } ?>
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <div style="width: 100px">
                                                    <h6>{{$format = date("d-m-Y",strtotime($item->checkin_date))}}</h6>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div style="width: 100px">
                                                    <h6>{{$format = date("d-m-Y",strtotime($item->checkout_date))}}</h6>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p>{{$item->people}}</p>
                                            </td>
                                            <td class="text-center">
                                                @if($item->status_cccd==0)
                                                    <form action="{{route('route_BackEnd_Bookings_Updatepay',$item->id)}}" method="post" style="    margin-top: 15px;">
                                                        @csrf
                                                        <input name="status_cccd" value="1" hidden>
                                                        <button type="submit" onclick="return confirm('Khách đã trả phòng và muốn nhận lại cccd ?')" class="btn btn-danger light btn-sl-sm" style="width: 120px; text-align: center">Đang giữ</button>
                                                    </form>
                                                @else
                                                    <button type="submit" class="btn btn-success light btn-sl-sm" onclick="return confirm('Trạng thái đã thanh toán . Liên hệ quản trị viên để thay đổi !')" style="width: 120px;text-align: center">Đã trả</button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($item->status_pay==0)
                                                <form action="{{route('route_BackEnd_Bookings_Updatepay',$item->id)}}" method="post">
                                                    @csrf
                                                    <input name="status_pay" value="1" hidden>
                                                    <button type="submit" onclick="return confirm('Đơn hàng đã thanh toán ?')" class="btn btn-danger w180">Chưa thanh toán</button>

                                                </form>
                                                @else
                                                <button type="submit" class="btn btn-success w180" onclick="return confirm('Trạng thái đã thanh toán . Liên hệ quản trị viên để thay đổi !')">Đã thanh toán</button>
                                                @endif
                                            </td>
                                            <td class="text-center">

                                                @if(empty($item->money_paid))
                                                <p style="width: 150px" class="text-primary">Tại quầy</p>
                                                @else
                                                <p style="width: 150px" class="text-danger"><i>{{number_format($item->money_paid)}}đ</i></p>
                                                @endif


                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}">Chi tiết</a>
                                                        <?php $today = date("Y/m/d", strtotime("now")) ?>
                                                        @if(strtotime($item->checkout_date) <= strtotime($today)) @if(in_array($item->id,$list))
                                                            <a class="dropdown-item" href="{{route('route_BackEnd_Bill',$item->id)}}">Xem Bill</a>
                                                            @else
                                                            <a class="dropdown-item" href="{{route('route_BackEnd_Bill_Room',$item->id)}}">Tạo Bill</a>
                                                            @endif
                                                            @endif

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$listBookings->links('paginate.index')}}
                        </div>
{{--                        <div class="tab-pane fade" id="All">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">--}}
{{--                                    <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="bg-none">--}}
{{--                                                <div class="form-check style-1">--}}
{{--                                                    <input class="form-check-input" type="checkbox" value="" id="checkAll">--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <th class="h5 text-center">STT</th>--}}
{{--                                            <th class="h5 text-center">Khách hàng</th>--}}
{{--                                            <th class="h5 text-center">Ngày đặt</th>--}}
{{--                                            <th class="h5 text-center">Ngày trả</th>--}}
{{--                                            <th class="h5 text-center">Người</th>--}}
{{--                                            <th class="h5 text-center">Thanh Toán</th>--}}
{{--                                            <th class="h5 text-center">Thanh Toán(VNPAY)</th>--}}
{{--                                            <th class="h5 text-center">Hành Động</th>--}}
{{--                                            <th></th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                        <?php $j = 1 ?>--}}
{{--                                        @foreach($listBookings as $index => $item)--}}
{{--                                        <tr>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <div class="form-check style-1">--}}
{{--                                                    <input class="form-check-input" type="checkbox" value="">--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                {{$j++}}--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <p>--}}
{{--                                                    @foreach ($listUsers as $user)--}}
{{--                                                    <?php if ($item->user_id == $user->id) {--}}
{{--                                                        echo $user->name;--}}
{{--                                                    } ?>--}}
{{--                                                    @endforeach--}}
{{--                                                </p>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <div style="width: 100px">--}}
{{--                                                    <h6>{{$item->checkin_date}}</h6>--}}
{{--                                                    <span class="fs-14">08:29 AM</span>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <div style="width: 100px">--}}
{{--                                                    <h6>{{$item->checkout_date}}</h6>--}}
{{--                                                    <span class="fs-14">08:29 AM</span>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <p>{{$item->people}}</p>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <span class="fs-16">--}}
{{--                                                    @if($item->status_booking ==0)--}}
{{--                                                    <span class="badge light badge-warning">Đã Hủy</span>--}}
{{--                                                    @else--}}
{{--                                                    <?= $item->status_pay == 1 ? '<span class="badge light badge-success">Đã thanh toán</span>' : '<span class="badge light badge-warning">Chưa thanh toán</span>' ?>--}}
{{--                                                    @endif </span>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                @if($item->status_booking ==0)--}}
{{--                                                <p style="width: 150px" class="text-danger"><i>Lỗi thanh toán VNPAY</i></p>--}}
{{--                                                @else--}}
{{--                                                @if(empty($item->money_paid))--}}
{{--                                                <p style="width: 150px" class="text-primary">Tại quầy</p>--}}
{{--                                                @else--}}
{{--                                                <p style="width: 150px" class="text-danger"><i>{{number_format($item->money_paid)}}đ</i></p>--}}
{{--                                                @endif--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <div class="dropdown dropstart">--}}
{{--                                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu">--}}
{{--                                                        <a class="dropdown-item" href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}">Chi tiết</a>--}}
{{--                                                        @if(in_array($item->id,$list))--}}
{{--                                                        <a class="dropdown-item" href="{{route('route_BackEnd_Bill',$item->id)}}">Xem Bill</a>--}}
{{--                                                        @else--}}
{{--                                                        <a class="dropdown-item" href="{{route('route_BackEnd_Bill_Room',$item->id)}}">Tạo Bill</a>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <div class="tab-pane fade" id="Canceled">
                            <div class="table-responsive">
                                <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                    <thead>
                                        <tr>
                                            <th class="bg-none">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                </div>
                                            </th>
                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Khách hàng</th>
                                            <th class="h5 text-center">Ngày đặt</th>
                                            <th class="h5 text-center">Ngày trả</th>
                                            <th class="h5 text-center">Người</th>
                                            <th class="h5 text-center">Thanh Toán</th>
                                            <th class="h5 text-center">Trạng thái</th>
                                            <th class="h5 text-center">Hành Động</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $k = 1 ?>
                                        @foreach($listBookings as $index => $item)
                                        @if($item->status_booking!=1)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{$k++}}
                                            </td>
                                            <td class="text-center">
                                                <p>
                                                    @foreach ($listUsers as $user)
                                                    <?php if ($item->user_id == $user->id) {
                                                        echo $user->name;
                                                    } ?>
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <div style="width: 100px">
                                                    <h6>{{date("d-m-2023",strtotime($item->checkin_date))}}</h6>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div style="width: 100px">
                                                    <h6>{{date("d-m-2023",strtotime($item->checkout_date))}}</h6>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p>{{$item->people}}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="fs-16">
                                                    <span class="badge light badge-warning">Đã hủy</span>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @if($item->status_booking==0)
                                                    <p style="width: 150px" class="text-danger"><i>Lỗi thanh toán VNPAY</i></p>
                                                @else
                                                    <p style="width: 150px" class="text-danger"><i>Đơn hủy đơn</i></p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#262626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('route_BackEnd_Bookings_Detail',$item->id)}}">Chi tiết</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>

</div>
