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
                            <div id="msg-box">
                                <?php //Hiển thị thông báo thành công
                                ?>
                                @if (Session::has('success'))
                                    <div class="alert alert-success solid alert-dismissible fade show">
                                        <span><i class="mdi mdi-check"></i></span>
                                        <strong>{{ Session::get('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                                <?php //Hiển thị thông báo lỗi
                                ?>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                                        <span><i class="mdi mdi-help"></i></span>
                                        <strong>{{ Session::get('errors') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="btn-close">
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <div class="email-right-box ms-0 ms-sm-2 ms-sm-0">

                                <div class="compose-content">
                                    <h1>Tiêu đề: {{$contact->title}}</h1>

                                    <h4>Tên người gửi :{{$contact->name}}</h4>
                                    <h4>Số điện thoại : {{$contact->phone}}</h4>
                                    <h4>Email : {{$contact->email}}</h4>
                                    <span>

                                        Nội Dung: <br> {{$contact->content}}
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
