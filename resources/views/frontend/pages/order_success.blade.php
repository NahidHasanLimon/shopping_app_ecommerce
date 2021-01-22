@extends('frontend.layouts.master')
@section('content')
<div class="container">

	<div class="row">
		<div class=" col d-flex justify-content-center">
			
		
	<div class="card">
		<div class="card-header">
			{{-- <h6>Order Completed Successfully!</h6> --}}
			{{-- @if(Session::get('order')) --}}
				{{-- {{ Session::get('order') }} --}}
				@php
					$order = Session::get('order');
				@endphp
			<h6 class="text-success">Order Completed Successfully!</h6>
				
			
		</div>
		<div class="card-body">
				<div class="">
					<table class="table">
						{{-- <thead>
							
						</thead> --}}
						<tbody>
							<tr>
								<td>Your Order ID: #</td>
								<td>kk</td>

								{{-- <td>{{ $order->id}}</td> --}}
							</tr>
							<tr>
								<td>Number of Items</td>
								{{-- <td>{{ $order->number_of_items}}</td> --}}
								
							</tr>
							<tr>
								<td>Sub Total</td>
								{{-- <td>{{ $order->sub_total}}</td> --}}
							</tr>
							<tr>
								<td>Applied Coupon Code</td>
								{{-- <td>{{ $order->coupon_code}}</td> --}}
							</tr>
							<tr>
								<td>Coupon Value</td>
								{{-- <td>{{ $order->coupon_value}}</td> --}}
							</tr>
							<tr>
								<td> Total</td>
								{{-- <td>{{ $order->total}}</td> --}}
							</tr>
							<tr>
								<td>Order Date</td>
								{{-- <td>{{$order->date}}</td> --}}
							</tr>
						</tbody>
					</table>
				</div>
				{{-- end of table div --}}
				{{-- @endif --}}
			
			
		</div>
		
	</div>
	</div>
   </div>	
	
</div>
@endsection
@section('page-level-javascript')
@endsection