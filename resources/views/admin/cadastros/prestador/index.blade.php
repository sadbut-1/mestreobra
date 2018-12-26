@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="row" style="padding: 20px 0px 0px 30px">
                        <div class="col-sm-6">
                            <form class="form-inline" method="POST" action="/admin/prestador/busca">
                                <input type="text" name="nome" class="form-control" placeholder="Prestador">
                                <button type="submit" class="btn btn-success" style="margin-top: -10px;">Buscar</button>
                            </form>
                            <form class="form-inline" method="POST" action="/admin/prestador/buscaCategoria">
                                <input type="text" name="nome" class="form-control" placeholder="Categoria">
                                <button type="submit" class="btn btn-success" style="margin-top: -10px;">Buscar</button>
                            </form>
                        </div>
                        <div class="col-md-2 col-sm-offset-4">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newPrestador">
                                Novo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#ativo" aria-controls="home" role="tab" data-toggle="tab">Ativos</a></li>
                        <li role="presentation"><a href="#inativo" aria-controls="profile" role="tab" data-toggle="tab">Inativos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="ativo">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Imagem</small></th>
                                    <th><small>Nome</small></th>
                                    <th><small>Profissional</small></th>
                                    <th><small>Categorias</small></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prestadores as $prestador)
                                    @if($prestador->ativo > 0)
                                        <tr>
                                            <td>{{ $prestador->id }}</td>
                                            <td><img src="{{ Storage::disk('public')->url($prestador->foto) }}" width="50px"></td>
                                            <td><small>{{ $prestador->nome }}</small></td>
                                            <td><small>
                                                    @if($prestador->tipos)
                                                        @foreach($prestador->tipos as $tipo)
                                                            <div id="pre-tipo{{$prestador->id}}">
                                                                <a href="#" data-toggle="modal" data-target="#editTipoServico" data-tipo="{{ $tipo->id }}" data-pres="{{ $prestador->id }}">
                                                                    <span class="badge">{{ $tipo->nome }}</span>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    <a href="#" data-toggle="modal" data-id="{{ $prestador->id }}" data-target="#addTipoServico"><i class="fa fa-plus-circle"></i></a>
                                                </small></td>
                                            <td>
                                                @foreach($prestador->categorias as $pc)
                                                    <div id="pre-cat{{$prestador->id}}">
                                                        <small>
                                                            <a href="#" data-toggle="modal" data-target="#editCategory" data-cat="{{ $pc->id }}" data-pres="{{ $prestador->id }}">
                                                                <span class="badge">{{ $pc->nome }}</span>
                                                            </a>
                                                        </small>
                                                    </div>
                                                @endforeach
                                                    <a href="#" data-toggle="modal" data-id="{{ $prestador->id }}" data-target="#addCategory"><i class="fa fa-plus-circle"></i></a>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-id="{{ $prestador->id }}" data-target="#editPrestador"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                <a href="{{ url('admin/prestador/delete',$prestador->id) }}"><i class="fa fa-trash text-danger"></i> </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {{ $prestadores->render() }}
                        </div>
                        <div role="tabpanel" class="tab-pane" id="inativo">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><small>#</small></th>
                                    <th><small>Imagem</small></th>
                                    <th><small>Nome</small></th>
                                    <th><small>Assinatura</small></th>
                                    <th><small>Categorias</small></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prestadores as $prestador)
                                    @if($prestador->ativo <= 0)
                                        <tr>
                                            <td>{{ $prestador->id }}</td>
                                            <td><img src="{{ Storage::disk('public')->url($prestador->foto) }}" width="50px"></td>
                                            <td>{{ $prestador->nome }}</td>
                                            <td>{{ $prestador->assinatura }}</td>
                                            <td>
                                                @foreach($prestador->categorias as $pc)
                                                    <a href="#" data-toggle="modal" data-target="#newService" data-id="{{ $pc->id }}">
                                                        <span class="badge">{{ $pc->nome }}</span>
                                                    </a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-id="{{ $prestador->id }}" data-target="#editPrestador"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                <a href="{{ url('admin/prestador/reactive',$prestador->id) }}"><i class="fa fa-mail-reply text-success"></i> </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newPrestador">
                        Novo
                    </button>
                </div>
            </div>
        </div>

    </div>

    @include('admin.cadastros.prestador.create')
    @include('admin.cadastros.prestador.edit')
    @include('admin.cadastros.prestador._categoria-edit')
    @include('admin.cadastros.prestador._servico-add')
    @include('admin.cadastros.prestador._add-tipo-servico')
    @include('admin.cadastros.prestador._edit-tipo-servico')

    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Categorias</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        @foreach($categorias as $cat)
                            <tr>
                                <td><a href="#" class="selectCategory" data-catid ="{{$cat->id}}">{{ $cat->nome }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-bottom: 400px;">.</div>
@endsection