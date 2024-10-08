@extends('client/layout_cli')
@section('content')
<div class="page-head_agile_info_w3l">

</div>
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="{{route('cli_index')}}">Home</a>
					<i>|</i>
				</li>
				<li>@lang('lang.payment')</li>
			</ul>
		</div>
	</div>
</div>
<div class="baopay">
	<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 mar">
		@lang('lang.payment')
	</h3>

	<div class="bao">

		<div class="bao_checkout">
			<div class="checkout-title">
				<p>@lang('lang.order_info')</p>
			</div>
			<div class="table-responsive bang1">

				<table class="timetable_sub">
					<tbody>
						<?php $total = 0;
						$i = 1;

						?>
						@if(session('cart'))
						@foreach(session('cart') as $id => $details)
						<?php
						$si = $details['size'];
						$km = $details['price'] - $details['price_pro'];
						if ($si == "Lớn") {
							$sub = ($km + (($km * 20) / 100)) * $details['quantity'];
						} elseif ($si == "Nhỏ") {
							$sub = ($km - (($km * 20) / 100)) * $details['quantity'];
						} else {
							$sub = $km * $details['quantity'];
						}
						$tien = $sub;
						$total += $tien;
						?>

						<tr class="rem1">
							<td class="invert1">{{$i++}}</td>
							<td class="invert-image in2" style="width: 100px;">
								<a href="">
									<img src="{!!asset('images/'.$details['image'])!!}" alt=" " width="100px" class="img-responsive">
								</a>
							</td>
							<td data-th="Quantity" class="in3">

								<div class="quantity-select">
									<input style="color:white;" type="number" class="quantity" disabled="true" value="{{$details['quantity']}}">
								</div>

							</td>
							<td class="invert4" style="text-transform: uppercase;">{{ $details['name'] }}</td>
							<td class="invert5">{{ number_format($tien,0,',','.') }} VNĐ</td>

						</tr>
						@endforeach
						@endif
					</tbody>

				</table>
				<div class="tinhtien">
					<div class="thanh_tien">
						<span class="tien" style="font-weight: bold;">@lang('lang.provisional'):</span><span class="tt">{{number_format($total,0,',','.')}} VNĐ</span>
					</div>
					<hr>
					@if(Session::get('coupon'))
					@foreach(Session::get('coupon') as $key => $cou)
					@if($cou['coupon_condition']==1)
					<div class="giamgia">
						<span class="magiamgia" style="font-weight: bold;">MÃ GIẢM GIÁ : </span>-{{$cou['coupon_number']}} % @if(Session('coupon'))
					</div>
					@endif
					<p>
						@php
						$total_coupon = ($total*$cou['coupon_number'])/100;
						@endphp
					</p>
					<p>
						@php
						$total_after_coupon = $total-$total_coupon;
						@endphp
					</p>

					@elseif($cou['coupon_condition']==2)
					<span class="giam2" style="font-weight: bold;">GIẢM GIÁ :</span> -{{number_format($cou['coupon_number'],0,',','.')}} VNĐ
					@if(Session::get('coupon'))

					@endif
					<p>
						<hr>
						@php
						$total_coupon = $total - $cou['coupon_number'];
						@endphp
					</p>
					@php
					$total_after_coupon = $total_coupon;
					@endphp
					@endif
					@endforeach
					@endif


					<div class="phi">
						@if(Session::get('fee'))
						<span class="phivanchuyen" style="font-weight: bold;">@lang('lang.fee_shipping') (<span style="color:red;font-weight: lighter;">@lang('lang.fee')</span>)</span> <span class="tt">
							<?php
							if ($total > 200000) {
								echo '0 VNĐ';
							} else {
								echo '+' . number_format(Session::get('fee'), 0, ',', '.') . ' VNĐ';
							}
							?>
						</span>
						<?php $total_after_fee = $total + Session::get('fee'); ?>

						@endif
					</div>
					<div class="baotong" style="margin-top: 25px;">
						<span class="tongtien1" style="font-weight: bold;">@lang('lang.total'):</span>
						<span class="tt">
							@php
							if(Session::get('fee') && !Session::get('coupon')){
							$total_after = $total_after_fee;
							if($total>200000){
							$total_after=$total_after_fee-Session::get('fee');
							}else{
							$total_after=$total_after_fee;
							}
							echo number_format($total_after,0,',','.').'VNĐ';

							}elseif(Session::get('fee') && Session::get('coupon')){

							$total_after = $total_after_coupon+Session::get('fee');
							if($total>200000){
							$total_after=$total_after-Session::get('fee');
							}

							echo number_format($total_after,0,',','.').' '.'VNĐ';

							}elseif(!Session::get('fee') && !Session::get('coupon')){
							$total_after = $total;
							echo number_format($total_after,0,',','.').' '.'VNĐ';
							}

							@endphp
						</span>
					</div>
				</div>
				<div class="coupon">
					@if(Session::get('cart'))
					<div class="giamgiatien border-top" style="font-weight: bold;">
						<p>@lang('lang.dis_code')</p>
						<form method="POST" action="{{url('/check-coupon')}}" class="nhapma">
							@csrf

							<input type="text" class="form-control coup" name="coupon" placeholder="@lang('lang.dis_code')">
							<input type="submit" class="btn btn-default check_coupon giam" name="check_coupon" value="Tính mã giảm giá">

						</form>
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="bao-bang">
			<div class="checkout-title">
				<p>@lang('lang.add_info')</p>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">@lang('lang.cus_info')</h4>
					<form action="{{URL::to('/confirm-order1')}}" method="post" id="pay-form" class="creditly-card-form agileinfo_form">
						@csrf
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="form-control shipping_name" type="text" name="shipping_name" placeholder="@lang('lang.cus_name')" required="">
									</div>

									<div class="w3_agileits_card_number_grid_left form-group">
										<div class="controls">
											<input type="email" class="form-control shipping_email" placeholder="@lang('lang.E_cus')" name="shipping_email" required="">
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right form-group">
										<div class="controls">
											<input type="text" class="form-control shipping_phone" placeholder="@lang('lang.num')" name="shipping_phone" required="required">
											<span id="status"></span>
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_left form-group1">
										<div class="controls1">
											<input type="text" class="form-control shipping_address" placeholder="@lang('lang.add')" name="shipping_address" required="">
										</div>

										<div class="controls2">
											<select class="form-control shipping_address1" placeholder="Phường" name="shipping_address1">
												<option value="Phường Phú Thuận">Phường Phú Thuận</option>
												<option value="Phường Phú Bình">Phường Phú Bình</option>
												<option value="Phường Phú Hậu">Phường Phú Hậu</option>
												<option value="Phường Phú Hiệp">Phường Phú Hiệp</option>
												<option value="Phường Phú Hòa">Phường Phú Hòa</option>
												<option value="Phường Phú Hội">Phường Phú Hội</option>
												<option value="Phường Phú Nhuận">Phường Phú Nhuận</option>
												<option value="Phường Phú Cát">Phường Phú Cát</option>
												<option value="Phường Tây Lộc">Phường Tây Lộc</option>
												<option value="Phường Thuận Hòa">Phường Thuận Hòa</option>
												<option value="Phường Thuận Lộc">Phường Thuận Lộc</option>
												<option value="Phường Vĩnh Ninh">Phường Vĩnh Ninh</option>
												<option value="Phường An Cựu">Phường An Cựu</option>
												<option value="Phường An Đông">Phường An Đông</option>
												<option value="Phường An Hòa">Phường An Hòa</option>
												<option value="Phường Hương Long">Phường Hương Long</option>
												<option value="Phường Hương Sơ">Phường Hương Sơ</option>
												<option value="Phường Thủy Biều">Phường Thủy Biều</option>
												<option value="Phường Thủy Xuân">Phường Thủy Xuân</option>
												<option value="Phường Xuân Phú">Phường Xuân Phú</option>
												<option value="Phường Kim Long">Phường Kim Long</option>
												<option value="Phường Phường Đúc">Phường Phường Đúc</option>
											</select>
										</div>


									</div>
									<div class="w3_agileits_card_number_grid_left form-group">
										<div class="controls">
											<textarea type="text" class="form-control shipping_notes" placeholder="@lang('lang.note')" name="shipping_notes" required=""></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">@lang('lang.pick')</label>
										<select name="payment_select" id="inputName" class="form-control input-sm m-bot15 payment_select">
											<option value="1">Tiền mặt</option>
											<option value="0">Qua chuyển khoản</option>
										</select>
									</div>
									@if(Session::get('fee'))
									<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
									@else
									<input type="hidden" name="order_fee" class="order_fee" value="15000">
									@endif

									@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
									<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
									@endforeach
									@else
									<input type="hidden" name="order_coupon" class="order_coupon" value="no">
									@endif


								</div>
								@php
								$vnd_to_usd=$total_after/23083;
								@endphp
								<div style="display: none;margin-left:108px" id="paypal-button" class="pay"></div>
								<input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">


								<?php
								if (session('cart')) { ?>
									<input type="submit" value="@lang('lang.order_con')" name="send_order" class="btn btn-info btn-sm order text-white bg-dark">
								<?php } else { ?>
									<input type="submit" value="KHÔNG CÓ SẢN PHẨM ĐỂ THANH TOÁN" name="send_order" disabled class="btn btn-danger btn-sm order text-white">
								<?php } ?>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>



@stop



@section('payment')
<script>
	var usd = document.getElementById("vnd_to_usd").value;

	paypal.Button.render({
		// Configure environment
		env: 'sandbox',
		client: {
			sandbox: 'AX5Gjcv8GTCDC9QxZGDF9AB2Fzo-vLTEuGmiyqJm5JuaC8Mhl_5oFhE9yFHw-UsGuV5X4m6NbILGAsOf',
			production: 'demo_production_client_id'
		},
		// Customize button (optional)
		locale: 'en_US',
		style: {
			size: 'large',
			color: 'gold',
			shape: 'pill',
		},

		// Enable Pay Now checkout flow (optional)
		commit: true,

		// Set up a payment
		payment: function(data, actions) {
			return actions.payment.create({
				transactions: [{
					amount: {
						total: `${usd}`,
						currency: 'USD'
					}
				}]
			});
		},
		// Execute the payment
		onAuthorize: function(data, actions) {
			return actions.payment.execute().then(function() {
				// Show a confirmation message to the buyer
				// window.alert('Thanh toán thành công!');
				var shipping_email = $('.shipping_email').val();
				var shipping_name = $('.shipping_name').val();
				var shipping_address = $('.shipping_address').val();
				var shipping_phone = $('.shipping_phone').val();
				var shipping_notes = $('.shipping_notes').val();
				var shipping_method = $('.payment_select').val();
				var shipping_address1 = $('.shipping_address1').val();
				var order_fee = $('.order_fee').val();
				var order_coupon = $('.order_coupon').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: '{{url('/confirm-order')}}',
					method: 'POST',
					data: {
						shipping_email: shipping_email,
						shipping_name: shipping_name,
						shipping_address: shipping_address,
						shipping_phone: shipping_phone,
						shipping_address1: shipping_address1,
						shipping_notes: shipping_notes,
						_token: _token,
						order_fee: order_fee,
						order_coupon: order_coupon,
						shipping_method: shipping_method
					},
					success: function(data) {
						alert('thanh toán thành công');
						window.location = '{{url('/thankyou')}}';
					}

				});

			});

		}

	}, '#paypal-button');
</script>

@endsection