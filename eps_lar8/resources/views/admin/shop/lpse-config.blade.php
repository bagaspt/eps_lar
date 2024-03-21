<!DOCTYPE html>
<html>
@include('admin.asset.header')

<body class="skin-blue">
    <div class="wrapper">

        {{-- Navbar --}}
        @include('admin.asset.navbar')


        {{-- sidebar --}}
        @include('admin.asset.sidebar')

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            {{-- section-info --}}
            @include('admin.asset.section-info')

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body" id="formula-price">
                                <h4>Formulasi Harga</h4>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">List Toko</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Join Date</th>
                                                <th>T.O.P</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                            @foreach ($datashop as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <button 
                                                            class="btn 
                                @if ($item->type === 'silver') btn-secondary 
                                @elseif($item->type === 'gold') 
                                    btn-warning 
                                @elseif($item->type === 'platinum') 
                                    btn-info 
                                @elseif($item->type === 'trusted_seller') 
                                    btn-success @endif">
                                                            {{ ucfirst($item->type) }}
                                                        </button>
                                                    </td>
                                                    <td>{{ $item->created_date }}</td>
                                                    <td>
                                                        <a class="is_top @if ($item->is_top == 1) glyphicon glyphicon-ok-sign @else glyphicon glyphicon-remove-sign @endif"
                                                            style="font-size: 20px;" data-shop-id="{{ $item->id }}"
                                                            data-is-top="{{ $item->is_top }}">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick="detailDocument('{{ $item->id }}')"
                                                            class="glyphicon glyphicon-folder-open"></a>
                                                        <span style="margin-right: 10px;"></span>

                                                        <a onclick="detailProduct('{{ $item->id }}')"
                                                            class="glyphicon glyphicon-th-list"></a>
                                                        <span style="margin-right: 10px;"></span>

                                                        <a onclick="reviewToko('{{ $item->id }}')"
                                                            class="glyphicon glyphicon-log-in"></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Join Date</th>
                                                <th>T.O.P</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        {{-- section-footer --}}
        @include('admin.asset.section-footer')
    </div><!-- ./wrapper -->
</body>
{{-- footer --}}
@include('admin.asset.footer')

<!-- page script -->
<script src="{{ asset('/js/function/admin/shop.js') }}" type="text/javascript"></script>

</html>
