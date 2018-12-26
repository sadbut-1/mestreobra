@extends('admin.app')

@section('content')
    <div class="row">
        <div class="card">
            <h1> Enviar SMS</h1>

            <form action="{{ url('/admin/enviarSMS') }}" method="POST">
                <label>Mensagem:</label>
                <textarea name="message" class="form-control"></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

@endsection