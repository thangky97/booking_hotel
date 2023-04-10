@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation"
                                      action="{{route('route_BackEnd_Bookings_Createservice', $id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
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
                                    </div>
                                    <div class="tab-content">
                                        <div
                                            class="tab-pane active show'?>">
                                            <div class="table-responsive">
                                                <table
                                                    class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl "
                                                    id="guestTable-all">
                                                    <thead>
                                                    <tr>
                                                        <th class="h5 text-center">STT</th>
                                                        <th class="h5 text-center">Tên phòng</th>
                                                        <th class="h5 text-center">Dịch vụ</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1 ?>
                                                    @foreach($listRooms as $index => $item)
                                                        <tr>
                                                            <td class="text-center">{{$i++}}</td>
                                                            <td class="text-center">
                                                                <div class="guest-bx" style="justify-content: center;">
                                                                    <img class="me-3 "
                                                                         src="{{asset("storage/".$item->images)}}"
                                                                         alt="">
                                                                    <div>
                                                                        <h4 class="mb-0 mt-1"><a
                                                                                class="text-black"
                                                                                href="">{{$item->name}}</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col-0 form-check">
                                                                    <div class="container">
                                                                        <ul class="ks-cboxtags" style="display: flex; justify-content: space-between;">
                                                                            @foreach($listSevice as $service)
                                                                                <li><input type="checkbox" id="{{$service->id}}" name="service_id_{{$index}}[]" value="{{$service->id}}">{{$service->name}}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="float: right;padding-left: 30px;">
                                            <button type="submit" class="btn btn-primary"><span class="me-2"><i
                                                        class="fa fa-paper-plane"></i></span>Đặt Phòng
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
