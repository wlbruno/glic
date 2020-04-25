<?php


	/**
	*	Routes public	
	*
	*/
	Route::get('/', 'Home\HomeController@index')->name('home.index');



Route::prefix('admin')
		->namespace('Admin')
		->group(function() {

	/**
	*	Routes Atas
	*
	*/
	Route::any('atas/search', 'AtasController@search')->name('atas.search');
	Route::resource('atas', 'AtasController');
	Route::get('atas/{id}/finalizar', 'AtasController@finish')->name('atas.finish');
	
	/**
	*	Routes Lotes
	*
	*/
	Route::get('atas/{id}/lotes', 'LotesController@create')->name('lotes.create');
	Route::POST('atas/{id}/lotes', 'LotesController@store')->name('lotes.store');
	Route::get('atas/{idAta}/lote/{idLote}/editar', 'LotesController@edit')->name('lotes.edit');
	Route::put('atas/{idAta}/lote/{idLote}', 'LotesController@update')->name('lotes.update');
	Route::get('atas/{idAta}/lote/{idLote}', 'LotesController@destroy')->name('lotes.destroy');

	/**
	*	Routes itens
	*
	*/
	Route::get('atas/{idAta}/lote/{idLote}/itens', 'ItensController@create')->name('itens.create');
	Route::POST('atas/{idAta}/lote/itens', 'ItensController@store')->name('itens.store');
	Route::get('atas/{idAta}/item', 'ItensController@item')->name('item.item');
	Route::POST('atas/{idAta}/item', 'ItensController@store')->name('item.item');

});