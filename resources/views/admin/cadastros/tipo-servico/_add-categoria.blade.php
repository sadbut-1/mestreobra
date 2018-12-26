<div class="modal fade" id="addTipoCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <td><a href="javascript:void(0)" class="selectCategoria" data-catid ="{{$cat->id}}">{{ $cat->nome }}</a></td>
                            <td>{{ $cat->icone }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>