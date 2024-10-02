<?php

namespace App;

class DisconnectClientException extends \Exception
{
	public function __toString()
	{
		return $this->getMessage();
	}
}

class SocketException extends \Exception
{
}
