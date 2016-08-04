<!DOCTYPE html>
<html ng-app="bookmarker">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bookmarker 2</title>
	<link rel="stylesheet" href="font-awesome.min.css">
	<link rel="stylesheet" href="app.min.css">
</head>
<body>
	{{--Sidebar--}}
	<sidebar></sidebar>
	<admin-sidebar></admin-sidebar>
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
				<ui-view></ui-view>
			</div>
		</main>
	</div>
	<script src="app.min.js"></script>
</body>
</html>
