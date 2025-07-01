<?

namespace App\Core;

class View {
	public static function render(string $template, array $params = []) {
		$viewPath = __DIR__ . '/../Views/' . $template . '.php';

		if (!file_exists($viewPath)) {
			http_response_code(500);
			echo "Шаблон не найден: $template";
            return; 
		}

		extract($params);

		require $viewPath;
	}
}