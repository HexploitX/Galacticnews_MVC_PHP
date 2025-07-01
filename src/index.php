<?

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/db.php';

use App\Core\Router;
use App\Models\News;
use App\Controllers\NewsController;

$pdo = new PDO($dsn, $user, $password, $options);

$newsModel = new News($pdo);
$newsController = new NewsController($newsModel);

$router = new Router();

$router->add('GET', '/', function () use ($newsController) {
	$newsController->list();
});

$router->add('GET', '/(\d+)', function ($id) use ($newsController) {
	$newsController->detail((int)$id);
});

$router->dispatch();