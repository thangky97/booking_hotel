@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <section class="container">
            <form action="{{route('route_BackEnd_PropertyRoom_update',$property_rooms->id)}}" method="post" class="row">
                @csrf
                <h1>Thông tin thuộc tính phòng</h1>
                <div class="col-0">
                    <label class="col-lg-4 col-form-label">Tên phòng
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text"  class="form-control"
                               placeholder="Nhập tên..." value="{{$room->name}}" readonly>
                    </div>
                </div>
                <label for="date" class="col-5 col-form-label">Tên thuộc tính</label>
                <div class="col-0 form-check" style="margin-left: 30px">
                    @foreach($listProperties as $index => $property)
                        <input class="form-check-input" type="checkbox" name="properties_id[]" value="{{$property->id}}" {{!empty(in_array($property->id,$idNotChecked))?'checked':''}}>
                        <label class="form-check-label">{{$property->name}}</label><br>
                    @endforeach
                </div>
                <div class="text-start mt-4 mb-3">
                    <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i
                                class="fa fa-paper-plane"></i></span>Cập nhập</button>
                    <a href="{{route('route_BackEnd_PropertyRoom_list')}}" class="btn btn-danger light btn-sl-sm"><span class="me-2"><i
                                class="fa fa-times"></i></span>Quay lại</a>
                </div>
            </form>
        </section>
    </div>
