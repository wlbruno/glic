<?php

	/**
	* Route Órgão public
	* 
	*/
	Route::get('/orgao/index', 'Site\Orgao\OrgaoController@index')->name('orgao.index');

	/**
	* Route Donwload PDF 
	*/
	Route::get('ata/{id}/pdf', 'Admin\AtasController@pdf')->name('download.pdf');


	/**
	 * Route search key pdf 
	 */
	//Route::get('carona/{id}/pdf', 'Site\HomeController@keyPDF')->name('download.pdf.hey');

	/**
	*	Routes Licita Atas
	*
	*/
	Route::get('ata/{id}/licita', 'Site\Licita\LicitaController@index')->name('licita.index')->middleware('auth');
	Route::POST('ata/carona', 'Site\Licita\LicitaController@carona')->name('licita.carona');
	Route::POST('ata/carona/lote/{id}', 'Site\Licita\LicitaController@getlotes')->name('licita.lote');

	//ROUTE GERAR PDF
	Route::get('ata/carona/{id}', 'Site\Licita\LicitaController@gerarPDF')->name('licita.pdf');

	/**
	*	Routes Menu Atas
	*
	*/
	Route::prefix('atas')
			->namespace('Site')
			->group(function() {

				Route::get('/medicamentos', 'AtasController@medicamentos')->name('atas.medicamentos');
				Route::get('/produtos', 'AtasController@produtos')->name('atas.produtos');
				Route::get('/aquisicao', 'AtasController@aquisicao')->name('atas.aquisicao');
				Route::get('/servicos', 'AtasController@servicos')->name('atas.servicos');
			});
	
	/**
	*	Routes User AUTH	
	*
	*/
	Route::get('/perfil', 'Site\User\UserController@perfil')->name('user.perfil')->middleware('auth');
	Route::put('perfil/update', 'Site\User\UserController@perfilUpdate')->name('perfil.update')->middleware('auth');
	Route::get('/historico', 'Site\HomeController@historico')->name('user.historico')->middleware('auth');
	

	/**
	*	Routes public	
	*
	*/
	Route::get('/home', 'Site\HomeController@index')->name('home.index');
	Route::any('atas/search', 'Site\HomeController@searchAta')->name('atas.search.index');
	Route::any('/search/key', 'Site\HomeController@searchKey')->name('search.key');
	Route::get('/contato', 'Site\HomeController@Contato')->name('user.contato');	

	/**
	*	Routes Register	
	*
	*/
	Auth::routes();
	Route::get('/create/user', 'Site\RegisterController@index')->name('new.plan');
	Route::get('/plan/{url}', 'Site\RegisterController@plan')->name('plan.subscription');
	Route::get('/sair', 'Site\RegisterController@logout')->middleware('auth')->name('logout');



Route::prefix('admin')
		->namespace('admin')
		->middleware('auth')	
		->group(function() {


	/**
	* Route DashBoard
	*/
	Route::get('/sistema', 'AdminController@index')->name('admin.home')->middleware('auth');

	/**
     * Role x User
     */
    Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.role.detach');
    Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
	Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');
	

    /**
     * Permission x Role
     */
    Route::get('roles/{id}/permission/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionRole')->name('roles.permission.detach');
    Route::post('roles/{id}/permissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
    Route::get('permissions/{id}/role', 'ACL\PermissionRoleController@roles')->name('permissions.roles');

     /**
     * Routes Role |resource =  {ROUTES: INDEX, CREATE, STORE, UPDATE, DESTROY, SHOW}
     */
    Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
    Route::resource('roles', 'ACL\RoleController');

	/**
     * Routes Users |resource =  {ROUTES: INDEX, CREATE, STORE, UPDATE, DESTROY, SHOW}
     */
	Route::get('/users/pendentes', 'UserController@pendentes')->name('users.pendentes');
	Route::get('/users/permitidos', 'UserController@permitidos')->name('users.permitidos');
	Route::any('users/search', 'UserController@search')->name('users.search');
	Route::resource('users', 'UserController');
	
	
	/**
	 * 	Routes Permissions |resource =  {ROUTES: INDEX, CREATE, STORE, UPDATE, DESTROY, SHOW}
	*/
	Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
	Route::resource('permissions', 'ACL\PermissionController');

	/**
	*	Routes Fornecedores |resource =  {ROUTES: INDEX, CREATE, STORE, UPDATE, DESTROY, SHOW}
	*/
	Route::resource('fornecedores', 'FornecedoresController');
	Route::any('fornecedores/search', 'FornecedoresController@search')->name('fornecedores.search');
	/**
	*	Routes edit fornecedor e objeto dentro da view lotes.index
	*
	*/
	Route::POST('edit/fornecedor', 'FornecedoresController@editViewLotes')->name('fornecedor.edit.lotes');
	Route::POST('edit/objeto', 'ObjetosController@editViewLotes')->name('objeto.edit.lotes');

	/**
	*	Routes Objetos |resource =  {ROUTES: INDEX, CREATE, STORE, UPDATE, DESTROY, SHOW}
	*/
	Route::resource('objetos', 'ObjetosController');
	Route::any('objetos/search', 'ObjetosController@search')->name('objetos.search');


	/**
	*	Routes Atas |resource =  {ROUTES: INDEX, CREATE, STORE, UPDATE, DESTROY, SHOW}
	*
	*/
	Route::any('atas/search', 'AtasController@search')->name('atas.search');
	Route::resource('atas', 'AtasController');
	Route::get('atas/{id}/finalizar', 'AtasController@finish')->name('atas.finish');
	Route::put('atas/{id}/salvar', 'AtasController@save')->name('atas.save');
	Route::put('atas/{id}/publicar', 'AtasController@publicar')->name('atas.public');
	//Update arquivo
	Route::post('ata/{id}/arquivo', 'AtasController@updateArquivo')->name('update.arquivo');

	
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
	Route::get('atas/{idAta}/lote/{idlote}/item/{idItem}', 'ItensController@edit')->name('item.edit');
	Route::POST('atas/{idAta}/lote/{idlote}/item/{idItem}', 'ItensController@update')->name('item.update');
	Route::get('atas/{idAta}/item/{idItem}/delete', 'ItensController@destroy')->name('item.destroy');
	
	/**
	*	Routes Órgao
	*
	*/
	Route::get('atas/{idAta}/lote/{idLote}/item/{idItem}/orgao', 'OrgaoController@create')->name('orgao.create');
	Route::post('atas/{idAta}/lote/{idLote}/item/{idItem}/orgao', 'OrgaoController@store')->name('orgao.store');
	Route::get('atas/item/{idItem}/orgao/{idOrgao}', 'OrgaoController@destroy')->name('orgao.destroy');


});


/*
*	Routes criar fornecedores e objetos dentro da ata
*/
Route::post('ata/{id}/fornecedor', 'Admin\FornecedoresController@ata')->name('fornecedor.ata')->middleware('auth');
Route::post('ata/{id}/objeto', 'Admin\ObjetosController@ata')->name('objeto.ata')->middleware('auth');
/*
*	Routes criar fornecedores e objetos dentro do Lote
*/
Route::post('ata/{idAta}/lote/{idLote}/fornecedor', 'Admin\FornecedoresController@lote')->name('fornecedor.lote')->middleware('auth');
Route::post('ata/{idAta}/lote/{idLote}/objeto', 'Admin\ObjetosController@lote')->name('objeto.lote')->middleware('auth');




