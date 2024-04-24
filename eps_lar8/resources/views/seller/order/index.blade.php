<!DOCTYPE html>
<html>
@include('seller.asset.header')

<body class="skin-blue">
    <div class="wrapper">

        @include('seller.asset.topbar')
        @include('seller.asset.sidebar')

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <section class="content">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="filter-links">
                                    <a href="{{ route('seller.order') }}">Semua</a>
                                    <a href="javascript:;" data-status-order="waiting_accept_order"
                                        onclick="toggleFilterorder(this)">Perlu Dikemas</a>
                                    <a href="javascript:;" data-status-order="on_packing_process"
                                        onclick="toggleFilterorder(this)">Perlu Dikirim</a>
                                    <a href="javascript:;" data-status-order="send_by_seller"
                                        onclick="toggleFilterorder(this)">Dikirim</a>
                                    <a href="javascript:;" data-status-order="complete"
                                        onclick="toggleFilterorder(this)">Pesanan Diterima</a>
                                    <a href="javascript:;" data-status-order="done"
                                        onclick="toggleFilterorder(this)">Selesai</a>
                                    <a href="javascript:;" data-status-order="cancel_by_seller"
                                        onclick="toggleFilterorder(this)">Dibatalkan</a>
                                    {{-- <a href="javascript:;" data-status-order="refund" onclick="toggleFilterorder(this)">Pengembalian</a> --}}
                                </div>

                                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th class="detail-full">Tanggal Pesan</th>
                                            <th class="detail-full">Instansi</th>
                                            <th class="detail-full">Kota Tujuan</th>
                                            <th class="detail-full">Nilai</th>
                                            <th class="detail-full">Qty</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td><a href="javascript:;"
                                                        onclick="viewOrderDetail('{{ $order->invoice }}', '{{ $order->created_date }}', '{{ $order->member_instansi }}', '{{ $order->city }}', '{{ $order->total }}', '{{ $order->qty }}')">{{ $order->invoice }}-{{ $order->id }}</a>
                                                </td>
                                                <td class="detail-full">
                                                    {{ date('Y-m-d', strtotime($order->created_date)) }}</td>
                                                <td class="detail-full">{{ $order->member_instansi }}</td>
                                                <td class="detail-full">{{ $order->city }}</td>
                                                <td class="detail-full">Rp.
                                                    {{ str_replace(',', '.', number_format($order->total)) }} </td>
                                                <td class="detail-full">{{ $order->qty }}</td>

                                                <td>
                                                    @if ($order->status == 'send_by_seller')
                                                        <span style="width:100%" class="badge btn-primary">Dalam
                                                            pengiriman</span>
                                                    @elseif ($order->status == 'complete')
                                                        <span style="width:100%" class="badge  btn-warning">Barang
                                                            Diterima</span>
                                                    @elseif ($order->status == 'waiting_accept_order')
                                                        <span style="width:100%" class="badge  btn-info">Pesanan
                                                            Baru</span>
                                                    @elseif ($order->status == 'complete' && $order->status_pembayaran_top == 1)
                                                        <span style="width:100%" class="badge  btn-success">Pesanan
                                                            Selesai</span>
                                                    @elseif ($order->status == 'on_packing_process')
                                                        <span style="width:100%; background-color:purple;"
                                                            class="badge">Pesanan Diproses</span>
                                                    @else
                                                        <span style="width:100%" class="badge  btn-danger">Pesanan
                                                            Dibatalkan</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="javascript:;" class="fa fa-eye" onclick="viewDetail(this)"
                                                        data-id-order={{ $order->id }}>Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Invoice</th>
                                            <th class="detail-full">Tanggal Pesan</th>
                                            <th class="detail-full">Instansi</th>
                                            <th class="detail-full">Kota Tujuan</th>
                                            <th class="detail-full">Nilai</th>
                                            <th class="detail-full">Qty</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </section>
        </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
</body>
{{-- footer --}}
@include('seller.asset.footer')

<!-- page script -->
<script src="{{ asset('/js/function/seller/order.js') }}" type="text/javascript"></script>

</html>
