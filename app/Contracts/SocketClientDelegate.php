<?php

namespace App\Contracts;

use App\SocketClient;

interface SocketClientDelegate {
	public function clientClosed (SocketClient $sc);
}