@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: -5px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4>Solicite e receba orçamentos das melhores empresas e profissionais da sua região!
                            <small>Encontre profissionais e empresas para elaboração de projetos, execução de obras e instalações elétricas, hidráulicas e gás, demolições, reformas, reparos e manutenção, acabamento, pintura, telhados e muito mais!</small></h4>
                        </div>
                        <div class="col-sm-2">
                            <br><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newPedido">
                                Pedir Orçamento
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @foreach($prestadores as $prestador)
                @if($prestador->ativo > 0)
                <div class="card">
                    <div class="card-body app-heading">
                        <img class="profile-img" src="{{ Storage::disk('public')->url($prestador->foto) }}">
                        <div class="app-title">
                            <div class="title" id="prestador-title{{ $prestador->id }}"><span>{{ $prestador->nome }}</span></div>
                            <div class="description">{{ $prestador->assinatura }}</div>
                            <div class="description">
                                @if(isset($prestador->facebook) && $prestador->facebook != "")<a href="{{ $prestador->facebook }}" style="color: #5d7f92">
                                    <i class="fa fa-facebook-square" style="font-size: 1.2em;"></i> Página do Facebook
                                </a>@endif
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="section">

                            <div class="section-body">
                                <div class="media social-post">
                                    <div class="media-body">
                                        <div class="media-content" id="prestador-content{{ $prestador->id }}">{{ $prestador->detalhes }}</div>
                                        <div class="media-action">
                                            {{--<button class="btn btn-link">Avaliação <i class="fa fa-star"--}}
                                                                                      {{--style="color: #fce12a"></i><i--}}
                                                        {{--class="fa fa-star" style="color: #fce12a"></i><i class="fa fa-star"--}}
                                                                                                         {{--style="color: #fce12a"></i><i--}}
                                                        {{--class="fa fa-star" style="color: #fce12a"></i><i--}}
                                                        {{--class="fa fa-star-half-full" style="color: #fce12a"></i>--}}
                                            {{--</button>--}}
                                            @if(count($prestador->pedido) > 0)<button class="btn btn-link" data-toggle="modal" data-target="#servicos-realizados" data-id="{{ $prestador->id }}"><i class="fa fa-th-list"></i> {{count($prestador->pedido)}} Serviços realizados</button>@endif
                                            {{--<button class="btn btn-link"><i class="fa fa-comments-o"></i> 10 Commentários</button>--}}
                                            @if(count($prestador->fotos) > 0)

                                            <a href="#prestador-content{{ $prestador->id }}" class="showPortifolio btn btn-link" data-id="{{ $prestador->id }}"><i class="fa fa-th"></i> Portifólio</a>
                                            @include('public._portifolio')
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/CARD BODY-->
                </div><!--CARD-->
                <br>
                @endif
            @endforeach
        </div>
    </div>

    <div id="feedback">
        <div id="feedback-tab" data-toggle="modal" data-target="#newPedido" hidden>Pedir Orçamento</div>
    </div>


    @include('public._novo-pedido')
    @include('public._servicos-realizados')

    <div style="margin-top: 200px;"></div>

@endsection
