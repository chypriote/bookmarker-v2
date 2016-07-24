<!DOCTYPE html>
<html ng-app="bookmarker">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bookmarker 2</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="app.min.css">
</head>
<body>
	{{--Sidebar--}}
	<aside class="sidebar">
		<header class="sidebar-logo">
			<div class="logo-title">Bookmarker <span>2</span></div>
			<div class="logo-subtitle">A massive database of things</div>
		</header>
		<nav class="sidebar-nav">
			<div class="sidebar-categories">
				<a href="#" class="category-selector">
					<i class="fa fa-code"></i> Web
				</a>
				<a href="#" class="category-selector active">
					<i class="fa fa-gamepad"></i> Games
				</a>
				<a href="#" class="category-selector">
					<i class="fa fa-cubes"></i> Plugins
				</a>
			</div>
			<div class="sidebar-tags">
				<a class="tag-selector" >everything</a>
				<a class="tag-selector active">test</a>
				<a class="tag-selector">domino</a>
			</div>
		</nav>
		<footer class="sidebar-footer">
			by <a href="cv.chypriote.me">ChypRiotE</a>
		</footer>
	</aside>
	{{--Main--}}
	<div class="content">
		{{--Navbar--}}
		<header class="topbar">
			<div class="topbar-container">
				<div class="topbar-search">
					<label for="topbarSearch" class="search-label"><i class="fa fa-search"></i></label>
					<input type="text" id="topbarSearch" class="search-input" placeholder="Search by name, category, or tag">
				</div>
				<button class="topbar-toggle">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
				<button class="icon-button">
					<i class="fa fa-lock"></i>
					<span>Login</span>
				</button>
			</div>
		</header>
		{{--Vue--}}
		<main class="view" ui-view>
			<div class="container">
				<div class="title">Laravel 5</div>
				<button class="button --primary">
					<span>Flash</span>
				</button>
				<button class="icon-button --secondary">
					<i class="fa fa-car"></i>
					<span>Domino</span>
				</button>
				<button class="button --accented">
					<span>Bonhomme</span>
				</button>
				<button class="icon-button --tertiary">
					<i class="fa fa-bell"></i>
					<span>Ding</span>
				</button>
				<ui-view></ui-view>
			</div>
		</main>
	</div>
	<script src="app.min.js"></script>
</body>
</html>
                                                                                                                                                       
                                       
