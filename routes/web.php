<?php


	/**
	*	Routes public	
	*
	*/
	Route::get('/', 'Home\HomeController@index')->name('home.index');


	/**
	*	Routes create atas
	*
	*/
	Route::prefix('admin')
		->namespace('admin')
		->group(function() {

	/**
     * Role x User
     */
    Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.role.detach');
    Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
    Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');

	 /**
     * Routes Roles
     */
    Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
    Route::resource('roles', 'ACL\RoleController');

/**
     * Permission x Role
     */
    Route::get('roles/{id}/permission/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionRole')->name('roles.permission.detach');
    Route::post('roles/{id}/permissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
    Route::get('permissions/{id}/role', 'ACL\PermissionRoleController@roles')->name('permissions.roles');

	/**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');


	/**
	* 	Permissions x Profiles
	*/
	Route::get('profiles/{id}/permission/{idPermassion}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
	Route::POST('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attache');
	Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
	Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');	
	Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');	
 	
 	 /**
     * Routes Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

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
	*	Routes Plans
	*/
	Route::get('plans/create', 'PlanController@create')->name('plans.create');
	Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
	Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
	Route::any('plans/search', 'PlanController@search')->name('plans.search');
	Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
	Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
	Route::POST('plans', 'PlanController@store')->name('plans.store');
	Route::get('plans', 'PlanController@index')->name('plans.index');

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

Auth::routes();

Route::get('/create/user', 'Site\SiteController@index')->name('new.plan');
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/home', 'HomeController@index')->name('home');

