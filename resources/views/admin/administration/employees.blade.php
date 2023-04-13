@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset($employees->avatar) ? '' . Storage::url($employees->avatar) : $employees->name }}" class="img-fluid rounded-circle" alt="">
                            </div>

                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ $employees->name }}</h4>
                                    <p>
                                        @if ($employees->role === 1)
                                        <span class="badge light badge-success">Admin</span>
                                        @else
                                        <span class="badge light badge-success">Nhân viên</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">{{ $employees->email }}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24">
                                                </rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2">
                                                </circle>
                                            </g>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i>
                                            Hồ sơ cá nhân</li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Thêm tài khoản</li>

                                        <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Khóa tài khoản</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#booking-fulltime" data-bs-toggle="tab" class="nav-link active show">Toàn thời gian ({{$bookingEmployeesFulltime->total()}})</a>
                                    </li>
                                    <li class="nav-item"><a href="#booking-month" data-bs-toggle="tab" class="nav-link show">Trong tháng này({{$bookingEmployeesMonth->total()}})</a>
                                    </li>
                                </ul>
                                <div id="msg-box" class="mt-3">
                                    <?php //Hiển thị thông báo thành công
                                    ?>
                                    @if ( Session::has('success') )
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <strong>{{ Session::get('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                    @endif
                                    <?php //Hiển thị thông báo lỗi
                                    ?>
                                    @if ( Session::has('error') )
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <strong>{{ Session::get('error') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
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
                                <div class="tab-content">
                                    <div id="booking-fulltime" class="tab-pane fade active show">

                                        <div class="table-responsive">
                                            <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                                <thead>
                                                    <tr>


                                                        <th class="h5 text-center">Khách hàng</th>
                                                        <th class="h5 text-center">Ngày đặt</th>
                                                        <th class="h5 text-center">Ngày trả</th>
                                                        <th class="h5 text-center">Người</th>
                                                        <th class="h5 text-center w180">Thanh toán</th>
                                                        <th class="h5 text-center">Thanh toán(VNPAY)</th>
                                                        <th class="h5 text-center">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1 ?>
                                                    @foreach($bookingEmployeesFulltime as $index => $item)
                                                    @if($item->status_booking==1)
                                                    <tr>


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
                                                            @if($item->status_pay==0)
                                                            <form action="{{route('route_BackEnd_Bookings_Updatepay',$item->id)}}" method="post">
                                                                @csrf
                                                                <input name="status_pay" value="1" hidden>
                                                                <button type="submit" onclick="return confirm('Đơn hàng đã thanh toán ?')" class="btn btn-danger w180">Chưa thanh toán</button>

                                                            </form>
                                                            @else
                                                            <input name="status_pay" value="1" hidden>
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
                                                                    @if(in_array($item->id,$list))
                                                                    <a class="dropdown-item" href="{{route('route_BackEnd_Bill',$item->id)}}">Xem Bill</a>
                                                                    @else
                                                                    <a class="dropdown-item" href="{{route('route_BackEnd_Bill_Room',$item->id)}}">Tạo Bill</a>
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
                                        {{$bookingEmployeesFulltime->links('paginate.index')}}
                                    </div>
                                    <div id="booking-month" class="tab-pane fade active ">
                                        <div class="table-responsive">
                                            <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                                <thead>
                                                    <tr>


                                                        <th class="h5 text-center">Khách hàng</th>
                                                        <th class="h5 text-center">Ngày đặt</th>
                                                        <th class="h5 text-center">Ngày trả</th>
                                                        <th class="h5 text-center">Người</th>
                                                        <th class="h5 text-center w180">Thanh toán</th>
                                                        <th class="h5 text-center">Thanh toán(VNPAY)</th>
                                                        <th class="h5 text-center">Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1 ?>
                                                    @foreach($bookingEmployeesMonth as $index => $item)
                                                    @if($item->status_booking==1)
                                                    <tr>


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
                                                            @if($item->status_pay==0)
                                                            <form action="{{route('route_BackEnd_Bookings_Updatepay',$item->id)}}" method="post">
                                                                @csrf
                                                                <input name="status_pay" value="1" hidden>
                                                                <button type="submit" onclick="return confirm('Đơn hàng đã thanh toán ?')" class="btn btn-danger w180">Chưa thanh toán</button>

                                                            </form>
                                                            @else
                                                            <input name="status_pay" value="1" hidden>
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
                                                                    @if(in_array($item->id,$list))
                                                                    <a class="dropdown-item" href="{{route('route_BackEnd_Bill',$item->id)}}">Xem Bill</a>
                                                                    @else
                                                                    <a class="dropdown-item" href="{{route('route_BackEnd_Bill_Room',$item->id)}}">Tạo Bill</a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection