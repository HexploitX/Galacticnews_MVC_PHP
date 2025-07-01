<?

namespace App\Controllers;

use App\Models\News;
use App\Core\View;

class NewsController {
	private $model;

	public function __construct(News $model) {
		$this->model = $model;
	}

	public function list() {
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$perPage = 4;

		$totalNews = $this->model->getNewsCount();
		$totalPages = ceil($totalNews / $perPage);

		$page = max(1, min($page, $totalPages));
		$offset = ($page - 1) * $perPage;

		$newsList = $this->model->getNews($perPage, $offset);
		$latestNews = $this->model->getLatestNews();

		View::render('news/list', [
			'newsList' => $newsList,
			'latestNews' => $latestNews,
			'page' => $page,
			'totalPages' => $totalPages
		]);
	}

	public function detail(int $id) {
		$newsItem = $this->model->getNewsById($id);

		if (!$newsItem) {
			http_response_code(404);
            echo "Новость не найдена";
            exit;
		}

		View::render('news/detail', [
			'newsItem' => $newsItem
		]);
	}
}