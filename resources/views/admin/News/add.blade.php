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
                            <div class="email-left-box px-0 mb-3">
                                <div class="p-0">
                                    <a href="" class="btn btn-primary btn-block">Thêm mới bài viết</a>
                                </div>
                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">
                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_News_saveAdd') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên bài viết<span
                                                    class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Nhập tên...">
                                                @error('name')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Mô tả</label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="description" id="description"
                                                    class="form-control" placeholder="Nhập mô tả...">
                                                @error('description')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tiêu đề<span
                                                    class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="title" id="title" class="form-control"
                                                    placeholder="Nhập tiêu đề">
                                                @error('title')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Người đăng<span
                                                    class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <select name="admin_id" id="admin_id" value=""
                                                    class="wide form-control">
                                                    <option value="">Người đăng</option>
                                                    @foreach ($admin as $a)
                                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                                    @endforeach
                                                    @error('admin_id')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Ngày đăng</label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="date" name="date" id="date" class="form-control"
                                                    placeholder="ngày">
                                                @error('date')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Danh mục bài
                                                viết<span class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <select name="cate_id" id="cate_id" value=""
                                                    class="wide form-control">
                                                    <option value="">Danh mục bài viết</option>
                                                    @foreach ($category_new as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endforeach
                                                    @error('cate_id')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng thái <span
                                                    class="text-danger"> *</span></label>
                                            <div class="form-check">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1">
                                                    <label class="form-check-label" for="flexRadioDefault2">Kích
                                                        hoạt</label>
                                                </div>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="2">
                                                    <label class="form-check-label" for="flexRadioDefault1">Khóa</label>
                                                </div>
                                                @error('status')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5 class="mb-4">Ảnh bài viết</h5>
                                            <div class="fallback">
                                                <input name="images" type="file" />
                                                @error('images')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-start mt-4 mb-3">
                                            <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                    class="me-2"><i class="fa fa-paper-plane"></i></span>Thêm
                                                mới</button>
                                            <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                    class="me-2"><i class="fa fa-times"></i></span><a
                                                    href="{{ route('route_BackEnd_News_List') }}">Hủy</a></button>
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
    <!-- Main content -->
@endsection
