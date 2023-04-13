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
                                      action="{{route('route_BackEnd_Bookings_Updateservice', $id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
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
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td class="text-center">
                                                                <div class="guest-bx" style="justify-content: center;">
                                                                    <img class="me-3 "
                                                                         src="{{asset("storage/".$room->images)}}"
                                                                         alt="">
                                                                    <div>
                                                                        <h4 class="mb-0 mt-1"><a
                                                                                class="text-black"
                                                                                href="">{{$room->name}}</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="col-0 form-check">
                                                                    <div class="container">
                                                                        <ul class="ks-cboxtags" style="display: flex; justify-content: space-between;">
                                                                            @foreach($listService as $service)
                                                                                <li><input type="checkbox" id="{{$service->id}}" name="service_id[]" value="{{$service->id}}" {{!empty(in_array($service->id,$services))?'checked':''}}>{{$service->name}}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="float: right;padding-left: 30px;">
                                            <button type="submit" class="btn btn-primary"><span class="me-2"><i
                                                        class="fa fa-paper-plane"></i></span>Lưu
                                            </button>
                                            <div class="btn btn-danger light btn-sl-sm"><span class="me-2"><i
                                                class="fa fa-times"></i></span><a
                                            href="{{ route('route_BackEnd_Bookings_List') }}">Hủy</a>
                                    </div>
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
