@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Categorias
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categorias</th>
                                {{--<th>Ícone</th>--}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipos as $t)
                            <tr>
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->nome }}</td>
                                <td>
                                    <div id="pre-tipo{{$t->id}}">
                                        @foreach($t->categorias as $c)
                                            <a href="#" data-toggle="modal" data-target="#editTipoCategoria" data-cat="{{ $c->id }}" data-tipo="{{ $t->id }}">
                                                <span class="badge">{{ $c->nome }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                        <a href="#" data-toggle="modal" data-id="{{ $t->id }}" data-target="#addTipoCategoria"><i class="fa fa-plus-circle"></i></a>
                                </td>
                                {{--<td>{{ $t->icone }}</td>--}}
                                <td>
                                    <a href="#" data-toggle="modal" data-id="{{ $t->id }}" data-target="#editTipoServico"><i class="fa fa-edit"></i></a>&nbsp;
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <a href="#" data-toggle="modal" class="btn btn-success" data-target="#createCategoria">Cadastrar</a>
                </div>
            </div>
        </div>

    </div>

    @include('admin.cadastros.tipo-servico._create')
    @include('admin.cadastros.tipo-servico._edit')
    @include('admin.cadastros.tipo-servico._add-categoria')
    @include('admin.cadastros.tipo-servico._edit-categoria')
@endsection