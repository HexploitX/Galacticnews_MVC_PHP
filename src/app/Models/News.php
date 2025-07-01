<?

namespace App\Models;

use PDO;

class News {
	private $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	public function getNews(int $limit, int $offset) {
		$stmt = $this->pdo->prepare("SELECT * FROM news ORDER BY date DESC LIMIT :limit OFFSET :offset");
		$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function getNewsCount() {
		return (int)$this->pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
	}

	public function getLatestNews() {
		return $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT 1")->fetch();
	}

	public function getNewsById(int $id) {
		$stmt = $this->pdo->prepare('SELECT * FROM news WHERE id = :id');
		$stmt->execute([':id' => $id]);
		return $stmt->fetch();
	}
}