@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Configurações
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ url('/admin/config/qualificacoes') }}" class="btn btn-primary">Atualizar qualificações</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection