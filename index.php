<?php

require('cpanel/cPanel/cPanel.php');

$username='nombre_usuario_hosting';
$password='clave_usuario_hosting';
$host='ip_hosting';



//**************************crear usuario de BD*********************
$cpanel1 = new CPANEL($username, $password, $host);
$create_user='';

$create_user = $cpanel1->uapi(
	'Mysql','create_user',
	array(
			'name' => 'nombre_usuario_db',
			'password' => 'clave_usuario_db',
	)
);
echo 'testing';
print_r($create_user);
//**************************crear usuario de BD*********************



//**************************crear BD*********************
$cpanel2 = new CPANEL($username, $password, $host);
$create_db='';

$create_db = $cpanel2->uapi(
	'Mysql', 'create_database',
	array(
			'name'    => 'nombre_base_de_datos',
	)
);
echo 'testing';
print_r($create_db);
//**************************crear BD*********************



//**************************asignar privilegios usuario BD*********************
$cpanel3 = new CPANEL($username, $password, $host);
$create_privilegios='';

$create_privilegios = $cpanel3->uapi(
	'Mysql', 'set_privileges_on_database',
	array(
			'user'       => 'nombre_usuario_db',
			'database'   => 'nombre_base_de_datos',
			'privileges' => 'ALTER,ALTER ROUTINE,CREATE,CREATE ROUTINE,CREATE TEMPORARY TABLES,CREATE VIEW,DELETE,DROP,EVENT,EXECUTE,INDEX,INSERT,LOCK TABLES,REFERENCES,SELECT,SHOW VIEW,TRIGGER,UPDATE',
	)
);
echo 'testing';
print_r($create_privilegios);
//**************************asignar privilegios usuario BD*********************



//*************************crear subdominio**************************
$cpanel4 = new CPANEL($username, $password, $host);
$get_userdata='';

$get_userdata = $cpanel4->uapi(
    'SubDomain', 'addsubdomain',
        array(
        'domain'                => 'nombre_subdominio',
        'rootdomain'            => 'nombre_dominio',
        'dir'                   => '/public_html/carpetaPrueba',
        'disallowdot'           => '1',
    )
);
echo 'testing';
print_r($get_userdata);
//*************************crear subdominio**************************

