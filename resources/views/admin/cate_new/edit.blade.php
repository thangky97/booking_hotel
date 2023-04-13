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
                                    <a href="" class="btn btn-primary btn-block">Sửa danh mục tin tức</a>
                                </div>
                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">
                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_Category_News_Detail', $id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên danh mục tin
                                                tức<span class="text-danger">*</span></label>
                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ old('name', $editCateNews->name) }}">
                                                @error('name')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status"
                                                        value="1"
                                                        {{ isset($editCateNews) && $editCateNews->status === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Kích
                                                        hoạt</label>
                                                </div>
                                                <input class="form-check-input" type="radio" name="status" value="2"
                                                    {{ isset($editCateNews) && $editCateNews->status === 2 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">Khóa</label>
                                                @error('status')
                                                    <div>
                                                        <p class="text-danger">{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="text-start mt-4 mb-3">

                                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span
                                                        class="me-2"><i class="fa fa-paper-plane"></i></span>Lưu</button>
                                                <button class="btn btn-danger light btn-sl-sm" type="button"><span
                                                        class="me-2"><i class="fa fa-times"></i></span><a
                                                        href="{{ route('route_BackEnd_Category_News_List') }}">Hủy</a></button>
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
