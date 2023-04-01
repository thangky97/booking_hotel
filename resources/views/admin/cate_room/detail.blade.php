@extends('templates/admin.layoutadmin')
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
                                    <a href="" class="btn btn-primary btn-block">Sửa Loại Phòng</a>
                                </div>

                            </div>
                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                <div class="compose-content">
                                    <form action="{{ route('route_BackEnd_Categoryrooms_Detail', $id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("put")
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Tên Phòng<span
                                                        class="text-danger">(*)</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="name" id="name" class="form-control"
                                                       value="{{old('name',  $editCate->name)}}">
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-3 col-sm-4 control-label">Giá Phòng<span
                                                        class="text-danger">(*)</span></label>

                                            <div class="col-md-9 col-sm-8">
                                                <input type="text" name="price" id="price" class="form-control" value="{{old('price',  $editCate->price)}}">
                                                <span id="mes_sdt"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-4 control-label">Trạng Thái <span class="text-danger">(*)</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" value = "2" {{(isset($editCate) && $editCate->status === 2) ? 'checked' : ''}}>
                                                <label class="form-check-label" for="flexRadioDefault1" >Khóa</label>
                                                <div>
                                                    <input class="form-check-input" type="radio" name="status" value = "1" {{(isset($editCate) && $editCate->status === 1) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="flexRadioDefault2">Kích hoạt</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5 class="mb-4"><i class="fa fa-paperclip"></i>Ảnh đại diện</h5>

                                                <div class="fallback">
                                                    <input type="file"  name="image"/>
                                                </div>
                                                {{--                                            <form action="{{ route('route_BackEnd_Categoryrooms_DeleteImg',$id)}}" method="post">--}}
                                                {{--                                                <button class="btn text-danger">X</button>--}}
                                                {{--                                                @csrf--}}
                                                {{--                                                @method('delete')--}}
                                                {{--                                            </form>--}}
                                                <img src="{{ asset(url("image/".$editCate->image)) }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                                <br>

                                            </div>
                                            <div class="form-group">
                                                <h5 class="mb-4"><i class="fa fa-paperclip"></i> Ảnh liên quan</h5>

                                                <div class="fallback">
                                                    <input type="file" multiple name="images[]"/>
                                                </div>

                                            </div>



                                            <div class="text-start mt-4 mb-3">

                                                <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i
                                                                class="fa fa-paper-plane"></i></span>Cập Nhật</button>
                                                <button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i
                                                                class="fa fa-times"></i></span><a
                                                            href="{{ route('route_BackEnd_Categoryrooms_List') }}">Quay Lại</a></button>
                                            </div>
                                        </div>
                                    </form>

                                    @if (count($editCate->gallery)>0)
                                        <p>Cac anh lien quan:</p>
                                        @foreach ($editCate->gallery as $img)
                                            <form action="{{ route('route_BackEnd_Categoryrooms_DeleteImgs',$img->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn text-danger">X</button>

                                            </form>
                                            <img src="{{ asset(url("images/".$img->images)) }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>