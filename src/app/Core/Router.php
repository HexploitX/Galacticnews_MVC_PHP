<?

namespace App\Core;

class Router {
	private $routes = [];

	public function add($method, $pattern, $callback) {
		$this->routes[] = compact('method', 'pattern', 'callback');
	}

	public function dispatch() {
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$method = $_SERVER['REQUEST_METHOD'];

		foreach ($this->routes as $route) {
			if ($method !== $route['method']) continue;

			$pattern = '#^' . $route['pattern'] . '$#';
			if (preg_match($pattern, $uri, $matches)) {
				array_shift($matches);
				call_user_func_array($route['callback'], $matches);
				return;
			}
		}

		http_response_code(404);
		echo 'Страница не найдена';
	}
}