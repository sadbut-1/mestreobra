<div id="portifolioFotos{{ $prestador->id }}" style="background-color: rgba(70,70,70,0.91);" hidden>
    <br>
    <div id="carousel-example-generic{{ $prestador->id }}" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($prestador->fotos as $key => $foto)
                <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" @if($key == 0)class="active"@endif></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox" id="#portifolioFotos">
            @foreach($prestador->fotos as $key => $foto)
                <div class="item @if($key == 0)active @endif">
                    <img src="{{ Storage::disk('public')->url($foto->foto) }}"
                         class="img-rounded img-responsive"
                         alt="{{ $foto->descricao }}"
                         style="display: block;margin-left: auto;margin-right: auto; max-height: 380px;"
                    >
                    <div class="carousel-caption">
                        @if(!$foto->descricao == 'foto'){{ $foto->descricao }} @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic{{ $prestador->id }}" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic{{ $prestador->id }}" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <a href="#prestador-title{{ $prestador->id }}" class="fecharFotos" data-id="{{ $prestador->id }}" style="color: white;margin-left: 15px; text-align: right;">
        <i class="fa fa-close"></i> fechar
    </a>
    <br>
</div>