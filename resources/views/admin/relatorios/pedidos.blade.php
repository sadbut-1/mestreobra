@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('admin/relatorio/pedidos/graficos') }}"><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp; Gráficos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a href="{{ url('admin/relatorio/pedidos/usuarios') }}"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Clientes</a>
                </div>
                <div class="card-body">
                    <div id="linechart_material"></div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            google.charts.load('current', {'packages':['line']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                $.ajax({
                    url: '/admin/relatorio/pedidosAjax',
                    success: function (pedidos) {
                        var rows = pedidos;
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Mês');
                        data.addColumn('number', 'Pedidos');
                        // data.addColumn('number', 'The Avengers');
                        // data.addColumn('number', 'Transformers: Age of Extinction');

                        data.addRows([
                            [rows[1].mes,  rows[1].pedido],
                            [rows[2].mes,  rows[2].pedido],
                            [rows[3].mes,  rows[3].pedido],
                            [rows[4].mes,  rows[4].pedido],
                            [rows[5].mes,  rows[5].pedido],
                            [rows[6].mes,  rows[6].pedido]
                        ]);

                        var options = {
                            chart: {
                                title: 'Número de pedidos dos ultimos 6 meses',
                                // subtitle: 'in millions of dollars (USD)'
                            },
                            width: 900,
                            height: 500
                        };

                        var chart = new google.charts.Line(document.getElementById('linechart_material'));

                        chart.draw(data, google.charts.Line.convertOptions(options));
                    }
                })

            }
        </script>
    @endsection

@endsection