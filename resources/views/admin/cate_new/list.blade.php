@extends('templates.admin.layoutadmin')

@section('css')
@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                        <div class="table-search">
                            <div class="input-group search-area mb-xxl-0 mb-4">
                                <input type="text" class="form-control" placeholder="Tìm kiếm">
                                <span class="input-group-text"><a href="javascript:void(0)"><i
                                            class="flaticon-381-search-2"></i></a></span>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('route_BackEnd_Category_News_Add') }}" class="btn btn-info mb-xxl-0 mb-4" style="margin-right: 30px"><i
                                    class="bi bi-newspaper"></i> Thêm mới</a>
                        </div>

                    </div>

                    {{--  thong bao  --}}
                    <section class="content booking Hotel">
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
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        </div>
                        {{-- @if (count($list) <= 0)
                                <p class="alert alert-warning">
                                    Không có dữ liệu phù hợp
                                </p>
                            @endif --}}

                        {{--  end thong bao  --}}

                        <div class="tab-content">
                            <div class="tab-pane active show" id="All">
                                <div class="table-responsive">
                                    <table
                                        class="table card-table  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
                                        id="guestTable-all">
                                        <thead>
                                            <tr>
                                                <th class="bg-none">
                                                    <div class="form-check style-1">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkAll">
                                                    </div>
                                                </th>
                                                <th>ID</th>
                                                <th class="text-center">Tên danh mục</th>
                                                <th class="text-center">Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category_new as $index => $c)
                                                <tr>
                                                    <td>
                                                        <div class="form-check style-1">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="text-primary">{{ $index + 1 }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">

                                                            <span>{{ $c->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($c->status === 1)
                                                            <span class="badge light badge-success">Kích hoạt</span>
                                                        @else
                                                            <span class="badge light badge-danger">Khóa</span>
                                                        @endif
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="{{ route('route_BackEnd_Category_News_Detail', $c->id) }}"
                                                            style="margin-left: 10px"><button
                                                                class="btn btn-primary">Sửa</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="text-center">
        {{ $category_new->links() }}
    </div>
    <index-cs ref="index_cs"></index-cs>
    </section>

@endsection
