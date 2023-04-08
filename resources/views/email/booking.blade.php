<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        i {
            font-size: 12px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">Đơn đặt phòng</h2>
    <i>Khách hàng :{{$user->name}}</i><br>
    <i style="text-align:right;">Số điện thoại :{{$user->phone}}</i><br>
    <i>Email :{{$user->email}}</i><br>
    <i>Địa chỉ :{{$user->address}}</i>

    <div>

        <h5> <i class="far fa-calendar-minus scale3 me-3"></i>Thời gian sử dụng: {{$format = date("d/m/Y",strtotime($booking->checkin_date))}} - {{$format = date("d/m/Y",strtotime($booking->checkout_date))}}</h5>
    </div>
    <table>
        <thead>
            <tr>
                <th>Room</th>
                <th>Kind of Room</th>
                <th>Service</th>
                <th>Service Charge</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($room_service as $room_sv)
            @foreach($listRooms as $room)
            @if($room_sv->room_id==$room->id)
            @foreach($listCaterooms as $cateRoom)
            @if($room->cate_room==$cateRoom->id)

            <tr>
                <td style="color: black;"> <b>{{$room->name}}</b></td>
                <td><b>{{$cateRoom->name}}</b><br><i style="color: #006600;">({{number_format($cateRoom->price)}}đ)</i></td>
                <td style="color: #0099FF;">
                    <?php $s_r = explode(',', $room_sv->service_id); ?>
                    @foreach ($service as $ser)
                    @foreach($s_r as $inx => $sr_id)
                    @if($sr_id==$ser->id)
                    -{{trim(($inx>0?', '.$ser->name:$ser->name), ',')}}

                    <?php echo '<br>' ?>
                    @endif
                    @endforeach
                    @endforeach
                </td>
                <td style="color: #006600;">

                    <?php
                    $money = 0;
                    $ser_room_id = $room_sv->service_id;
                    $s_r = explode(',', $ser_room_id);
                    ?>
                    @foreach ($service as $ser)
                    @foreach($s_r as $inx => $sr_id)
                    <?php if ($sr_id == $ser->id)
                        $money += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                    ?>
                    @endforeach
                    @endforeach
                    <b>
                        {{number_format($money)}}đ
                    </b>

                </td>
                <td style="color: #FF0000;">
                    <?php
                    $money = 0;
                    $ser_room_id = $room_sv->service_id;
                    $s_r = explode(',', $ser_room_id);
                    ?>
                    @foreach ($service as $ser)
                    @foreach($s_r as $inx => $sr_id)
                    <?php if ($sr_id == $ser->id)
                        $money += array_sum(explode(',', $inx > 0 ? ',' . $ser->price : $ser->price));
                    ?>
                    @endforeach
                    @endforeach
                    <i><b>{{number_format(($cateRoom->price)*$use_date+$money)}}đ</b></i>
                </td>
            </tr>
            @endif
            @endforeach
            @endif
            @endforeach
            @endforeach
        </tbody>
    </table>
    <div style="text-align:center;">
        <div class="me-10 mb-sm-0 mb-3">
            <h3 class="mb-2">Tổng thanh toán</h3>
            <hr style="width:10%;">
            <h3 class="mb-0 card-title" style="color: blue;"><b><var>{{number_format($total_money_room_service)}}đ</var></b></h3>
        </div>
    </div>

    <div style="margin-top: 30px;text-align: center;">
        <span><i style="font-weight: bold;color:orangered;">Hotel 12Zodiac</i> - Nhóm dự án FPOLY</span>
    </div>

</body>

</html>