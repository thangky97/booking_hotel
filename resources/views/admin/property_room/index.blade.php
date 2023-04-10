@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                <div style="font-size: 23px; font-weight: 600; color:#000 ; margin-bottom: 20px; margin-left: 2px;">Lọc
                        </div>
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <div class="table-search">
                            <div class="input-group search-area mb-xxl-0 mb-4">
                                <input type="text" class="form-control" placeholder="Tìm kiếm ">
                                <span class="input-group-text"><a href="javascript:void(0)"><i
                                            class="flaticon-381-search-2"></i></a></span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('route_BackEnd_PropertyRoom_add') }}" class="btn btn-info mb-xxl-0 mb-4"
                                style="margin-right: 30px"><i class="fa fa-bed me-2"></i>Thêm mới</a>
                        </div>
                    </div>
                    <div id="msg-box">
                        <?php //Hiển thị thông báo thành công
                        ?>
                        @if (Session::has('success'))
                            <div class="alert alert-success solid alert-dismissible fade show">
                                <span><i class="mdi mdi-check"></i></span>
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                </button>
                            </div>
                        @endif
                        <?php //Hiển thị thông báo lỗi
                        ?>
                        @if (Session::has('error'))
                            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                <span><i class="mdi mdi-help"></i></span>
                                <strong>{{ Session::get('errors') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
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
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="All">
                            <div class="table-responsive">
                                <table
                                    class="table card-table default-table display mb-4 dataTablesCard table-responsive-xl "
                                    id="guestTable-all">
                                    <thead>
                                        <tr>
                                            <th class="bg-none text-center">
                                                <div class="form-check style-1">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkAll">
                                                </div>
                                            </th>
                                            <th class="h5 text-center">STT</th>
                                            <th class="h5 text-center">Tên phòng</th>
                                            <th class="h5 text-center">Tên thuộc tính</th>
                                            <th class="h5 text-center">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listPropertyrooms as $index => $item)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td class="text-center">
                                                    <p>
                                                        @foreach ($listCategoryroom as $cate)
                                                            <?php if ($item->cate_room == $cate->id) {
                                                                echo $cate->name;
                                                            } ?>
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <p>
                                                        <?php $property_ids = explode(',', $item->properties_id); ?>
                                                        @foreach ($listProperties as $property)
                                                            @foreach ($property_ids as $inx => $pro_id)
                                                                @if ($pro_id == $property->id)
                                                                    {{ $inx > 0 ? ', ' . $property->name : $property->name }}
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('route_BackEnd_PropertyRoom_edit', $item->id) }}"><button
                                                            class="btn btn-primary">Sửa</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{$listPropertyrooms->links('paginate.index')}} 
                </div>
            </div>
        </div>
    </div>
