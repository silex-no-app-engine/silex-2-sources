<?php
namespace SilexCasts\Provider;

use Pimple\ServiceProviderInterface;

use Pimple\Container;

class ConnectionServiceProvider implements ServiceProviderInterface
{
	public function register(Container $pimple)
	{
		$pimple['pdo'] = function() use($pimple){
			$host     = $pimple['db.host'];
			$dbname   = $pimple['db.name'];
			$user     = $pimple['db.user'];
			$password = $pimple['db.password'];

			return new \PDO("mysql:host=$host;dbname=$dbname", "$user", "$password");
		};
	}
}