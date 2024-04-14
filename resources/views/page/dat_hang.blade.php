@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt Hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang Chủ</a> / <span>Checkout</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">

		@if(Session::has('thongbao'))
			<div class="alert alert-success">
				{{Session::get('thongbao')}}
			</div>
		@endif
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_first_name">Họ Tên*</label>
							<input type="text" id="name" name="full_name" required>
						</div>

                        <div class="form-block">
							<label for="your_first_name">Giới Tính*</label>
                            <input type="radio" name="gender" value="Nam" checked="checked" style="width:10%"><span style="padding-right:20%">Nam</span>
                            <input type="radio" name="gender" value="Nữ" checked="checked" style="width:10%"><span>Nữ</span>

						</div>

						<div class="form-block">
							<label for="adress">Địa Chỉ*</label>
							<input type="text" id="address" name="address" value="" required>
						</div>

                        <div class="form-block">
							<label for="adress">Email*</label>
							<input type="email" name="email" value="" required>
						</div>

						<div class="form-block">
							<label for="phone">Điện Thoại*</label>
							<input type="text" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi Chú</label>
							<textarea name="notes" required></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn Hàng Của Bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
                                        @if(Session::has('cart'))
                                        @foreach($product_cart as $cart)
									<!--  one item	 -->
										<div class="media">
											<img width="35%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												<span class="color-gray your-order-info">Số Lượng: {{$cart['qty']}}</span>
												<span class="color-gray your-order-info">Đơn Giá: @if($cart['item']['promotion_price']==0)
                                                                        {{number_format($cart['item']['unit_price'])}}
                                                                    @else {{number_format($cart['item']['promotion_price'])}} @endif VNĐ</span>
											</div> 
										</div>
									<!-- end one item -->
                                    @endforeach
                                    @endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@php
											$totalPrice = 0;
											if(Session::has('cart')) {
												foreach(Session('cart')->items as $item) {
													$price = $item['qty'] * ($item['item']['promotion_price'] == 0 ? $item['item']['unit_price'] : $item['item']['promotion_price']);
													$totalPrice += $price;
												}
											}
											echo number_format($totalPrice) . ' VNĐ';
										@endphp</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán trực tiếp </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
                                            Giao hàng rồi thanh toán trực tiếp cho nhân viên
                                    </div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản ngân hàng </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
                                            Chủ tài khoản
                                            </br>STk
                                            
                                    </div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button class="beta-btn primary" href="#">Checkout <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection