<?php

Route::get('/prueba', function () {



/*
 return	Role::create([
		'name'=> 'Admin',
		'slug'=> 'admin',
		'description' => 'Administrador',
		'full-access' => 'si'

	]);

	return	Role::create([
		'name'=> 'test',
		'slug'=> 'test',
		'description' => 'test',
		'full-access' => 'no'

	]);

*/
	//$user = User::find(1);

	//$user->roles()->attach([1,3]);
	//$user->roles()->detach([1,3]);
	//$user->roles()->sync([1,3]);

	//return $user->roles;

	/*return	Permission::create([
		'name'=> 'List product',
		'slug'=> 'product.index',
		'description' => 'Un usuario puede listar un permiso',
		

	]);*/

	$role = Role::find(2);
	$role->permissions()->sync([2]);
	

	return $role->permissions;

	 
    
});