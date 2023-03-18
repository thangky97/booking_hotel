@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')
<!-- row -->
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="content-body">
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
                        <div class="email-left-box px-0 mb-3">
                            <div class="p-0">
                                <a href="" class="btn btn-primary btn-block">Sửa thông tin phòng</a>
                            </div>


                        </div>
                        <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                            <div class="compose-content">
                                <form class="" action="{{route('route_BackEnd_Rooms_Update',['id'=>request()->route('id')]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>

                                        <div class="mb-3">
                                            <div>Tên Phòng<span class="text-danger">(*)</span></div>
                                            <input type="text" name="name" class="form-control bg-transparent" placeholder=" Tên phòng" value="{{$objItem->name}}">
                                        </div>

                                        <div class="mb-3">
                                            <div>Loại Phòng<span class="text-danger">(*)</span></div>
                                            <select name="cate_room" id="" class="form-control bg-transparent">
                                                @foreach ($cate_rooms as $cate)
                                                <option value="{{$cate->id}}" <?php if ($cate->id == $objItem->cate_room) : ?>selected <?php endif ?>>
                                                    {{$cate->name}}
                                                </option>
                                                @endforeach
                                                
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div>Tầng<span class="text-danger">(*)</span></div>
                                            <select name="floor" id="" class="form-control bg-transparent">
                                                <option value="1" <?php if ($objItem->cate_room == '1') echo 'selected'; ?>>Tầng 1</option>
                                                <option value="2" <?php if ($objItem->cate_room == '2') echo 'selected'; ?>>Tầng 2</option>
                                                <option value="3" <?php if ($objItem->cate_room == '3') echo 'selected'; ?>>Tầng 3</option>
                                                <option value="4" <?php if ($objItem->cate_room == '4') echo 'selected'; ?>>Tầng 4</option>
                                                <option value="5" <?php if ($objItem->cate_room == '5') echo 'selected'; ?>>Tầng 5</option>
                                                <option value="6" <?php if ($objItem->cate_room == '6') echo 'selected'; ?>>Tầng 6</option>
                                                <option value="7" <?php if ($objItem->cate_room == '7') echo 'selected'; ?>>Tầng 7</option>
                                                <option value="8" <?php if ($objItem->cate_room == '8') echo 'selected'; ?>>Tầng 8</option>
                                                <option value="9" <?php if ($objItem->cate_room == '9') echo 'selected'; ?>>Tầng 9</option>
                                                <option value="10" <?php if ($objItem->cate_room == '10') echo 'selected'; ?>>Tầng 10</option>
                                                <option value="11" <?php if ($objItem->cate_room == '11') echo 'selected'; ?>>Tầng 11</option>
                                                <option value="12" <?php if ($objItem->cate_room == '12') echo 'selected'; ?>>Tầng 12</option>
                                                <option value="13" <?php if ($objItem->cate_room == '13') echo 'selected'; ?>>Tầng 13</option>
                                                <option value="14" <?php if ($objItem->cate_room == '14') echo 'selected'; ?>>Tầng 14</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div>Người lớn<span class="text-danger">(*)</span></div>
                                            <input type="text" name="adult" class="form-control bg-transparent" placeholder=" Số lượng người lớn" value="{{$objItem->adult}}">
                                        </div>
                                        <div class="mb-3">
                                            <div>Trẻ em<span class="text-danger">(*)</span></div>
                                            <input type="text" name="childrend" class="form-control bg-transparent" placeholder=" Số lượng trẻ em" value="{{$objItem->childrend}}">
                                        </div>
                                        <div class="mb-3">
                                            <div>Số giường<span class="text-danger">(*)</span></div>
                                            <input type="text" name="bed" class="form-control bg-transparent" placeholder=" Số giường" value="{{$objItem->bed}}">
                                        </div>
                                        <div class="mb-3">
                                            <div>Trạng Thái<span class="text-danger">(*)</span></div>
                                            <select name="status" id="" class="form-control bg-transparent">
                                                <option class="text-success" value="1" <?php if ($objItem->status == '1') echo 'selected'; ?>>Có thể sử dụng</option>
                                                <option class="text-danger" value="2" <?php if ($objItem->status == '2') echo 'selected'; ?>>Đang sử dụng</option>
                                                <option class="text-warning" value="3" <?php if ($objItem->status == '3') echo 'selected'; ?>>Đang bảo trì</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div>Mô Tả<span class="text-danger">(*)</span></div>
                                            <textarea class="form-control" rows="5" id="description" name="description" placeholder=" Mô tả">{{$objItem->description}}</textarea>
                                        </div>
                                        <div>
                                            <h5 class=" mb-4"><i class="fa fa-paperclip"></i> Đính kèm File</h5>
                                            <form action="#" class="dropzone">
                                                <div class="fallback">
                                                    <input name="images" type="file" multiple value="" />
                                                </div>
                                            </form>
                                        </div>

                                        <div class="text-start mt-4 mb-3">
                                            <button class="btn btn-primary btn-submit btn-sl-sm me-2"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Cập Nhật</button>
                                            <a href="{{route('route_BackEnd_Rooms_List')}}"><button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-times"></i></span> Quay Lại</button></a>
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
</div>