<?php
function __autoload($nom_class){
		require_once $nom_class.'.class.php';
}
?>