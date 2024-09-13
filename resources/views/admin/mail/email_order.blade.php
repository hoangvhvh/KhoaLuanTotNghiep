<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <div class="container" style="background: #222; border-radius: 12px; padding :15px;">
        <div class="col-md-12">
            <p style="text-align:center; color:#FFF">Đây là email tự động khách hàng không trả lời email này.</p>
            <div class="row" style="background: #cccc00; padding: 15px;">

                <div class="col-md-6" style="text-align: center; color:#FFF; font-weight: bold; font-size: 30px;">
                    <h4 style="magrin :0">CỦA HÀNG TRÀ SỮA MILK TEAK</h4>
                    <h4 style="magrin :0">CHUYÊN BÁN CÁC LOẠI TRÀ SỮA THƠN NGON CHẤT LƯỢNG CAO</h4>
                </div>

                <div class="col-md-6 logo" style="color:#FFF;">
                    <p>Chào bạn: <strong style="color:#000; text-decoration: underline;">{{$shipping_array['customer_name']}}</strong></p>
                </div>

                <div class="col-md-12">
                    <p style="color:#fff; font-size: 17px; ">Bạn hoặc ai đó vừa đăng ký dịch vụ tại shop với thông tin như sao:</p>
                    <h4 style="color:#000; text-transform: uppercase;">Thông tin đơn hàng</h4>
                    <p>Mã đơn hàng: <strong style="text-transform:uppercase; color:#FFF">{{$code['order_code']}}</strong></p>
                    <p>Mã khuyến mãi áp dụng: <strong style="text-transform:uppercase; color:#fff">{{$code['coupon_code']}}</strong></p>
                    <p>Phí giao hàng: <strong style="text-transform:uppercase; color:#fff">{{number_format($shipping_array['free'],0,',','.')}}VND</strong></p>
                    <p>Dịch vụ: <strong style="text-transform:uppercase; color:#fff">Đặt hàng trực tuyến</strong></p>


                    <h4 style="color:#000; text-transform: uppercase;">Thông tin người nhận</h4>
                    <p>Email:
                        @if ($shipping_array['shipping_email']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_email']}}</span>
                        @endif
                    </p>
                    <p>Họ tên người gửi:
                        @if ($shipping_array['shipping_name']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_name']}}</span>
                        @endif
                    </p>
                    <p>Địa chỉ nhận hàng :
                        @if ($shipping_array['shipping_address']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_address']}}</span>,
                    @endif
                    </p>
                    <p>Số điện thoại:
                        @if ($shipping_array['shipping_phone']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_phone']}}</span>
                        @endif
                    </p>
                    <p>Ghi chú đơn hàng:
                        @if ($shipping_array['shipping_notes']=='')
                        <span style="color:#fff"> Không có</span>
                        @else
                        <span style="color:#fff">{{$shipping_array['shipping_notes']}}</span>
                        @endif
                    </p>
                    <p>Hình thức thanh toán:
                        @if ($shipping_array['shipping_method']==0)
                        <span style="color:#fff"> Chuyển khoản ATM</span>
                        @else
                        <span style="color:#fff">Tiền mặt</span>
                        @endif
                    </p>
                    <p style="color: #FFF;">Nếu thông tin người nhận hàng không có chúng tôi sẽ liên hệ với người đặt hàng để trao đổi về thông tin đơn hàng đã đặt </p>
                    <h4 style="text-transform:uppercase; color:#000">Sản phẩm đã đặt</h4>
                    <table style="width:100%" border="1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Size</th>
                                <th>giá tiền</th>
                                <th>Số lượng</th>
                                <th>Mã khuyễn mãi</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sub_total=0;
                            $total =0;
                            @endphp
                            @foreach ($cart_array as $key => $cart)
                            @php
                            $size=$cart['product_size'];
                            $km=$cart['product_price']-$cart['product_km'];
                            if($size=="Lớn")
                            {
                            $price=($km+(($km*20)/100));
                            $sub=($km+(($km*20)/100))*$cart['product_qty'];
                            }elseif($size=="Nhỏ"){
                            $price=($km-(($km*20)/100));
                            $sub=($km-(($km*20)/100))*$cart['product_qty'];
                            }else{
                            $price=$km;
                            $sub=$km*$cart['product_qty'];
                            }

                            $total += $sub;
                            @endphp
                            <tr>
                                <td>{{$cart['product_name']}}</td>
                                <td>{{$size}}</td>
                                <td>{{number_format($price,0,',','.')}}VND</td>
                                <td>{{$cart['product_qty']}}</td>
                                <td>
                                    {{$code['coupon_code']}}
                                </td>
                                <td>{{number_format($sub,0,',','.')}}VND</td>
                            </tr>

                            @endforeach

                            @if(isset($code['coupon_code']) && !empty($code['coupon_code']) && $code['coupon_code']!='Không sử dụng')
                            @if(isset($code['coupon_condition']) && !empty($code['coupon_condition']) && $code['coupon_condition'] == 1) <!-- Giảm giá theo phần trăm -->
                            <tr>
                                @php
                                $total_coupon = $total - (($total * $code['coupon_number']) / 100); // Tính tổng sau khi giảm theo %
                                $total_after = $total_coupon + $shipping_array['free']; // Cộng thêm phí ship
                                @endphp
                                <td colspan="6" align="right">
                                    <strong>
                                        Tổng thanh toán (+ phí ship): {{ number_format($total_after, 0, ',', '.') }} VND
                                        (Giảm - {{$code['coupon_number']}} %)
                                    </strong>
                                </td>
                            </tr>
                            @elseif(isset($code['coupon_condition']) && !empty($code['coupon_condition']) && $code['coupon_condition'] == 2) <!-- Giảm giá theo số tiền cố định -->
                            <tr>
                                @php
                                $total_coupon = $total - $code['coupon_number']; // Tính tổng sau khi giảm số tiền cố định
                                $total_after = $total_coupon + $shipping_array['free']; // Cộng thêm phí ship
                                @endphp
                                <td colspan="6" align="right">
                                    <strong>
                                        Tổng thanh toán (+ phí ship): {{ number_format($total_after, 0, ',', '.') }} VND
                                        (Giảm - {{ number_format($code['coupon_number'], 0, ',', '.') }} VND)
                                    </strong>
                                </td>
                            </tr>
                            @endif
                            @else <!-- Trường hợp không có mã giảm giá -->
                            <tr>
                                @php
                                $total_after = $total + $shipping_array['free']; // Tổng cộng phí ship nếu không có giảm giá
                                @endphp
                                <td colspan="6" align="right">
                                    <strong>Tổng thanh toán (+ phí ship): {{ number_format($total_after, 0, ',', '.') }} VND </strong>
                                </td>
                            </tr>
                            @endif


                        </tbody>
                    </table>
                </div>

                <p style="color:#FFF">Mọi chi tiết xin liên hệ website tại: <a target="_blank" href="http://localhost/TeaMilk/public/cli/index">shop</a>, hoặc liên hệ qua hotline:19005689, Xin cảm ơn quý khác đã đặt hàng tại shop chúng tôi.</p>
            </div>
        </div>
    </div>
</body>

</html>