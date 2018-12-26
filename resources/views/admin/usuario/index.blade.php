@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Usuários
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#admin" aria-controls="home" role="tab" data-toggle="tab">Admin</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Prestadores</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Clientes</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="admin">
                            @include('admin.usuario._table-admin')
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            @include('admin.usuario._table-prestadores')
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            @include('admin.usuario._table-clientes')
                        </div>
                    </div>

                    <a href="#" data-toggle="modal" class="btn btn-info" data-target="#newUser"><i class="fa fa-plus-circle"> NOVO</i></a>&nbsp;
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 300px;"></div>
    @include('admin.usuario._edit')
    @include('admin.usuario._new')
@endsection