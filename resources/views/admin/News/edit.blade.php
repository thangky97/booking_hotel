@extends('templates/admin.layoutadmin')
{{--  @section('title', $title)  --}}
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
                                <a href="" class="btn btn-primary btn-block">Sửa Tin Tức</a>
                            </div>

                        </div>
                        <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                            <div class="compose-content">
                                <form action="{{ route('route_BackEnd_News_Detail', ['id' => request()->route('id')]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="col-md-3 col-sm-4 control-label">Tên Phòng<span
                                                class="text-danger">(*)</span></label>

                                        <div class="col-md-9 col-sm-8">
                                            <input type="text" name="name" id="name" class="form-control"
                                            value="{{old('name',  $editNews->name)}}">
                                            <span id="mes_sdt"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-3 col-sm-4 control-label">Miêu tả<span
                                                class="text-danger">(*)</span></label>

                                        <div class="col-md-9 col-sm-8">
                                            <input type="text" name="description" id="description" class="form-control" value="{{old('description',  $editNews->description)}}">
                                            <span id="mes_sdt"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-3 col-sm-4 control-label">Tiêu đề<span
                                                class="text-danger">(*)</span></label>

                                        <div class="col-md-9 col-sm-8">
                                            <input type="text" name="title" id="title" class="form-control" value="{{old('title',  $editNews->title)}}">
                                            <span id="mes_sdt"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-3 col-sm-4 control-label">Ngày<span
                                                class="text-danger">(*)</span></label>

                                        <div class="col-md-9 col-sm-8">
                                            <input type="date" name="date" id="date" class="form-control"
                                            value="{{old('date',  $editNews->date)}}">
                                            <span id="mes_sdt"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-3 col-sm-4 control-label">Cate_id<span class="text-danger">(*)</span></label>
                                        <div class="col-md-9 col-sm-8">
                                            <select name="cate_id" id="">
                                                @foreach($cate_id as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span class="text-danger">(*)</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value = "2" {{(isset($editNews) && $editNews->status === 2) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="flexRadioDefault1" >Khoa</label>
                                            <div>
                                                <input class="form-check-input" type="radio" name="status" value = "1" {{(isset($editNews) && $editNews->status === 1) ? 'checked' : ''}}>
                                                <label class="form-check-label" for="flexRadioDefault2">Kich hoat</label>
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <h5 class="mb-4"><i class="fa fa-paperclip"></i> Đính kèm File</h5>
                                            <div class="fallback">
                                                <input name="images" type="file"/>
                                                @if (isset($editNews) && $editNews->images)
                                                            <img src="{{ asset($editNews->images ? '' . Storage::url($editNews->images) : $editNews->images) }}" alt="{{$editNews->images }}"
                                                                width="100">
                                                        @endif
                                            </div>
                                    </div>

                                    <div class="text-start mt-4 mb-3">

                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i
                                            class="fa fa-paper-plane"></i></span>Cập Nhật</button>
                                                <button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i
                                                            class="fa fa-times"></i></span><a
                                                        href="{{ route('route_BackEnd_News_List') }}">Quay Lại</a></button>
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

