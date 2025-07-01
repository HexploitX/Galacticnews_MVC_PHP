<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Новости</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="header sect">
		<div class="header__wrap">
			<div class="container">
				<div class="logo">
					<img src="assets/img/logo.svg" class="logo__img"/>
				</div>
			</div>
		</div>
	</header>
	<main>
		<section class="sect banner">
			<?if (!empty($latestNews)): ?>
				<div class="banner__wrap-bkg">
					<img src="images/<?= $latestNews['image'];?>" class="banner__bkg"/>
				</div>
				<div class="container">
					<div class="banner__box">
						<h1 class="banner__title"><?= $latestNews['title'];?></h1>
						<div class="banner__text">
							<?= $latestNews['announce'];?>
						</div>
					</div>
				</div>
			<? endif;?>
		</section>
		<section class="sect news">
			<div class="container">
				<h1 class="news__title">
					Новости
				</h1>
				<div class="news__row">
					<? if (!empty($newsList)): ?>
						<? foreach ($newsList as $item): ?>
							<div class="news__col">
								<article class="news-card">
									<div class="news-card__header">
										<time class="date" datetime="<?=(new DateTime($item['date']))->format('d-m-Y');?>">
											<?=(new DateTime($item['date']))->format('d.m.Y');?>
										</time>
									</div>
									<div class="news-card__content">
										<h2 class="news-card__title">
											<?= $item['title'];?>
										</h2>
										<p class="news-card__text">
											<?= $item['announce'];?>
										</p>
									</div>
									<div class="news-card__footer">
										<a href="/<?=$item['id'];?>" class="btn-link">
											<span class="btn-link__text">Подробнее</span>
											<svg class="btn-link__icon" width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM26.707 8.70711C27.0975 8.31658 27.0975 7.68342 26.707 7.2929L20.343 0.928934C19.9525 0.538409 19.3193 0.538409 18.9288 0.928934C18.5383 1.31946 18.5383 1.95262 18.9288 2.34315L24.5857 8L18.9288 13.6569C18.5383 14.0474 18.5383 14.6805 18.9288 15.0711C19.3193 15.4616 19.9525 15.4616 20.343 15.0711L26.707 8.70711ZM1 9L25.9999 9L25.9999 7L1 7L1 9Z"/>
											</svg>
										</a>
									</div>
								</article>
							</div>
						<? endforeach;?>
					<? endif;?>
				</div>
				<div class="news__row-pagination">
					<ul class="pagination">
					  <!-- Левая стрелка (если не на первой странице) -->

					  <? if ($page == $totalPages): ?>
						  <li class="pagination__item pagination__item--arrow">
						    <a href="?page=<?= $page - 1; ?>" class="pagination__link">
						    	<svg class="pagination__arrow-prev" width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z"/>
								</svg>
						    </a>
						  </li>
					  <? endif;?>

					  <!-- Страницы -->
					  <? for ($i = 1; $i <= $totalPages; $i++): ?>
					  <li class="pagination__item <?= $i === $page ? 'pagination__item--active' : '' ?>"">
					  	<? if ($i === $page): ?>
					    	<span class="pagination__link"><?= $i;?></span>
					    <? else: ?>
					    	<a href="?page=<?=$i;?>" class="pagination__link"><?=$i;?></a>
					    <? endif; ?>
					  </li>
					  <? endfor;?>

					  <!-- Правая стрелка -->
					  <? if ($page < $totalPages): ?>
						  <li class="pagination__item pagination__item--arrow">
						    <a href="?page=<?= $page + 1; ?>" class="pagination__link">
						    	<svg class="pagination__arrow-next" width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z"/>
								</svg>
						    </a>
						  </li>
					  <? endif;?>
					</ul>

				</div>
			</div>
		</section>
	</main>
	<footer class="footer sect">
		<div class="container">
			<div class="footer__wrap">
				<p class="footer__copyright">
					© 2023 — 2412 «Галактический вестник»
				</p>
			</div>
		</div>
	</footer>
</body>
</html>