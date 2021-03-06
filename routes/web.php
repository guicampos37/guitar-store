<?php

Route::get('/produtos', 'ProdutosController@index')->name('index_produtos');

Route::get('/produtos/criar', 'ProdutosController@create');
Route::post('/produtos/criar', 'ProdutosController@store');

Route::get('/produtos/{id}/editar', 'ProdutosController@editar');
Route::post('/produtos/{id}/editar', 'ProdutosController@editarProduto');

Route::delete('/produtos/{id}', 'ProdutosController@destroy');

Route::get('/produtos/{id}', 'ProdutosController@show');
Route::post('/produtos/{id}/comentarios', 'ComentariosController@store');

Route::get('/comentarios/{produtoId}', 'ComentariosController@index');