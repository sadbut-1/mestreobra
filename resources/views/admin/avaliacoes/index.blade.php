@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Avaliações
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Pedido ID</th>
                                <th>Prestador</th>
                                <th>Estrelas</th>
                                <th>Comentário</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($avaliacoes as $a)
                                <tr>
                                    <td>{{ $a->pedido_id }}</td>
                                    <td>{{ $a->pedido->prestador[0]->nome }}</td>
                                    <td>{{ $a->estrelas }}</td>
                                    <td>{{ $a->comentario }}</td>
                                    <td>{{ $a->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection