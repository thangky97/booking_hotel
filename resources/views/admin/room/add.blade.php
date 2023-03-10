@extends('templates/admin.layoutadmin')
@section('title', $title)
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
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
                                <a href="" class="btn btn-primary btn-block">Thêm mới phòng</a>
                            </div>


                        </div>
                        <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                            <div class="compose-content">

                                <form class="" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>

                                        <div class="mb-3">
                                            <div>Tên Phòng<span class="text-danger">(*)</span></div>
                                            <input type="text" name="name" class="form-control bg-transparent" placeholder=" Tên phòng" value="@isset($request['name']){{ $request['name'] }}@endisset">
                                        </div>

                                        <div class="mb-3">
                                            <div>Loại Phòng<span class="text-danger">(*)</span></div>
                                            <select name="cate_room" id="" class="form-control bg-transparent">
                                                <option value="1" selected>Single Bed</option>
                                                <option value="2">Double Bed</option>
                                                <option value="3">Queen Bed</option>
                                                <option value="4">King Bed</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div>Tầng<span class="text-danger">(*)</span></div>
                                            <select name="floor" id="" class="form-control bg-transparent">
                                                <option value="1" selected>Tầng 1</option>
                                                <option value="2">Tầng 2</option>
                                                <option value="3">Tầng 3</option>
                                                <option value="4">Tầng 4</option>
                                                <option value="5">Tầng 5</option>
                                                <option value="6">Tầng 6</option>
                                                <option value="7">Tầng 7</option>
                                                <option value="8">Tầng 8</option>
                                                <option value="9">Tầng 9</option>
                                                <option value="10">Tầng 10</option>
                                                <option value="11">Tầng 11</option>
                                                <option value="12">Tầng 12</option>
                                                <option value="13">Tầng 13</option>
                                                <option value="14">Tầng 14</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div>Người lớn<span class="text-danger">(*)</span></div>
                                            <input type="text" name="adult" class="form-control bg-transparent" placeholder=" Số lượng người lớn" value="@isset($request['adult']){{ $request['adult'] }}@endisset">
                                        </div>
                                        <div class="mb-3">
                                            <div>Trẻ em<span class="text-danger">(*)</span></div>
                                            <input type="text" name="childrend" class="form-control bg-transparent" placeholder=" Số lượng trẻ em" value="@isset($request['childrend']){{ $request['childrend'] }}@endisset">
                                        </div>
                                        <div class="mb-3">
                                            <div>Số giường<span class="text-danger">(*)</span></div>
                                            <input type="text" name="bed" class="form-control bg-transparent" placeholder=" Số giường" value="@isset($request['bed']){{ $request['bed'] }}@endisset">
                                        </div>
                                        <div class="mb-3">
                                            <div>Trạng Thái<span class="text-danger">(*)</span></div>
                                            <select name="status" id="" class="form-control bg-transparent">
                                                <option class="text-success" value="1" selected>Có thể sử dụng</option>
                                                <option class="text-danger" value="2">Đang sử dụng</option>
                                                <option class="text-warning" value="3">Đang bảo trì</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div>Mô Tả<span class="text-danger">(*)</span></div>
                                            <textarea class="form-control" rows="5" id="description" name="description" placeholder=" Mô tả" value="@isset($request['description']){{ $request['description'] }}@endisset""></textarea>
                                        </div>
                                        <div>
                                            <h5 class=" mb-4"><i class="fa fa-paperclip"></i> Đính kèm File</h5>
                                            <form action="#" class="dropzone">
                                                <div class="fallback">
                                                    <input name="images" type="file" multiple value="@isset($request['images']){{ $request['images'] }}@endisset" />
                                                </div>
                                            </form>
                                        </div>

                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-submit btn-sl-sm me-2" ><span class="me-2"><i class="fa fa-paper-plane"></i></span>Thêm mới</button>
                                        <a href="{{route('route_BackEnd_Rooms_List')}}"><button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-times"></i></span> Quay Lại</button></a>
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
@endsection
