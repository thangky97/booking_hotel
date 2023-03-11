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
                        <a href="{{route('route_BackEnd_PropertyRoom_add')}}" class="btn btn-primary mb-xxl-0 mb-4 "><i class="far fa-file-word me-2"></i>Thêm mới</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="All">
                            <div class="table-responsive">
                                <table class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl " id="guestTable-all">
                                    <thead>
                                    <tr>
                                        <th class="h5">STT</th>
                                        <th class="h5">Tên phòng</th>
                                        <th class="h5">Tên thuộc tính</th>
                                        <th class="h5">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listPropertyrooms as $index => $item)
                                        <tr>
                                            <td>
                                                {{$index+1}}
                                            </td>
                                            <td>
                                                <p>
                                                    @foreach ($listRooms as $room)
                                                            <?php if($item->room_id==$room->id){
                                                            echo $room->name;
                                                        }?>
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td>
                                                <p>
                                                    @foreach ($listProperties as $property)
                                                            <?php if($item->properties_id==$property->id){
                                                            echo $property->name;
                                                        }?>
                                                    @endforeach
                                                </p>
                                            </td>
                                            <td style="display: flex">
                                                <a href="{{route('route_BackEnd_PropertyRoom_edit',$item->id)}}" style="margin-left: 10px"><button class="btn btn-primary">Sửa</button></a>
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
