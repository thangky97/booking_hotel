@extends('templates..admin.layoutadmin')

@section('title', $title)

@section('css')
@endsection

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="email-left-box px-0 mb-3">
                                <div class="p-0">
                                    <a href="" class="btn btn-primary btn-block">Sửa liên hệ</a>
                                </div>
                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">
                                <div class="compose-content">
                                    <form
                                        action="{{ route('route_BackEnd_News_Detail', ['id' => request()->route('id')]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên bài viết<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ old('name', $editNews->name) }}">
                                                @error('name')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Mô tả<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="description" id="description"
                                                    class="form-control"
                                                    value="{{ old('description', $editNews->description) }}">
                                                @error('description')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tiêu đề<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="{{ old('title', $editNews->title) }}">
                                                @error('title')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Ngày đăng<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="date" name="date" id="date" class="form-control"
                                                    value="{{ old('date', $editNews->date) }}">
                                                @error('date')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Người đăng<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <select name="admin_id" id="" class="form-control">
                                                    @foreach ($admin_id as $a)
                                                        <option value="{{ $a->id }}"
                                                            {{ isset($admin) && $admin->admin_id === $a->id ? 'selected' : '' }}>
                                                            {{ $a->name }}</option>
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
                                            <label for="" class="col-md-3 col-sm-4 control-label">Danh mục bài
                                                viết<span class="text-danger">*</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <select name="cate_id" id="" class="form-control">
                                                    @foreach ($cate_id as $c)
                                                        <option value="{{ $c->id }}"
                                                            {{ isset($editNews) && $editNews->cate_id === $c->id ? 'selected' : '' }}>
                                                            {{ $c->name }}</option>
                                                    @endforeach
                                                    @error('cate_id')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng thái <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1"
                                                        {{ isset($editNews) && $editNews->status === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Kích
                                                        hoạt</label>
                                                </div>
                                                <input class="form-check-input" type="radio" name="status" value="2"
                                                    {{ isset($editNews) && $editNews->status === 2 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Khóa</label>
                                                @error('status')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="">Ảnh bài viết
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="form-group" style="width: 76%">
                                                    <div class="form-file">
                                                        <input type="file" name="images"
                                                            class="form-file-input form-control">
                                                        @if (isset($editNews) && $editNews->images)
                                                            <img src="{{ asset($editNews->images ? '' . Storage::url($editNews->images) : $editNews->name) }}"
                                                                alt="{{ $editNews->name }}" width="100">
                                                        @endif
                                                    </div>
                                                    @error('images')
                                                        <div>
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-start mt-4 mb-3">

                                            <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                    class="me-2"><i class="fa fa-paper-plane"></i></span>Lưu</button>
                                            <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                    class="me-2"><i class="fa fa-times"></i></span><a
                                                    href="{{ route('route_BackEnd_News_List') }}">Quay
                                                    Lại</a></button>
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
