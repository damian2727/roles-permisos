<?php

use Illuminate\Database\Seeder;
use App\User;
use App\TiendaPermission\Models\Role;
use App\TiendaPermission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class TiendaPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//truncate table = reiniciar tabla
    	DB::statement("SET foreign_key_checks=0");
    		DB::table('role_user')->truncate();
    		DB::table('permission_role')->truncate();
			Permission::truncate();
    		Role::truncate();
    	DB::statement("SET foreign_key_checks=1");



       // user admin
    	$useradmin = User::where('email', 'admin@admin.com')->first();
    		
    		if ($useradmin) {

    			$useradmin->delete();

    		}

    	$useradmin = User::create([
    		'name' => 'Admin',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('admin')


    	]);


    	// rol admin

 		$roladmin = Role::create([
			'name'=> 'Admin',
			'slug'=> 'admin',
			'description' => 'Administrador',
			'full-access' => 'si'

	]);

 	$useradmin->roles()->sync([ $roladmin->id ]);
 	

 	//permission
    $permission_all = [];

   

   // permission role
 $permission = Permission::create([
		'name'=> 'List role',
		'slug'=> 'role.index',
		'description' => 'Un usuario puede listar un role',
		

	]);

    $permission_all[] = $permission->id;

     $permission = Permission::create([
		'name'=> 'Show role',
		'slug'=> 'role.show',
		'description' => 'Un usuario puede ver un role',
		

	]);

    $permission_all[] = $permission->id;

     $permission = Permission::create([
		'name'=> 'Create role',
		'slug'=> 'role.create',
		'description' => 'Un usuario puede listar un role',
		

	]);

    $permission_all[] = $permission->id;

     $permission = Permission::create([
		'name'=> 'Edit role',
		'slug'=> 'role.edit',
		'description' => 'Un usuario puede editar un role',
		

	]);

    $permission_all[] = $permission->id;


      $permission = Permission::create([
		'name'=> 'Destroy role',
		'slug'=> 'role.destroy',
		'description' => 'Un usuario puede eliminar un role',
		

	]);

    $permission_all[] = $permission->id;


    $permission = Permission::create([
		'name'=> 'List user',
		'slug'=> 'user.index',
		'description' => 'Un usuario puede listar un user',
		

	]);

    $permission_all[] = $permission->id;

     $permission = Permission::create([
		'name'=> 'Show user',
		'slug'=> 'user.show',
		'description' => 'Un usuario puede ver un user',
		

	]);

    $permission_all[] = $permission->id;

     

     $permission = Permission::create([
		'name'=> 'Edit user',
		'slug'=> 'user.edit',
		'description' => 'Un usuario puede editar un user',
		

	]);

    $permission_all[] = $permission->id;


      $permission = Permission::create([
		'name'=> 'Destroy user',
		'slug'=> 'user.destroy',
		'description' => 'Un usuario puede eliminar un user',
		

	]);

    $permission_all[] = $permission->id;





    
    	//tabla permision_role
    	///$roladmin->permissions()->sync( $permission_all );
        
    }
}
