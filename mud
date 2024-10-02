#!/usr/bin/php
<?php

/*
include './app/Log.php';
include './app/Exceptions.php';
include './app/Startup.php';
include './app/Tick.php';
include './app/Colors.php';
include './app/Actions.php';
include './app/Client.php';
include './app/Database.php';
include './app/SocketClient.php';
include './app/SocketServer.php';
include './app/Server.php';
include './app/ORM.php';*/
include 'autoload.php';

include './config.php';
include './app/Options.php';
include './app/Colors.php';
include './app/Tick.php';

(new App\Server)
	->setAddress(ADDRESS)
	->setPort(PORT)
	->start();

