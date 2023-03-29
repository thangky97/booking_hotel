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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">Tất cả</a>
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
                            <a href="{{route('route_BackEnd_ServiceRoom_add')}}" class="btn btn-info mb-xxl-0 mb-4"><i class="fa fa-bed me-2"></i>Thêm mới</a>
                            <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4"><i class="far fa-file-word me-2"></i>Tạo báo cáo</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="All">
                            <div class="table-responsive">
                                <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                    <thead>
                                    <tr>
                                        <th class="bg-none text-center">
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="checkAll">
                                            </div>
                                        </th>
                                        <th class="h5 text-center">STT</th>
                                        <th class="h5 text-center">Tên phòng</th>
                                        <th class="h5 text-center">Tên dịch vụ</th>
                                        <th class="h5 text-center">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listServicerooms as $index => $item)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{$index+1}}
                                            </td>
                                            <td class="text-center">
                                                <p>
                                                    @foreach ($listRooms as $room)
                                                            <?php if($item->room_id==$room->id){
                                                            echo $room->name;
                                                        }?>
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p>
                                                    <?php $service_ids = explode(',', $item->service_id); ?>
                                                    @foreach ($listServices as $service)
                                                        @foreach($service_ids as $inx => $ser_id)
                                                           @if($ser_id==$service->id)
                                                               {{$inx>0?', '.$service->name:$service->name}}
                                                           @endif
                                                        @endforeach
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('route_BackEnd_ServiceRoom_edit',$item->id)}}"><button class="btn btn-primary">Sửa</button></a>
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
