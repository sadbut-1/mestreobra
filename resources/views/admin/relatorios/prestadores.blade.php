@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Relatório de Prestadores
                </div>
                <div class="card-body">
                    <p>Prestadores ativos: {{ $ativos }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><span class="very-small">#</span></th>
                                <th><span class="very-small">Cadastro</span></th>
                                <th><span class="very-small">Nome</span></th>
                                <th><span class="very-small">Acessos</span></th>
                                <th><span class="very-small">Orçamentos</span></th>
                                <th><span class="very-small">Interesses</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestadores as $p)
                                @if($p->ativo == 1)
                                    <tr>
                                        <td><span class="very-small">{{ $p->id }}</span></td>
                                        <td><span class="very-small">{{ date('d/m/Y',  strtotime($p->created_at)) }}</span></td>
                                        <td><span class="very-small">{{ $p->nome }}</span></td>
                                        <td><span class="very-small">@if(isset($p->usuario)){{ count($p->usuario->acessos) }}@endif</span></td>
                                        <td><span class="very-small">{{ count($p->orcamentos_recebidos) }}</span></td>
                                        <td><span class="very-small">{{ count($p->interesses) }}</span></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection