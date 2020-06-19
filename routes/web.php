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
	*	Routes Licita Atas
	*
	*/
	Route::get('ata/{id}/licita', 'Site\Licita\LicitaController@index')->name('licita.index')->middleware('auth');
	Route::POST('ata/carona', 'Site\Licita\LicitaController@carona')->name('licita.carona');
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
	*	Routes public	
	*
	*/
	Route::get('/', 'Site\HomeController@index')->name('home.index');

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
     * Routes Role
     */
    Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
    Route::resource('roles', 'ACL\RoleController');

	/**
     * Routes Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');
	

	/**
	* 	Permissions x Profiles
	*/
	Route::get('profiles/{id}/permission/{idPermassion}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
	Route::POST('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attache');
	Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
	Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');	
	Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');	


	/**
	* 	Routes Permissions
	*/
	Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
	Route::resource('permissions', 'ACL\PermissionController');

			
	/**
	* 	Routes Profiles
	*/
	Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
	Route::resource('profiles', 'ACL\ProfileController');


	/**
	*	Routes Fornecedores
	*/
	Route::resource('fornecedores', 'FornecedoresController');

	/**
	*	Routes Objetos
	*/
	Route::resource('objetos', 'ObjetosController');


	/**
	*	Routes Atas
	*
	*/
	Route::any('atas/search', 'AtasController@search')->name('atas.search');
	Route::resource('atas', 'AtasController');
	Route::get('atas/{id}/finalizar', 'AtasController@finish')->name('atas.finish');
	Route::put('atas/{id}/salvar', 'AtasController@save')->name('atas.save');
	Route::put('atas/{id}/publicar', 'AtasController@publicar')->name('atas.public');

	
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

	/**
	*	Routes Órgao
	*
	*/
	Route::get('atas/{idAta}/lote/{idLote}/item/{idItem}/orgao', 'OrgaoController@create')->name('orgao.create');
	Route::post('atas/{idAta}/lote/{idLote}/item/{idItem}', 'OrgaoController@store')->name('orgao.store');


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




