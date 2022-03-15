<?php
	namespace app\core;
	
		class App {
			
			private $controller = 'Main';
			private $method = 'index';

			public function __construct() {
				$url = self::parseUrl();

				if (isset($url[0])) {
					if (file_exists('app/controllers/' . $url[0] . '.php')) 
						$this->controller = $url[0];
					
					unset($url[0]);
				}

				$this->controller = 'app\\controllers\\' . $this->controller;
				$this->controller = new $this->controller;

				if (isset($url[1])) {
					if (method_exists($this->controller, $url[1]))
						$this->method = $url[1];
					
					unset($url[1]);
				}

				//TODO: ADD VALIDATION
				
				//access filtering
				$reflection = new \ReflectionObject($this->controller);
				$classAttributes = $reflection->getAttributes();
				$methodAttributes = $reflection->getMethod($this->method)->getAttributes();

				$attributes = array_values(array_merge($classAttributes, $methodAttributes));

				foreach($attributes as $attribute) {
					$filter = $attribute->newInstance();
					$filter->execute();
					if ($filter->execute())
						return;
				}

				$this->params = $url ? array_values($url) : [];
				call_user_func_array([$this->controller, $this->method], $this->params);
			}

			private static function parseUrl() {
				if (isset($_GET['url'])) {
					return explode('/',
						filter_var(
							rtrim($_GET['url'], '/'),
							FILTER_SANITIZE_URL)
					);
				}
			}
		}