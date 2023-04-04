<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vnpay;
use Illuminate\Http\Request;


class paymentController extends Controller
{
    //
    public function thanks(){
        if (isset($_GET['vnp_Amount'])){

            $vnpay = new Vnpay();
            $vnpay->create([

                'vnp_Amount' => $_GET['vnp_Amount'],
                'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
                'vnp_CardType' => $_GET['vnp_CardType'],
                'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
                'vnp_PayDate' => $_GET['vnp_PayDate'],
                'vnp_TmnCode' => $_GET['vnp_TmnCode'],
                'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
                'vnp_TxnRef' => $_GET['vnp_TxnRef'],
                'vnp_SecureHash' => $_GET['vnp_SecureHash'],
                'vnp_BankCode' => $_GET['vnp_BankCode'],
                'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
                'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
            ]);

        }
        if ($_GET['vnp_TransactionStatus'] === '00' && $_GET['vnp_ResponseCode'] === '00') {
            Booking::where('id',$_GET['vnp_TxnRef'])->update(['status_pay'=>'1']);
        }
        return view('thanks');
    }
    public function vnpay_payment(Request $request)
    {

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/thanks";
        $vnp_TmnCode = "DYVH2BH3";//Mã website tại VNPAY
        $vnp_HashSecret = "MFYXATKEMHKQTTLCIWKKLKPDTQXRFOIF"; //Chuỗi bí mật

        $vnp_TxnRef = $request->booking_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán booking";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->price * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
//        $vnp_ExpireDate = $_POST['txtexpire'];
//Billing
//        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
//        $vnp_Bill_Email = $_POST['txt_billing_email'];
//        $fullName = trim($_POST['txt_billing_fullname']);
//        if (isset($fullName) && trim($fullName) != '') {
//            $name = explode(' ', $fullName);
//            $vnp_Bill_FirstName = array_shift($name);
//            $vnp_Bill_LastName = array_pop($name);
//        }
//        $vnp_Bill_Address = $_POST['txt_inv_addr1'];
//        $vnp_Bill_City = $_POST['txt_bill_city'];
//        $vnp_Bill_Country = $_POST['txt_bill_country'];
//        $vnp_Bill_State = $_POST['txt_bill_state'];
//// Invoice
//        $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
//        $vnp_Inv_Email = $_POST['txt_inv_email'];
//        $vnp_Inv_Customer = $_POST['txt_inv_customer'];
//        $vnp_Inv_Address = $_POST['txt_inv_addr1'];
//        $vnp_Inv_Company = $_POST['txt_inv_company'];
//        $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
//        $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,


        );
//
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
//        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
//            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
//        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&'.urlencode($key)."=".urlencode($value);
            } else {
                $hashdata .= urlencode($key)."=".urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key)."=".urlencode($value).'&';
        }

        $vnp_Url = $vnp_Url."?".$query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
        ,
            'message' => 'success'
        ,
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: '.$vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

}
