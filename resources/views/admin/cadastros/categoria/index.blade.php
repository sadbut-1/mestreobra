@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            Categorias
                        </div>
                        <div class="col-sm-2">
                            <a href="#" data-toggle="modal" class="btn btn-success" data-target="#createCategoria" accesskey="c">Cadastrar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Serviço</th>
                                <th>Tipo Serviço</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->nome }}</td>
                                <td>
                                    <div id="pre-catserv{{$cat->id}}">
                                        @foreach($cat->servicos as $s)
                                                <small>
                                                    <a href="#" data-toggle="modal" data-target="#editServico" data-serv="{{ $s->id }}" data-cat="{{ $cat->id }}">
                                                        <span class="badge">{{ $s->nome }}</span>
                                                    </a>
                                                </small>
                                        @endforeach
                                    </div>
                                    <a href="javascript:void(0)" data-toggle="modal" data-id="{{ $cat->id }}" data-target="#addServico"><i class="fa fa-plus-circle"></i></a>
                                </td>
                                <td>{{ $cat->icone }}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-id="{{ $cat->id }}" data-target="#editCategoria"><i class="fa fa-edit"></i></a>&nbsp;
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

    @include('admin.cadastros.categoria._edit')
    @include('admin.cadastros.categoria._create')
    @include('admin.cadastros.categoria._add-servico')
    @include('admin.cadastros.categoria._edit-servico')
@endsection