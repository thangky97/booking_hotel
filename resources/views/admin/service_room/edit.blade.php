@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<style>
    .container {
        max-width: 640px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 13px;
    }

    ul.ks-cboxtags {
        list-style: none;
        padding: 20px;
    }

    ul.ks-cboxtags li {
        display: inline;
    }

    ul.ks-cboxtags li label {
        display: inline-block;
        background-color: rgba(255, 255, 255, .9);
        border: 2px solid rgba(139, 139, 139, .3);
        color: #adadad;
        border-radius: 25px;
        white-space: nowrap;
        margin: 3px 0px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        transition: all .2s;
    }

    ul.ks-cboxtags li label {
        padding: 8px 12px;
        cursor: pointer;
    }

    ul.ks-cboxtags li label::before {
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 12px;
        padding: 2px 6px 2px 2px;
        content: "\f067";
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked+label::before {
        content: "\f00c";
        transform: rotate(-360deg);
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked+label {
        border: 2px solid #1bdbf8;
        background-color: #12bbd4;
        color: #fff;
        transition: all .2s;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        display: absolute;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        position: absolute;
        opacity: 0;
    }

    ul.ks-cboxtags li input[type="checkbox"]:focus+label {
        border: 2px solid #e9a1ff;
    }
</style>
<div class="content-body">
    <div class="email-left-box px-0 mb-3">
        <div class="p-0">
            <a href="" class="btn btn-primary btn-block">Dịch vụ phòng</a>
        </div>


    </div>
    <section class="container">
        <form action="{{route('route_BackEnd_ServiceRoom_update',$service_rooms->id)}}" method="post" class="row">
            @csrf
            <h1>Thông tin dịch vụ phòng</h1>
            <div class="col-0">
                <label class="col-lg-4 col-form-label">Tên phòng
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" placeholder="Nhập tên..." value="{{$room->name}}" readonly>
                </div>
            </div>
            <label for="date" class="col-5 col-form-label">Tên dịch vụ</label>
            <div class="col-0 form-check" style="margin-left: 30px">
                <div class="container">
                    <ul class="ks-cboxtags">
                        @foreach($listServices as $index => $service)
                        <li><input type="checkbox" id="{{$service->id}}" name="service_id[]" value="{{$service->id}}" {{!empty(in_array($service->id,$idNotChecked))?'checked':''}}><label for="{{$service->id}}">{{$service->name}}</label></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="text-start mt-4 mb-3">
                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Cập nhập</button>
                <a href="{{route('route_BackEnd_ServiceRoom_list')}}" class="btn btn-danger light btn-sl-sm"><span class="me-2"><i class="fa fa-times"></i></span>Quay lại</a>
            </div>
        </form>
    </section>
</div>