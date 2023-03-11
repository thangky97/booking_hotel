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
                                                class="nav-link active show">Cài đặt</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="profile-settings" class="tab-pane fade active show">
                                            <div class="pt-5">
                                                <div class="settings-form">
                                                    <form action="{{ route('route_BackEnd_Profile_Update', ['id' => request()->route('id')]) }}"
														method="post" enctype="multipart/form-data">
                                                        <div class="row ">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Tên</label>
                                                                <input type="text" name="name" placeholder="1234 Main St"
                                                                    class="form-control" value="{{ $user->name }}">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Số điện thoại</label>
                                                                <input type="text" name="phone"
                                                                    placeholder="Apartment, studio, or floor"
                                                                    class="form-control" value="{{ $user->phone }}">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" placeholder="Email" name="email"
                                                                    class="form-control" value="{{ $user->email }}">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Mật khẩu</label>
                                                                <input type="password" placeholder="Password" name="password"
                                                                    class="form-control" value="{{ $user->password }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label mb-3">Ảnh
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="file" name="images"
                                                                    class="form-file-input form-control">
                                                                @if (isset($user) && $user->avatar)
                                                                    <img src="{{ asset($user->avatar ? '' . Storage::url($user->avatar) : $user->name) }}"
                                                                        alt="{{ $user->name }}" width="100">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Cập nhật</button>
														<a class="btn btn-info" href="{{ route('route_BackEnd_Dashboard') }}">Hủy</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
