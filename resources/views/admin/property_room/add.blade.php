@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <div class="content-body">
        <section class="container">
            <form action="{{route('route_BackEnd_PropertyRoom_create')}}" method="post" class="row">
                @csrf
                <h1>Thông tin thuộc tính phòng</h1>
                <label for="date" class="col-5 col-form-label">Tên phòng</label>
                <div class="col-0">
                    <select name="room_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected="selected" disabled>Chọn phòng</option>
                        @foreach($listRooms as $room)
                            <option value="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                    @error('room_id')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <label for="date" class="col-5 col-form-label">Tên thuộc tính</label>
                <div class="col-0">
                    <select name="properties_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected="selected" disabled>Chọn thuộc tính</option>
                        @foreach($listProperties as $property)
                            <option value="{{$property->id}}">{{$property->name}}</option>
                        @endforeach
                    </select>
                    @error('properties_id')
                    <div><p class="text-danger">{{ $message }}</p></div>
                    @enderror
                </div>
                <input value="1" name="status" hidden>
                <div style="display: flex">
                    <a><button type="submit" class="btn btn-primary">Thêm mới</button></a>
                    <a href="{{route('route_BackEnd_PropertyRoom_list')}}" style="margin-left: 10px"><button class="btn btn-danger">Hủy thêm mới</button></a>
                </div>
            </form>
        </section>
    </div>
