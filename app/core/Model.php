<?php
	namespace app\core;

		class Model {

			protected static $_connection;

			function __construct() {
				self::$_connection = DBConnection::getInstance();
			}
		}