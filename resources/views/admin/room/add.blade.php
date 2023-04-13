@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="msg-box">
                                <?php //Hiển thị thông báo thành công
                                ?>
                                @if (Session::has('success'))
                                    <div class="alert alert-success solid alert-dismissible fade show">
                                        <span><i class="mdi mdi-check"></i></span>
                                        <strong>{{ Session::get('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                                <?php //Hiển thị thông báo lỗi
                                ?>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                        <span><i class="mdi mdi-help"></i></span>
                                        <strong>{{ Session::get('errors') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                            </div>
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
                                                <div>Tên phòng<span class="text-danger"> *</span></div>
                                                <input type="text" name="name" class="form-control bg-transparent"
                                                    placeholder=" Tên phòng"
                                                    value="@isset($request['name']){{ $request['name'] }}@endisset">
                                                @error('name')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div>Loại phòng<span class="text-danger"> *</span></div>
                                                <select name="cate_room" id="" class="form-control bg-transparent">
                                                    @foreach ($cate_rooms as $cate)
                                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                    @endforeach
                                                    @error('cate_room')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <div>Tầng<span class="text-danger"> *</span></div>
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
                                                    @error('floor')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <div>Người lớn<span class="text-danger"> *</span></div>
                                                <input type="text" name="adult" class="form-control bg-transparent"
                                                    placeholder=" Số lượng người lớn"
                                                    value="@isset($request['adult']){{ $request['adult'] }}@endisset">
                                                @error('adult')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div>Trẻ em<span class="text-danger"> *</span></div>
                                                <input type="text" name="childrend" class="form-control bg-transparent"
                                                    placeholder=" Số lượng trẻ em"
                                                    value="@isset($request['childrend']){{ $request['childrend'] }}@endisset">
                                                @error('childrend')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div>Số giường<span class="text-danger"> *</span></div>
                                                <input type="text" name="bed" class="form-control bg-transparent"
                                                    placeholder=" Số giường"
                                                    value="@isset($request['bed']){{ $request['bed'] }}@endisset">
                                                @error('bed')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div>Trạng thái<span class="text-danger"> *</span></div>
                                                <select name="status" id="" class="form-control bg-transparent">
                                                    <option class="text-success" value="1" selected>Có thể sử dụng
                                                    </option>
                                                    <option class="text-danger" value="2">Đang sử dụng</option>
                                                    <option class="text-warning" value="3">Đang bảo trì</option>
                                                    @error('status')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </select>
                                            </div>
                                            <div>
                                                <h5 class=" mb-4">Ảnh</h5>
                                                <form action="#" class="dropzone">
                                                    <div class="fallback">
                                                        <input name="images" type="file" multiple
                                                            value="@isset($request['images']){{ $request['images'] }}@endisset" />
                                                        @error('images')
                                                            <div>
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="text-start mt-4 mb-3">
                                                <button class="btn btn-primary btn-submit btn-sl-sm me-2"><span
                                                        class="me-2"><i class="fa fa-paper-plane"></i></span>Thêm
                                                    mới</button>
                                                <a href="{{ route('route_BackEnd_Rooms_List') }}"><button
                                                        class="btn btn-danger light btn-sl-sm" type="button"><span
                                                            class="me-2"><i class="fa fa-times"></i></span>Hủy</button></a>
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
@endsection
