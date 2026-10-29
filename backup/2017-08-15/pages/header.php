<html>
<title>CN Line Stop Alert</title>
<head>
<?php require_once('pages/login_validation.php'); ?>
<?php require_once('libraries/includes.php'); ?>
<?php require_once('pages/get_user_roles.php'); ?>
<input type="hidden" id="hd_username" value="<?php echo $_SESSION['username']; ?>">
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top topbar">
		<div class="container-fluid">

			<div class="navbar-header">

				<a href="#" class="navbar-brand">
					<span class="hidden-xs">CNLAS</span>
				</a>

				<p class="navbar-text">
					
				</p>

			</div>

			<div class="navbar-collapse collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a href="#" class="sidebar-toggle" id="toggle-menu">
							<i class="fa fa-bars"></i>
						</a>
					</li>
				</ul>
				<!-- <ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<button class="navbar-btn" data-toggle="dropdown">
							<i class="fa fa-globe fa-2x"></i> <i class="badge">5</i>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">(IQC) In-coming Quality Inspection <i class="badge">1</i></a></li>
							<li><a href="#">(OQC) Out-going Quality Inspection <i class="badge">4</i></a></li>
							<li class="nav-divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul> -->

			</div>
		</div>
	</nav>
<script>
var username = $('#hd_username').val();
</script>