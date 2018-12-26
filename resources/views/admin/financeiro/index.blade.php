@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Prestadores com cobranças inativas
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><span class="very-small">#</span></th>
                                <th><span class="very-small">Nome</span></th>
                                <th><span class="very-small">Data cadastro</span></th>
                                <th><span class="very-small"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestadores as $p)
                                <tr>
                                    <td><span class="very-small">{{ $p->id }}</span></td>
                                    <td><span class="very-small">{{ $p->nome }}</span></td>
                                    <td><span class="very-small">{{ date('d-m-Y',strtotime($p->created_at)) }}</span></td>
                                    <td><span class="very-small">
                                            <a href="{{ url('/admin/prestador/ativa-cobranca', $p->id) }}"> Ativar</a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $prestadores->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection