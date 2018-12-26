<table class="table table-striped">
    <thead>
    <tr>
        <th><small>#</small></th>
        <th><small>Nome</small></th>
        {{--<th><small>Papel</small></th>--}}
        <th><small>Email</small></th>
        <th><small>Empresa</small></th>
        <th><small>Acessos</small></th>
        <th></th>

    </tr>
    </thead>
    <tbody>
    @foreach($usuarios as $u)
        @if($u->role == 2)
        <tr>
            <td><small>{{ $u->id }}</small></td>
            <td><small>{{ $u->name }}</small></td>
{{--            <td><small>{{ $u->role }}</small></td>--}}
            <td><small>{{ $u->email }}</small></td>
            @if(isset($u->empresa))
                <td><small>{{ $u->empresa->nome }}</small></td>
            @else
                <td><small>Nenhuma</small></td>
            @endif
            <td><span class="badge badge-success pull-right">{{ count($u->acessos) }}</span></td>
            <td>
                <a href="#" data-toggle="modal" data-id="{{ $u->id }}" data-target="#editUser"><i
                            class="fa fa-edit"></i></a>&nbsp;
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>