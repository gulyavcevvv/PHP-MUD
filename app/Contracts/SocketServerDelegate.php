<?php

namespace App\Contracts;

use App\SocketClient;

interface SocketServerDelegate {
	function clientConnected(SocketClient $sc);
	function clientDisconnected(SocketClient $sc);
	function clientSentMessage(SocketClient $sc, $message);
}