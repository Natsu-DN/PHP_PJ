@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>Loại Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
								<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$loai_sp->name}} </h4>
							<h6>(Số Lượng hiện có: {{count($sp_theoloai)}})</h6>
							<!-- <div class="beta-products-details">
								<p class="pull-left">{{count($sp_theoloai)}}</p>
								<div class="clearfix"></div>
							</div> -->

							<div class="row">
								@foreach($sp_theoloai as $sptl)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sptl->id)}}"><img src="source/image/product/{{$sptl->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sptl->name}}</p>
											<p class="single-item-price">
											@if($sptl->promotion_price !=0)
												<!-- <span>{{$sptl->unit_price}}</span> -->
												<span class="flash-del">{{number_format($sptl->unit_price)}} VNĐ</span>
												<span class="flash-sale">{{number_format($sptl->promotion_price)}} VNĐ</span>
											@else
											<span>{{number_format($sptl->unit_price)}} VNĐ</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptl->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sptl->id)}}">Xem Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div  class="row">{{$sp_theoloai->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection