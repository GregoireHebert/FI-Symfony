<?php

include 'classes/index.php';
include 'classes/user.php';
include 'classes/advanceUser.php';
include 'classes/admin.php';

$user = new AdvanceUser();
$user->setName('Valentin');
$index = new Index();

//echo $index->displayNameWithParameter('Valentin') . PHP_EOL;
//$name = 'Valentin bis';
//echo $index->displayNameWithParameter($name) . PHP_EOL;
//echo $name;
//unset($name);

echo $index->displayNameWithObjectParameter($user) . PHP_EOL;

//var_dump($user);
//PHP_EOL est un retour à la ligne selon la machine, . fait une concaténation de string
//echo affiche la valeur
//unset($user) permet de nettoyer une valeur (que si elle existe), c'est plus efficace que $user = null;
//var_dump affiche le contenu ET le type d'une variable


$admin = new Admin();
$admin->setName('Valentin bis');

//echo $index->displayNameWithParameter('Valentin') . PHP_EOL;
//$name = 'Valentin bis';
//echo $index->displayNameWithParameter($name) . PHP_EOL;
//echo $name;
//unset($name);
//instanceOf permet de savoir si une instance fait partie d'une classe

echo $index->displayNameWithObjectParameter($admin) . PHP_EOL;
//var_dump($admin::$count);
//var_dump($user::$count);
//var_dump($admin instanceof User);
//var_dump($user instanceof User);
//var_dump($admin instanceof Admin);
//var_dump($user instanceof Admin);

?>
