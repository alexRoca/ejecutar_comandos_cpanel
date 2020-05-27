<?php

require('cpanel/cPanel/cPanel.php');

$username='usuario_hosting';
$password='clave_hosting';
$host='ip_hosting';

echo '<br>';
echo '<br>';
echo '**************************crear usuario de BD*********************';
echo '<br>';

//**************************crear usuario de BD*********************

$cpanel1 = new CPANEL($username, $password, $host);
$create_user='';

$create_user = $cpanel1->uapi(
	'Mysql','create_user',
	array(
			'name' => 'basketperu_nombre_usuario_db',
			'password' => 'clave_usuario_db',
	)
);
echo 'testing';
print_r($create_user);

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

foreach($create_user as $nombre => $valor){
	
	//echo $nombre.' : <br>';
	if($nombre =='status'){
		$status=$valor;
	}
	if($nombre =='errors'){
		$error=$valor;
	}

}

echo 'respuesta : '.$status.'<br>';
echo 'mensaje : '.$error[0].'<br>';

//**************************crear usuario de BD*********************

echo '<br>';
echo '<br>';
echo '**************************crear BD*********************';
echo '<br>';

//**************************crear BD*********************

$cpanel2 = new CPANEL($username, $password, $host);
$create_db='';

$create_db = $cpanel2->uapi(
	'Mysql', 'create_database',
	array(
			'name'    => 'basketperu_nombre_base_de_datos',
	)
);
echo 'testing';
print_r($create_db);

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

foreach($create_db as $nombre => $valor){
	
	//echo $nombre.' : <br>';
	if($nombre =='status'){
		$status=$valor;
	}
	if($nombre =='errors'){
		$error=$valor;
	}

}

echo 'respuesta : '.$status.'<br>';
echo 'mensaje : '.$error[0].'<br>';

//**************************crear BD*********************

echo '<br>';
echo '<br>';
echo '**************************asignar privilegios usuario BD*********************';
echo '<br>';

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

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

$contador=1;
foreach($create_privilegios as $nombre => $valor){
	
	//echo $nombre.' : <br>';
	if($nombre =='status'){
		$status=$valor;
	}
	if($nombre =='errors'){
		$error=$valor;
	}

	$contador++;
}

echo 'respuesta : '.$status.'<br>';
echo 'mensaje : '.$error[0].'<br>';

//**************************asignar privilegios usuario BD*********************

echo '<br>';
echo '<br>';
echo '**************************crear subdominio*********************';
echo '<br>';

//*************************crear subdominio**************************

$cpanel4 = new CPANEL($username, $password, $host);
$get_userdata='';

$get_userdata = $cpanel4->uapi(
    'SubDomain', 'addsubdomain',
        array(
        'domain'                => 'prueba',
        'rootdomain'            => 'basketperu.com',
        'dir'                   => '/public_html/carpetaPrueba',
        'disallowdot'           => '1',
    )
);

echo 'testing : <br>';
print_r($get_userdata);

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

$contador=1;
foreach($get_userdata as $nombre => $valor){
	
	//echo $nombre.' : <br>';
	if($nombre =='status'){
		$status=$valor;
	}
	if($nombre =='errors'){
		$error=$valor;
	}

	$contador++;
}

echo 'respuesta : '.$status.'<br>';
echo 'mensaje : '.$error[0].'<br>';

//*************************crear subdominio**************************

