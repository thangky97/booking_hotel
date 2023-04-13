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
                                    <a href="" class="btn btn-primary btn-block">Sửa thuộc tính</a>
                                </div>
                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">
                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_properties_Detail', $id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên thuộc
                                                tính<span class="text-danger"> *</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ old('name', $editProperties->name) }}">
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
                                                    class="form-control"
                                                    value="{{ old('description', $editProperties->description) }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng thái<span
                                                    class="text-danger"> *</span></label>
                                            <div class="form-check">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1"
                                                        {{ isset($editProperties) && $editProperties->status === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Kích
                                                        hoạt</label>
                                                </div>
                                                <input class="form-check-input" type="radio" name="status" value="2"
                                                    {{ isset($editProperties) && $editProperties->status === 2 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Khóa</label>
                                                @error('status')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="">Ảnh
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-12">
                                                    <div class="form-file">
                                                        <input type="file" name="image"
                                                            class="form-file-input form-control" style="margin-bottom: 6px">
                                                        @if (isset($editProperties) && $editProperties->image)
                                                            <img src="{{ asset($editProperties->image ? '' . Storage::url($editProperties->image) : '') }}"
                                                                alt="banner" width="100">
                                                        @endif
                                                        {{-- @error('image')
                                                            <div class="mt-1">
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </div>
                                                        @enderror --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-start mt-4 mb-3">
                                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                        class="me-2"><i class="fa fa-paper-plane"></i></span>Lưu</button>
                                                <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                        class="me-2"><i class="fa fa-times"></i></span><a
                                                        href="{{ route('route_BackEnd_properties_List') }}">Hủy</a></button>
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
