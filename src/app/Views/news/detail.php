<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Новости | <?= $newsItem['title'];?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="header sect header_line_bottom">
		<div class="header__wrap">
			<div class="container">
				<div class="logo">
					<img src="assets/img/logo.svg" class="logo__img"/>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="container">
			<nav class="breadcrumbs" aria-label="Навигация по сайту"> 
			  	<ul class="breadcrumbs__list">
					<li class="breadcrumbs__item">
						<a href="/" class="breadcrumbs__link">Главная</a>
					</li>
					<li class="breadcrumbs__item">
						<span class="breadcrumbs__current"><?= $newsItem['title'];?></span>
					</li>
				</ul>
			</nav>

			<article class="news-detail">
				<header>
					<h1 class="news-detail__title"><?= $newsItem['title'];?></h1>
					<p class="news-detail__date">
						<time class="date" datetime="datetime="<?=(new DateTime($newsItem['date']))->format('d-m-Y');?>">
							<?=(new DateTime($newsItem['date']))->format('d.m.Y');?>	
						</time>
					</p>
				</header>
				<div class="news-detail__row">
					<div class="news-detail__col">
						<div class="news-detail__subtitle">
							<?= $newsItem['announce'];?>
						</div>
						<section class="news-detail__text">
							<?= $newsItem['content'];?>
						</section>
						<nav class="news-detail__btn-group">
							<a href="/" class="btn-link news-detail__btn">
								<svg class="btn-link__icon" width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z"/>
								</svg>
								<span class="btn-link__text">назад к новостям</span>
							</a>
						</nav>
					</div>
					<div class="news-detail__col">
						<figure>
							<img class="news-detail__img" src="./images/<?=$newsItem['image'];?>"/>
						</figure>
					</div>
				</div>
			</article>
		</div>
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