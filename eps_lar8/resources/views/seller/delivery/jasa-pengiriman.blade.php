<!DOCTYPE html>
<html>
@include('seller.asset.header')

<body class="skin-blue">
    <div class="wrapper">
        @include('seller.asset.topbar')
        @include('seller.asset.sidebar')
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <!-- general form elements disabled -->
                        <div class="box box-warning">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 15px" rowspan="3">
                                            <p style="font-size: xx-large; margin:5px" class="fa fa-truck"></p>
                                        </th>
                                        <td colspan="2"> <b>Jasa Kirim</b> <br> <small>Aktifkan jasa kirim yang kamu
                                                inginkan.</small> </td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">
                                            <p> <b>Jasa Kirim yang Didukung</b> <br> <small>Nikmati pelayanan jasa kirim
                                                    yang lebih cepat dan handal dengan Jasa Kirim yang Didukung. Perlu
                                                    diingat bahwa kamu membutuhkan printer untuk mencetak label
                                                    pengiriman secara otomatis.</small></p>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @foreach ($datacourier as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{ $item->name }}  <a class="fa fa-question-circle" onclick="showDescription('{{ $item->description }}')"></a> </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td style="width: 15px">
                                            <p style="font-size: xx-large; margin:5px" class="fa fa-truck"></p>
                                        </td>
                                        <td><b> Dikirim dalam </b> <br> <small>Ubah jumlah hari "Dikirim dalam" untuk
                                                semua produk yang ada di toko Anda.</small> </td>
                                        <td>
                                            action
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </section>
        </div>
    </div>
</body>
<script src="{{ asset('/js/function/seller/delivery.js') }}" type="text/javascript"></script>

@include('seller.asset.footer')

</html>
