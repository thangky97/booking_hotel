@extends('templates.admin.layoutadmin')

@section('title', $title)

@section('css')
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card gradient-3 card-bx">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-auto text-white">
                                <h2 class="text-white">{{ $countBookingMonth }}</h2>
                                <span class="fs-18">Số đơn đặt (tháng)</span>
                            </div>
                            <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M36.25 9.66665V7.24998C36.25 5.91598 37.3327 4.83331 38.6667 4.83331C40.0007 4.83331 41.0833 5.91598 41.0833 7.24998V9.66665C46.4242 9.66665 50.75 13.9949 50.75 19.3333V43.5C50.75 48.8384 46.4242 53.1666 41.0833 53.1666C34.1741 53.1666 23.8283 53.1666 16.9167 53.1666C11.5782 53.1666 7.25 48.8384 7.25 43.5V19.3333C7.25 13.9949 11.5782 9.66665 16.9167 9.66665V7.24998C16.9167 5.91598 17.9993 4.83331 19.3333 4.83331C20.6673 4.83331 21.75 5.91598 21.75 7.24998V9.66665H36.25ZM45.9167 29H12.0833V43.5C12.0833 46.168 14.2487 48.3333 16.9167 48.3333H41.0833C43.7537 48.3333 45.9167 46.168 45.9167 43.5V29ZM33.5748 37.8329L36.9822 34.5172C37.9392 33.5868 39.469 33.6086 40.3994 34.5656C41.3298 35.5202 41.3081 37.0523 40.3535 37.9827L35.3848 42.8161C34.4955 43.6788 33.1011 43.732 32.1513 42.9393L29.4302 40.6677C28.4055 39.8146 28.2677 38.2896 29.1232 37.265C29.9763 36.2403 31.5012 36.1026 32.5259 36.9581L33.5748 37.8329ZM41.0833 14.5V16.9166C41.0833 18.2506 40.0007 19.3333 38.6667 19.3333C37.3327 19.3333 36.25 18.2506 36.25 16.9166V14.5H21.75V16.9166C21.75 18.2506 20.6673 19.3333 19.3333 19.3333C17.9993 19.3333 16.9167 18.2506 16.9167 16.9166V14.5C14.2487 14.5 12.0833 16.6629 12.0833 19.3333V24.1666H45.9167V19.3333C45.9167 16.6629 43.7537 14.5 41.0833 14.5Z"
                                      fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card gradient-4 card-bx">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-auto text-white">
                                <h2 class="text-white">{{ number_format($totalMoneyMonth) }}</h2>
                                <span class="fs-18">Doanh thu (tháng)</span>
                            </div>
                            <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M29.0611 39.4402L13.7104 52.5947C12.9941 53.2089 11.9873 53.3497 11.1271 52.9556C10.2697 52.5614 9.7226 51.7041 9.7226 50.7597C9.7226 50.7597 9.7226 26.8794 9.7226 14.5028C9.7226 9.16424 14.0517 4.83655 19.3904 4.83655H38.7289C44.0704 4.83655 48.3995 9.16424 48.3995 14.5028V50.7597C48.3995 51.7041 47.8495 52.5614 46.9922 52.9556C46.1348 53.3497 45.1252 53.2089 44.4088 52.5947L29.0611 39.4402ZM43.5656 14.5028C43.5656 11.8335 41.3996 9.66841 38.7289 9.66841C33.0207 9.66841 25.1014 9.66841 19.3904 9.66841C16.7196 9.66841 14.5565 11.8335 14.5565 14.5028V45.5056L27.4873 34.4215C28.3926 33.646 29.7266 33.646 30.6319 34.4215L43.5656 45.5056V14.5028Z"
                                      fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <section class="content booking Hotel">
                        <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                            <div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">

                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#MoneyMonth" role="tab">Doanh thu tháng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#MoneyYear" role="tab">Doanh thu năm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#BookingMonth" role="tab">Đơn trong tháng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#BookingYear" role="tab">Đơn cả năm</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <form action="{{route('route_BackEnd_Statistical_Month')}}" method="POST" style="float: right;margin: 40px 40px 0 0;">
                                    @csrf
                                    <select name="month">
                                        @for($i=1;$i<=12;$i++)
                                            @if($i==$monthToday)
                                                <option value="{{$i}}" selected="selected">Tháng {{$i}}</option>
                                            @else
                                                <option value="{{$i}}">Tháng {{$i}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    <button type="submit" style="padding-right: 5px;padding-left: 5px; background-color: #b2afaf">Gửi</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="MoneyMonth">
                                <div class="table-responsive">
                                    <div class="card">
                                        <div class="container" style="margin-bottom:10px">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="MoneyYear">
                                <div class="table-responsive">
                                    <div class="card">
                                        <div class="container" style="margin-bottom:10px">
                                            <canvas id="moneyYearChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="BookingMonth">
                                <div class="table-responsive">
                                    <div class="card">
                                        <div class="container" style="margin-bottom:10px">
                                            <canvas id="bookingChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="BookingYear">
                                <div class="table-responsive">
                                    <div class="card">
                                        <div class="container" style="margin-bottom:10px">
                                            <canvas id="bookingYearChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart = new Chart(myChart, {
            type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['1', '2', '3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
                datasets:[{
                    label:'Số tiền',
                    data:[
                            {{ $totalMoney1 }},
                            {{ $totalMoney2 }},
                            {{ $totalMoney3 }},
                            {{ $totalMoney4 }},
                            {{ $totalMoney5 }},
                            {{ $totalMoney6 }},
                            {{ $totalMoney7 }},
                            {{ $totalMoney8 }},
                            {{ $totalMoney9 }},
                            {{ $totalMoney10 }},
                            {{ $totalMoney11 }},
                            {{ $totalMoney12 }},
                            {{ $totalMoney13 }},
                            {{ $totalMoney14 }},
                            {{ $totalMoney15 }},
                            {{ $totalMoney16 }},
                            {{ $totalMoney17 }},
                            {{ $totalMoney18 }},
                            {{ $totalMoney19 }},
                            {{ $totalMoney20 }},
                            {{ $totalMoney21 }},
                            {{ $totalMoney22 }},
                            {{ $totalMoney23 }},
                            {{ $totalMoney24 }},
                            {{ $totalMoney25 }},
                            {{ $totalMoney26 }},
                            {{ $totalMoney27 }},
                            {{ $totalMoney28 }},
                            {{ $totalMoney29 }},
                            {{ $totalMoney30 }},
                            0,
                    ],
                    backgroundColor:[
                        'rgba(255, 206, 86, 0.6)',
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,
                    text:'Thông kế doanh thu tháng {{$monthToday}}',
                    fontSize:25
                },
                legend:{
                    display:true,
                    position:'right',
                    labels:{
                        fontColor:'#000'
                    }
                },
                layout:{
                    padding:{
                        left:50,
                        right:0,
                        bottom:0,
                        top:0
                    }
                },
                tooltips:{
                    enabled:true
                }
            }
        });
    </script>
    <script>
        let bookingChart = document.getElementById('bookingChart').getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let posbookingChart = new Chart(bookingChart, {
            type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['1', '2', '3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
                datasets:[{
                    label:'Số đơn',
                    data:[
                        {{ $countBooking1 }},
                        {{ $countBooking2 }},
                        {{ $countBooking3 }},
                        {{ $countBooking4 }},
                        {{ $countBooking5 }},
                        {{ $countBooking6 }},
                        {{ $countBooking7 }},
                        {{ $countBooking8 }},
                        {{ $countBooking9 }},
                        {{ $countBooking10 }},
                        {{ $countBooking11 }},
                        {{ $countBooking12 }},
                        {{ $countBooking13 }},
                        {{ $countBooking14 }},
                        {{ $countBooking15 }},
                        {{ $countBooking16 }},
                        {{ $countBooking17 }},
                        {{ $countBooking18 }},
                        {{ $countBooking19 }},
                        {{ $countBooking20 }},
                        {{ $countBooking21 }},
                        {{ $countBooking22 }},
                        {{ $countBooking23 }},
                        {{ $countBooking24 }},
                        {{ $countBooking25 }},
                        {{ $countBooking26 }},
                        {{ $countBooking27 }},
                        {{ $countBooking28 }},
                        {{ $countBooking29 }},
                        {{ $countBooking30 }},
                        0,
                    ],
                    backgroundColor:[
                        'rgba(54, 162, 235, 0.6)',
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,
                    text:'Thông kế đơn đặt tháng {{$monthToday}}',
                    fontSize:25
                },
                legend:{
                    display:true,
                    position:'right',
                    labels:{
                        fontColor:'#000'
                    }
                },
                layout:{
                    padding:{
                        left:50,
                        right:0,
                        bottom:0,
                        top:0
                    }
                },
                tooltips:{
                    enabled:true
                }
            }
        });
    </script>
    <script>
        let bookingYearChart = document.getElementById('bookingYearChart').getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let posbookingYearChart = new Chart(bookingYearChart, {
            type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['1', '2', '3','4','5','6','7','8','9','10','11','12'],
                datasets:[{
                    label:'Số đơn',
                    data:[
                        {{ $countBookingYear1 }},
                        {{ $countBookingYear2 }},
                        {{ $countBookingYear3 }},
                        {{ $countBookingYear4 }},
                        {{ $countBookingYear5 }},
                        {{ $countBookingYear6 }},
                        {{ $countBookingYear7 }},
                        {{ $countBookingYear8 }},
                        {{ $countBookingYear9 }},
                        {{ $countBookingYear10 }},
                        {{ $countBookingYear11 }},
                        {{ $countBookingYear12 }},
                        0,
                    ],
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(25, 159, 64, 0.6)',
                        'rgba(13, 102, 255, 0.6)',
                        'rgba(25, 99, 132, 0.6)',
                        'rgba(725, 192, 192, 0.6)',
                        'rgba(0, 0, 0, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,
                    text:'Thông kế đơn đặt trong năm',
                    fontSize:25
                },
                legend:{
                    display:true,
                    position:'right',
                    labels:{
                        fontColor:'#000'
                    }
                },
                layout:{
                    padding:{
                        left:50,
                        right:0,
                        bottom:0,
                        top:0
                    }
                },
                tooltips:{
                    enabled:true
                }
            }
        });
    </script>
    <script>
        let moneyYearChart = document.getElementById('moneyYearChart').getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let posmoneyYearChart = new Chart(moneyYearChart, {
            type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
                labels:['1', '2', '3','4','5','6','7','8','9','10','11','12'],
                datasets:[{
                    label:'Số tiền',
                    data:[
                        {{ $totalMoneyYear1 }},
                        {{ $totalMoneyYear2 }},
                        {{ $totalMoneyYear3 }},
                        {{ $totalMoneyYear4 }},
                        {{ $totalMoneyYear5 }},
                        {{ $totalMoneyYear6 }},
                        {{ $totalMoneyYear7 }},
                        {{ $totalMoneyYear8 }},
                        {{ $totalMoneyYear9 }},
                        {{ $totalMoneyYear10 }},
                        {{ $totalMoneyYear11 }},
                        {{ $totalMoneyYear12 }},
                        0,
                    ],
                    backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(25, 159, 64, 0.6)',
                        'rgba(13, 102, 255, 0.6)',
                        'rgba(25, 99, 132, 0.6)',
                        'rgba(725, 192, 192, 0.6)',
                        'rgba(0, 0, 0, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,
                    text:'Thông kế đơn đặt trong năm',
                    fontSize:25
                },
                legend:{
                    display:true,
                    position:'right',
                    labels:{
                        fontColor:'#000'
                    }
                },
                layout:{
                    padding:{
                        left:50,
                        right:0,
                        bottom:0,
                        top:0
                    }
                },
                tooltips:{
                    enabled:true
                }
            }
        });
    </script>
