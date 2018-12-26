<?php

Route::get('/td', function () {
    return view('mails.pedido.interessado');
});
Route::get('/email/imobiliarias', function () {
    return view('mails.imobiliaria');
});

//Landing Pages
Route::get('/administracao-condominios-imobiliarias', function () {return view('public.landing-pages.condominios-imobiliarias');});

//Rotas livres
Route::get('/', function () {return redirect('/login');});

Route::get('/empresas/{categoria}', 'EmpresasController@index');
Route::get('/empresas/fotos/{id}', 'EmpresasController@getFotos');
Route::get('/servicos-construcao-civil', 'PedidoController@index');
Route::get('/pedido/show/{hash}/{id}', 'PedidoController@show');
Route::get('/pedido/situacao/{hash}/{resp}', 'PedidoController@pedidoStatus');
Route::post('/pedido/situacao/save', 'PedidoController@savePedidoStatus');
Route::get('/pedido/avaliacao/{hash}/{id}', 'PedidoController@valuate');
Route::post('/pedido/avaliacao/save', 'PedidoController@saveValuate');
Route::post('/pedido/fotos', 'PedidoController@pictures');
Route::get('/pedido/visita/{pedido}/{prestador}', 'PedidoController@solicitarVisita');
Route::post('/pedido/interesse', 'PedidoController@interesse');
Route::get('/categorias-por-tipo/{id}','Client\PedidoController@categoriasPorTipo');
Route::get('/servicos-por-categoria/{id}','Client\PedidoController@servicosPorCategoria');
Route::get('/admin/prestador/list', 'Admin\PrestadorController@listPrestadores');
Route::get('/pedido/compartilhar/{hash}','Client\PedidoController@show');
Route::get('/prestador/servicos/{id}','PrestadorController@servicosRealizados');

Auth::routes();

//Rotas dos prestadores
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index');

    Route::get('/prestador/perfil', 'PrestadorController@index');
    Route::get('/prestador/interesses', 'HomeController@interesses');
    Route::get('/prestador/edit/{id}', 'PrestadorController@edit');
    Route::post('/prestador/update/{id}', 'PrestadorController@update');
    Route::post('/prestador/fotos', 'PrestadorFotoController@store');
    Route::get('/prestador/fotos/show/{id}', 'PrestadorFotoController@show');
    Route::get('/prestador/fotos/destroy/{id}', 'PrestadorFotoController@destroy');
    Route::post('/prestador/fotos/update/{id}', 'PrestadorFotoController@update');

    Route::post('/orcamento/create', 'OrcamentoController@store');

    Route::post('/usuario/change-pass', 'UsuarioController@password');

    Route::get('/pedido/visto/{id}', 'PedidoController@showHome');
});

//Rotas administrativas
Route::group(['prefix' => '/admin', 'middleware' => ['auth','admin']], function() {

    Route::get('/home', 'Admin\HomeController@index');

    Route::get('/usuario', 'Admin\UsuarioController@index');
    Route::post('/usuario/create', 'Admin\UsuarioController@create');
    Route::get('/usuario/edit/{id}', 'Admin\UsuarioController@edit');
    Route::post('/usuario/update/{id}', 'Admin\UsuarioController@update');

    Route::get('/tipo-servico', 'Admin\TipoServicoController@index');
    Route::post('/tipo-servico/create', 'Admin\TipoServicoController@store');
    Route::get('/tipo-servico/addCategory/{tipo}/{cat}', 'Admin\TipoServicoController@addCategory');
    Route::get('/tipo-servico/delete/{tipo}/{cat}', 'Admin\TipoServicoController@rmCategory');
    Route::get('/tipo-servico/edit/{id}', 'Admin\TipoServicoController@edit');
    Route::post('/tipo-servico/update/{id}', 'Admin\TipoServicoController@update');

    Route::get('/categoria', 'Admin\CategoriaController@index');
    Route::get('/categoria/edit/{id}', 'Admin\CategoriaController@edit');
    Route::post('/categoria/update/{id}', 'Admin\CategoriaController@update');
    Route::post('/categoria/create', 'Admin\CategoriaController@store');
    Route::get('/categoria/addServico/{categoria}/{servico}', 'Admin\CategoriaController@addServico');
    Route::get('/categoria/rmServico/{categoria}/{servico}', 'Admin\CategoriaController@rmServico');

    Route::get('/servico', 'Admin\ServicoController@index');
    Route::post('/servico/create', 'Admin\ServicoController@store');
    Route::get('/servico/edit/{id}', 'Admin\ServicoController@edit');
    Route::post('/servico/update/{id}', 'Admin\ServicoController@update');
    Route::get('/servico/delete/{id}', 'Admin\ServicoController@destroy');
    Route::get('/servico/list/{id}', 'Admin\ServicoController@serviceByCategory');

    Route::get('/prestador', 'Admin\PrestadorController@index');
    Route::post('/prestador/busca', 'Admin\PrestadorController@busca');
    Route::post('/prestador/buscaCategoria', 'Admin\PrestadorController@buscaCategoria');
    Route::get('/prestador/edit/{id}', 'Admin\PrestadorController@edit');
    Route::post('/prestador/create', 'Admin\PrestadorController@store');
    Route::post('/prestador/update/{id}', 'Admin\PrestadorController@update');
    Route::get('/prestador/delete/{id}', 'Admin\PrestadorController@destroy');
    Route::get('/prestador/reactive/{id}', 'Admin\PrestadorController@reactive');
    Route::get('/prestador/categoria/delete/{presId}/{catId}', 'Admin\PrestadorController@deleteCategory');
    Route::get('/prestador/tipo/delete/{presId}/{tipoId}', 'Admin\PrestadorController@deleteTipoServico');
    Route::post('/prestador/addCategory/{presId}/{catId}', 'Admin\PrestadorController@addCategory');
    Route::post('/prestador/addTipoServico/{presId}/{tipoId}', 'Admin\PrestadorController@addTipoServico');
    Route::get('/prestador/servicos/{presId}/{catId}', 'Admin\PrestadorController@getServicesByCategory');
    Route::get('/prestador/servico/add/{servId}/{presId}', 'Admin\PrestadorController@addService');
    Route::get('/prestador/servico/rm/{servId}/{presId}', 'Admin\PrestadorController@rmService');
    Route::get('/prestador/ativa-cobranca/{id}', 'Admin\PrestadorController@ativaCobranca');

    Route::get('/pedido', 'Admin\PedidoController@index');
    Route::get('/pedido/show/{id}', 'Admin\PedidoController@show');
    Route::get('/pedido/destroy/{id}', 'Admin\PedidoController@destroy');
    Route::get('/pedido/archive/{id}', 'Admin\PedidoController@archive');
    Route::post('/pedido/email', 'Admin\PedidoController@sendMail');
    Route::get('/pedido/prestador/{pedidoId}/{prestadorId}', 'Admin\PedidoController@attachPrestador');
    Route::get('/pedido/mail_avaliacao/{id}', 'Admin\PedidoController@mailValuation');
    Route::get('/pedido/mail_status/{id}', 'Admin\PedidoController@mailStatus');
    Route::get('/pedido/prestador/mensage/{pedidoId}/{prestadorId}', 'Admin\PedidoController@prestadorMensagem');

    Route::get('/relatorio/prestadores', 'Admin\RelatorioPrestadorController@prestadores');
    Route::get('/relatorio/pedidos/graficos', 'Admin\RelatorioPedidoController@graficos');
    Route::get('/relatorio/pedidos/usuarios', 'Admin\RelatorioPedidoController@usuarios');
    Route::get('/relatorio/pedidosAjax', 'Admin\RelatorioPedidoController@pedidosAjax');

    Route::get('/parceiros/config', 'Admin\ParceiroController@index');

    Route::get('/financeiro/index','Admin\FinanceiroController@index');

    Route::get('/config', 'Admin\ConfiguracoesController@index');
    Route::get('/config/qualificacoes', 'Admin\ConfiguracoesController@qualificacoes');

    Route::get('/avaliacoes', 'Admin\AvaliacaoController@index');

    Route::get('/calc/{mes}', 'Admin\CobrancaController@calculaValores');

    Route::get('/enviaSMS', 'Admin\PrestadorController@telaSMS');
    Route::post('enviarSMS', 'Admin\PrestadorController@sendSMS');
});

//Rotas dos clientes
Route::group(['prefix' => '/client', 'middleware' => 'client'], function() {
    Route::get('/home', 'Client\HomeController@index');
    Route::get('/historico', 'Client\HomeController@historico');
    Route::get('/perfil/{id}','Client\ClienteController@show');
    Route::post('/create', 'Client\ClienteController@store');
    Route::post('/update/{id}', 'Client\ClienteController@update');
    Route::get('/prestador/show/{id}', 'Admin\PrestadorController@show');
    Route::get('/orcamento/show/{pedidoId}/{prestadorId}', 'OrcamentoController@showByPedidoAndPrestador');

    Route::get('/pedido','Client\HomeController@pedido');
    Route::post('/pedido/create', 'Client\PedidoController@store');
    Route::get('/pedidoAjax/show/{id}','Client\PedidoController@showAjax');
    Route::get('/pedido/archive/{id}', 'Client\PedidoController@archive');
    Route::get('/pedido/show/{id}', 'Client\PedidoController@show');
    Route::post('/pedido/share', 'Client\PedidoController@shareMail');

    Route::get('/mensagem/porPrestador/{pedidoId}/{prestadorId}', 'Client\MensagemController@msgsPorPrestador');
    Route::post('/mensagem/nova', 'Client\MensagemController@store');

    Route::post('/agenda/create','Client\AgendaController@store');
});


//Testes
Route::get('/teste', 'PedidoController@testeView');
