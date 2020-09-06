<?php 
require_once('./modeles/m_bdd.php');
require_once('./modeles/mGlobal/m_menu.php');
require_once('./modeles/m_configSite.php');
require_once('./assets/inc/_initGeneral/functionInit.php');
$configSite = initConfigSite();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Andy Douarre">
<title><?= $configSite->nameSite;?></title>

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="./rs-plugin/css/settings.css" media="screen" />

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="./css/ionicons.min.css" rel="stylesheet">
<link href="./css/main.css" rel="stylesheet">
<link href="./css/basic.css" rel="stylesheet">
<link href="./css/style.css" rel="stylesheet">
<link href="./css/responsive.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- JavaScripts -->
<script src="./js/modernizr.js"></script>

<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<?php
// Récupère la configuration du

$configSite = initConfigSite();
initParamBoolSite($configSite);

