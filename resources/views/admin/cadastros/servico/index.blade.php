@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            Serviços
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newService" accesskey="c">
                                Novo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            {{--<th>#</th>--}}
                            <th>Ordem</th>
                            <th>Serviço</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicos as $servico)
                                <tr>
{{--                                                <td>{{ $servico->id }}</td>--}}
                                    <td>{{ $servico->ordem }}</td>
                                    <td>{{ $servico->nome }}</td>
                                    <td><a href="#" data-toggle="modal" data-target="#editService" data-id="{{ $servico->id }}"><i class="fa fa-edit"></i> </a> </td>
                                    <td><a href="{{ url('admin/servico/delete',$servico->id) }}"><i class="fa fa-trash"></i> </a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newService">
                        Novo
                    </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('admin.cadastros.servico._create')
    @include('admin.cadastros.servico._edit')

@endsection