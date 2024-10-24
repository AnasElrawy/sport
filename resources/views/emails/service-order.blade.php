<?php
$shipping_details = "";
$totalAmt = 0;
$paidAmt = 0;
$dueAmt = 0;
// if ($order != null) {
// 	$shipping_details .= ($order->full_name ?? '') . '<br>';
// 	$shipping_details .= ($order->email ?? '') . '<br>';
// 	$shipping_details .= ($order->phone_no ?? '') . '<br>';
// 	$shipping_details .= ($order->street_address ?? '') . ', ' . ($order->street_number ?? '') . ', ' . ($order->city ?? '') . ',' . '<br>';
// }
?>
@component('mail::message')

	<h3>Order No: {{$order->id}} </a>
	<h3>Order Date: {{$order->booking_date}}</h3>
		
<!-- <table cellspacing="0" cellpadding="5">
	<tbody>
		<tr valign="top">
			<td>Order No: {{$order->id}}</td>
			<td>Order Date:<br> {{$order->booking_date}}</td>
		</tr>
		<tr valign="top">
			<td><b>Shipping address</b>: {!!$shipping_details!!}</td>
		</tr>
	</tbody>
</table> -->
<table border="1" cellspacing="0" cellpadding="5">
	<thead>
		<tr>
			<th>SL</th>
			<th>Booking No</th>
			<th>Item</th>
			<th>Date & Time</th>
			<th>Price</th>
			<th>Paid</th>
			<th>Due</th>
			</tr>
	</thead>
	<tbody>
		@foreach ($order->order_details as $key => $details)
		<?php
		$totalAmt=$totalAmt+$details->service_amount;
		$paidAmt=$paidAmt+$details->paid_amount;
		$dueAmt=$dueAmt+$details->due;
		?>
		<tr>
			<td>{{$key + 1}}</td>
			<td>{{$details->id}}</td>
			<td>{{$details->service}}</td>
			<td>{{$details->date .' '. $details->start_time.' to '.$details->end_time }}</td>
			<td>{{$details->service_amount }}</td>
			<td>{{$details->paid_amount }}</td>
			<td>{{$details->due }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div style="width: 100;float: right;">
	<b style="float:right;">Total Amount: {{round($totalAmt,2)}}</b><br>
	<b style="float:right;">Discount: {{round($order->coupon_discount,2)}}</b><br>
	<b style="float:right;">Payable Amount: {{round($totalAmt-$order->coupon_discount,2)}}</b><br>
	<b style="float:right;">Paid Amount: {{round($paidAmt,2)}}</b><br>
	<b style="float:right;">Due Amount: {{ round($totalAmt - $order->coupon_discount - (-$paidAmt), 2) }}</b>
</div>
@endcomponent