<?php

use selector\PagePartSelector;

$logo = PagePartSelector::stylePathHeaderInsertion("misc/images/icon/logo.ico");
$bootstrap = PagePartSelector::stylePathHeaderInsertion("misc/style/css/bootstrap.css");
$mainCssDocument = PagePartSelector::stylePathHeaderInsertion("misc/style/main.css");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=<?php echo $bootstrap ?>>
    <link rel="stylesheet" href=<?php echo $mainCssDocument ?>>
    <link rel="shortcut icon" href=<?php echo $logo ?>>
    <title><?php echo $title; ?></title>
</head>
<body>
