<table>
	<thead>
		<tr>
			<th bgcolor="red"><strong>No</strong></th>
			<th bgcolor="red"><strong>No Pesanan</strong></th>
			<th bgcolor="red"><strong>Tanggal Masuk</strong></th>
			<th bgcolor="red"><strong>Tanggal Kirm</strong></th>
			<th bgcolor="red"><strong>Customer/Toko</strong></th>
			<th bgcolor="red"><strong>Grand Total</strong></th>
		</tr>
	</thead>
	<tbody>
		@php $no=1; @endphp
		@foreach($data as $dt)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$dt->nota}}</td>
			<td>{{date('d F Y', strtotime($dt->date_of_entry))}}</td>
			<td>{{date('d F Y', strtotime($dt->date_of_send))}}</td>
			<td>{{$dt->customer_name ? $dt->customer_name : $dt->tokos_name}}</td>
			<td>Rp. {{number_format($dt->grand_total,0,',','.')}}</td>
		</tr>
			<tr>
				<th></th>
				<th bgcolor="red" align="center"><strong>No Raket</strong></th>
				<th bgcolor="red" align="center"><strong>Merk</strong></th>
				<th bgcolor="red" align="center"><strong>Jenis Raket</strong></th>
				<th bgcolor="red" align="center"><strong>Jumlah Kerusakan</strong></th>
				<th bgcolor="red" align="center"><strong>Harga</strong></th>
			</tr>
				@foreach($dt->orders as $order)
				<tr>
					<td></td>
					<td align="center">{{$order->no_raket}}</td>
					<td align="center">{{$order->merk_name}}</td>
					<td align="center">{{$order->jenis_raket}}</td>
					<td align="center">{{$order->damage_qty}}</td>
					<td align="center">Rp. {{number_format($order->price,0,',','.')}}</td>
				</tr>
				@endforeach
		@endforeach
	</tbody>
</table>