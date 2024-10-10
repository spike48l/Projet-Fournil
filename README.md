# Projet-Fournil
<br>Un projet pour une boulangerie fictive codé avec le framework codeIgniter 3.1.8
Aller sur le config.php et chercher cette ligne "$config['base_url']"
modifier la ligne soit comme ceci 
<br>$config['base_url'] ='http://localhost:8080/codeIgniter318/'
soit avec votre adresse IP
<br>$db['default'] = array(
	<br>'dsn'	   => 'mysql:host=localhost ou l'hôte utilisé; dbname=fournil; charset=utf8;',
  	<br>'hostname' => 'localhost ou le nom de l’hôte que vous utilisez',
	<br>'username' => 'identifiant_SGBDR',
	<br>'password' => 'motdepasse_SGBDR',
	<br>'database' => 'fournil',
	<br>'dbdriver' => 'pdo',//mysqli',
	<br>'dbprefix' => '',
	<br>'pconnect' => TRUE,
	<br>'db_debug' => TRUE,//(ENVIRONMENT !== 'production'),
	<br>'cache_on' => FALSE,
	<br>'cachedir' => '',
	<br>'char_set' => 'utf8',
	<br>'dbcollat' => 'utf8_general_ci',
	<br>'swap_pre' => '',
	<br>'encrypt' => FALSE,
	<br>'compress' => FALSE,
	<br>'stricton' => FALSE,
	<br>'failover' => array(),
	<br>'save_queries' => TRUE
);
<br>
Importer la base de donnée et la vue avec les script mis a disposition dans le dossier scriptSQL
Vous pouvez maintenant utilisé le site internet 
si toute fois Vous ne souhaitez pas installer l'interface des visuel sont présent dans le dossier visuel
