# Projet-Fournil
<br>Un projet pour une boulangerie fictive codé avec le framework codeIgniter 3.1.8
Aller sur le config.php et chercher cette ligne "$config['base_url']"
modifier la ligne soit comme ceci 
$config['base_url'] ='http://localhost:8080/codeIgniter318/'
soit avec votre adresse IP
$db['default'] = array(
	'dsn'	   => 'mysql:host=localhost ou l'hôte utilisé; dbname=fournil; charset=utf8;',
  'hostname' => 'localhost ou le nom de l’hôte que vous utilisez',
	'username' => 'identifiant_SGBDR',
	'password' => 'motdepasse_SGBDR',
	'database' => 'fournil',
	'dbdriver' => 'pdo',//mysqli',
	'dbprefix' => '',
	'pconnect' => TRUE,
	'db_debug' => TRUE,//(ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
Importer la base de donnée et la vue avec les script mis a disposition dans le dossier scriptSQL
Vous pouvez maintenant utilisé le site internet 
si toute fois Vous ne souhaitez pas installer l'interface des visuel sont présent dans le dossier visuel
