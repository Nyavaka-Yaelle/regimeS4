<!doctype html>
<html lang="en">
  <head>
  	<title>Admin backOffice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>">
	<style>
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f5f5f5;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f2f2f2;
    }
    body {
        margin: 0;
        padding: 0;
    }
    .header {
        background-color: #8d448b;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
    .header h1 {
        margin: 0;
    }
	.header h2 {
        text-align: left;
        padding: 5px;
		color:white;
		font-weight:bold;
    }
    h5
    {
        text-decoration:underline;
        padding-right:20px;
    }
	.logo {
        
    }
    .navbar {
        background-color: #f5f5f5;
        padding: 10px;
		width:max-content;
		margin:0 auto;
    }
    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }
    .navbar li {
        margin-right: 10px;
    }
    .navbar a {
        color: #8d448b;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 3px;
    }
    .navbar a:hover {
        background-color: #8d448b;
        color: #fff;
    }
	.content {
        flex-grow: 1;
        padding: 20px;
    }
    .footer {
        background-color: #8d448b;
        color: #fff;
        padding: 20px;
        text-align: center;
		left:0;
		bottom:0;
		position: fixed;
		width:100vw;
    }
	.right{
		text-align:right;
	}
    @media (max-width: 768px) {
        .header {
            padding: 10px;
        }
        .navbar {
            padding: 5px;
        }
        .navbar ul {
            flex-wrap: wrap;
            justify-content: center;
        }
        .navbar li {
            margin: 5px;
        }
    }
</style>
</head>
<body>	
	<header class="header">
		<h2><em>Re<small>gime</small> </em></h2>
	</header>
	<nav class="navbar">
		<ul>
			<li><a href="<?php echo base_url("ControllerAdmin/DashBoard")?>">DashBoard</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=1")?>">Type Sakafo</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=11")?>">Sakafo</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=2")?>">Type Enchainement</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=21")?>">Enchainement</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=22")?>">Activite</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/content?action=3")?>">Carte</a></li>
			<li><a href="<?php echo base_url("ControllerAdmin/Deconnexion")?>">Deconnexion</a></li>
		</ul>
	</nav>