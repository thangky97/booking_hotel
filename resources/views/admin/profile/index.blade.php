@extends('templates.admin.layoutadmin')
@section('title', $title)
@section('css')
@endsection
@section('content')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="{{ asset($user->avatar) ? '' . Storage::url($user->avatar) : $user->name }}"
                                        class="img-fluid rounded-circle" alt="">
                                </div>

                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ $user->name }}</h4>
                                        <p>
                                            @if ($user->role === 1)
                                                <span class="badge light badge-success">Admin</span>
                                            @else
                                                <span class="badge light badge-success">Nhân viên</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ $user->email }}</h4>
                                        <p>Email</p>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown"
                                            aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24">
                                                    </rect>
                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                    </circle>
                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                    </circle>
                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                    </circle>
                                                </g>
                                            </svg></a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i>
                                                View profile</li>
                                            <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to
                                                btn-close friends</li>
                                            <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to
                                                group</li>
                                            <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                                class="nav-link active show">Tài khoản của bạn</a>
                                        </li>
                                    </ul>
                                    <div id="msg-box" class="mt-3">
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
                                    </div>
                                    <div class="tab-content">
                                        <div id="profile-settings" class="tab-pane fade active show">
                                            <div class="pt-5">
                                                <div class="settings-form">
                                                    <form
                                                        action="{{ route('route_BackEnd_Profile_Update', ['id' => request()->route('id')]) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row ">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Tên</label>
                                                                <span class="text-danger">*</span>
                                                                <input type="text" name="name"
                                                                    placeholder="Nhập tên..." class="form-control"
                                                                    value="{{ $user->name }}">
                                                                @error('name')
                                                                    <div>
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Số điện thoại</label>
                                                                <span class="text-danger">*</span>
                                                                <input type="text" name="phone"
                                                                    placeholder="Nhập số điện thoại..."
                                                                    class="form-control" value="{{ $user->phone }}">
                                                                @error('phone')
                                                                    <div>
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Email</label>
                                                                <span class="text-danger">*</span>
                                                                <input type="email" placeholder="Nhập email..." name="email"
                                                                    class="form-control" value="{{ $user->email }}">
                                                                @error('email')
                                                                    <div>
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Mật khẩu</label>
                                                                <span class="text-danger">*</span>
                                                                <input type="password" placeholder="Nhập mật khẩu..."
                                                                    name="password" class="form-control"
                                                                    value="{{ $user->password }}">
                                                                @error('password')
                                                                    <div>
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label mb-3">Ảnh
                                                                </label>
                                                                <input type="file" name="images"
                                                                    class="form-file-input form-control">
                                                                @if (isset($user) && $user->avatar)
                                                                    <img src="{{ asset($user->avatar ? '' . Storage::url($user->avatar) : $user->name) }}"
                                                                        alt="{{ $user->name }}" width="100">
                                                                @endif
                                                                @error('images')
                                                                    <div>
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <select class="default-select wide form-control"
                                                                    style="background: #f3f3f3" id="validationCustom07"
                                                                    name="role" disabled>
                                                                    {{-- <option data-display="Chọn quyền" value="" style="background: #f3f3f3">Chọn
                                                                        quyền</option> --}}
                                                                    <option name="role" value="1"
                                                                        style="background: #f3f3f3"
                                                                        {{ isset($user) && $user->role === 1 ? 'selected' : '' }}>
                                                                        Admin</option>
                                                                    <option name="role" value="2"
                                                                        style="background: #f3f3f3"
                                                                        {{ isset($user) && $user->role === 2 ? 'selected' : '' }}>
                                                                        Nhân viên</option>
                                                                    {{-- <option name="role" value="0" {{(isset($admin) && $admin->role === 0) ? 'selected' : ''}}>Người dùng</option> --}}
                                                                </select>
                                                                @error('role')
                                                                    <div>
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Lưu</button>
                                                        <a class="btn btn-info"
                                                            href="{{ route('route_BackEnd_Dashboard') }}">Hủy</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                {{-- <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">btn-close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
