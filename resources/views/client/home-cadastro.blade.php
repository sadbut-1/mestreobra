@extends('client.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Bem Vindo {{ Auth::user()->name }}!</h4></div>

                <div class="panel-body" style="background-color: #fbfbfb">
                    <p>
                        <small>Finalize seu cadastro</small>
                    </p>
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/client/create') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                                        <label for="cep" class="col-md-4 control-label">CEP *</label>

                                        <div class="col-md-6">
                                            <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" required autofocus>

                                            @if ($errors->has('cep'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                                        <label for="estado" class="col-md-4 control-label">Estado *</label>

                                        <div class="col-md-6">
                                            <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}" required>

                                            @if ($errors->has('estado'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                                        <label for="cidade" class="col-md-4 control-label">Cidade *</label>

                                        <div class="col-md-6">
                                            <input id="cidade" type="text" class="form-control" name="cidade" required>

                                            @if ($errors->has('cidade'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="bairro" class="col-md-4 control-label">Bairro *</label>

                                        <div class="col-md-6">
                                            <input id="bairro" type="text" class="form-control" name="bairro" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rua" class="col-md-4 control-label">Rua *</label>

                                        <div class="col-md-6">
                                            <input id="rua" type="text" class="form-control" name="rua" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="numero" class="col-md-4 control-label">Número *</label>

                                        <div class="col-md-6">
                                            <input id="numero" type="number" class="form-control" name="numero" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telefone" class="col-md-4 control-label">Telefone Fixo</label>

                                        <div class="col-md-6">
                                            <input id="telefone" type="tel" class="form-control" name="telefone">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="celular" class="col-md-4 control-label">Celular *</label>

                                        <div class="col-md-6">
                                            <input id="celular" type="tel" class="form-control" name="celular" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="empresa" class="col-md-4 control-label">Empresa</label>

                                        <div class="col-md-6">
                                            <input id="empresa" type="text" class="form-control" name="empresa">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="registro" class="col-md-4 control-label">CNPJ ou CPF</label>

                                        <div class="col-md-6">
                                            <input id="registro" type="text" class="form-control" name="registro">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-info">
                                                Salvar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!--end col-12 -->
                </div>
            </div>
        </div>
    </div>
@endsection
