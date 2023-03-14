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
                <label for="date" class="col-5 col-form-label">Tên phòng</label>
                <div class="col-0">
                    <select name="room_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach($listRooms as $room)
                            @if($property_rooms->room_id==$room->id)
                                <option selected="selected" value="{{$property_rooms->room_id}}">{{$room->name}}</option>
                            @else
                                <option value="{{$room->id}}">{{$room->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <label for="date" class="col-5 col-form-label">Tên thuộc tính</label>
                <div class="col-0">
                    <select name="properties_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        @foreach($listProperties as $property)
                            @if($property_rooms->properties_id==$property->id)
                                <option selected="selected" value="{{$property_rooms->properties_id}}">{{$property->name}}</option>
                            @else
                                <option value="{{$property->id}}">{{$property->name}}</option>
                            @endif
                        @endforeach
                    </select>
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
