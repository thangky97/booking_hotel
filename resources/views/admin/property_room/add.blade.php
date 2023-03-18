@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<div class="content-body">
    <div class="email-left-box px-0 mb-3">
        <div class="p-0">
            <a href="" class="btn btn-primary btn-block">Thuộc tính phòng</a>
        </div>


    </div>
    <section class="container">
        <form action="{{route('route_BackEnd_PropertyRoom_create')}}" method="post" class="row">
            @csrf
            <h1>Thông tin thuộc tính phòng</h1>
            <label for="date" class="col-5 col-form-label">Tên phòng</label>
            <div class="col-0">
                <select name="room_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected="selected" disabled>Chọn phòng</option>
                            @foreach($listRooms as $room)
                                @if(!in_array($room->id,$list))
                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                @endif
                            @endforeach
                </select>
                @error('room_id')
                <div>
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <label for="date" class="col-5 col-form-label">Chọn thuộc tính</label>
            <div class="col-0 form-check" style="margin-left: 30px">
                @foreach($listProperties as $index => $property)
                    <input class="form-check-input" type="checkbox" name="properties_id[]" value="{{$property->id}}">
                    <label class="form-check-label">{{$property->name}}</label><br>
                @endforeach
            </div>
            <input value="1" name="status" hidden>
            <div class="text-start mt-4 mb-3">
                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Thêm mới</button>
                <a href="{{route('route_BackEnd_PropertyRoom_list')}}" class="btn btn-danger light btn-sl-sm"><span class="me-2"><i class="fa fa-times"></i></span>Hủy thêm mới</a>
            </div>
        </form>
    </section>
</div>
