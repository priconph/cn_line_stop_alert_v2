<?php
require_once('libraries/includes.php');
?>
<style>
body {
    background-color: #dedede;
}

.topbar {
	background: #2A3F54;
	border-color: #2A3F54;
	border-radius: 0px;
}

.topbar .navbar-header a {
	color: #ffffff;
}

.wrapper {
    padding-left: 0px;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.sidebar {
    z-index: 1000;
    position: fixed;
    top: 50px;
    left: -50px;
    width: 50px;
    height: 100%;
    overflow-y: auto;
    background: #2A3F54;
	color: #ffffff;
	-webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.main {
	width: 100%;
    position: relative;
    padding-bottom:20px;
}

.wrapper.toggled {
	padding-left: 50px;
}

.wrapper.toggled .sidebar {
	left: 0;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0px;
    width: 50px;
    margin: 0;
    padding: 0;
    list-style: none;
}
.sidebar-nav li {
    line-height: 40px;
}
.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #e8e8e8;
    padding: 10px;
    text-align:center;
}

.sidebar-nav li a:hover, .sidebar-nav li.active a {
    text-decoration: none;
    color: #fff;
    background: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav li span, .subbar li span {
	display : none;
}

nav.subbar {
	position: relative;
	width: 100%;
	border-radius: 0px;
	background: #fff;
	margin: 50px 0 -50px 0;
	padding: 10px 0 0 0;
	z-index: 2;
}
nav.subbar > ul.nav.nav-tabs {
	padding: 0 5px;
}

nav.subbar > ul.nav.nav-tabs > li.active > a {
    background: #dedede;
    border-top: 1px solid #a6a6a6;
    border-left: 1px solid #a6a6a6;
    border-right: 1px solid #a6a6a6;
    border-radius: 0px;
}

.content {
    margin-top: 70px;
    padding: 0 30px;
}

@media(min-width:768px){
	.subbar li span {
		display: inline;
	}
}

@media(min-width:992px) {
    .wrapper {
    	padding-left: 50px;
    }

    .sidebar {
    	left: 0;
    	width: 50px;
	}

	.wrapper.toggled {
		padding-left: 200px;
	}

	.wrapper.toggled .sidebar, .wrapper.toggled .sidebar-nav {
		width: 200px;
	}
	
	.wrapper.toggled .sidebar-nav li a#toggle-menu {
		text-align: right;
		padding: 0 20px 0 10px;
	}
	
	.wrapper.toggled .sidebar-nav li a {
		text-align: left;
		padding: 0 0 0 10px;
	}

	.wrapper.toggled .sidebar-nav li span {
		display: inline;
	}

}

.navbar-btn {
    background: none;
    border: none;
    height: 35px;
    min-width: 35px;
    color: #fff;
}
.navbar-text {
  margin-top: 14px;
  margin-bottom: 14px;
}
@media (min-width: 768px) {
  .navbar-text {
    float: left;
    margin-left: 15px;
    margin-right: 15px;
  }
}
</style>
    <nav class="navbar navbar-default navbar-fixed-top topbar">
		<div class="container-fluid">

			<div class="navbar-header">

				<a href="#" class="navbar-brand">
					<span class="hidden-xs">Template 1</span>
				</a>

				<p class="navbar-text">
					
				</p>

			</div>

			<div class="navbar-collapse collapse" id="navbar-collapse-main">

				<ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <button class="navbar-btn">
                            <i class="fa fa-bell"></i>
                        </button>
                    </li>
					<!--<li class="dropdown">
						<button class="navbar-btn" data-toggle="dropdown">
							<img src="http://lorempixel.com/30/30/people" class="img-circle">
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Account</a></li>
							<li><a href="#">Dashboard</a></li>
							<li class="nav-divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>-->

				</ul>

			</div>
		</div>
	</nav>
	
	<article class="wrapper">
	    
	    <aside class="sidebar">
	        <ul class="sidebar-nav">
				<li>
					<a href="#" class="sidebar-toggle" id="toggle-menu">
						<i class="fa fa-bars"></i>
					</a>
				</li>
				<li class="active"><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			    <li><a href="#configuration" data-toggle="tab"><i class="fa fa-cogs"></i> <span>Configuration</span></a></li>
			    <li><a href="#users" data-toggle="tab"><i class="fa fa-users"></i> <span>Users</span></a></li>
			    <li><a href="#mail" data-toggle="tab"><i class="fa fa-envelope"></i> <span>Mail</span></a></li>
			</ul>
	    </aside>
	    
	    <section class="main">
	        
	        <section class="tab-content">
	            
	           <section class="tab-pane active fade in content" id="dashboard">
	               
	                <div class="row">
	                   
                        <div class="col-xs-6 col-sm-3">
	                        <div class="panel panel-primary">
	                            <div class="panel-body">
	                                <br/><br/><br/><br/>
	                            </div>
	                        </div>
	                    </div>
	                    
	                    <div class="col-xs-6 col-sm-3">
	                        <div class="panel panel-success">
	                            <div class="panel-body">
	                                <br/><br/><br/><br/>
	                            </div>
	                        </div>
	                    </div>
	                    
	                    <div class="col-xs-6 col-sm-3">
	                        <div class="panel panel-danger">
	                            <div class="panel-body">
	                                <br/><br/><br/><br/>
	                            </div>
	                        </div>
	                    </div>
	                    
	                    <div class="col-xs-6 col-sm-3">
	                        <div class="panel panel-warning">
	                            <div class="panel-body">
	                                <br/><br/><br/><br/>
	                            </div>
	                        </div>
	                    </div>
	                   
	                   <div class="col-xs-12 col-sm-9">
	                       <div class="panel panel-default">
	                           <div class="panel-heading">
	                               Something
	                           </div>
	                           <div class="panel-body">
	                               This layout uses tabs to demonstrate what you could do with it. It probably makes more sense to use individual pages/templates in a production app.
	                               <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	                           </div>
	                       </div>
	                   </div>
	                   
	                   <div class="col-xs-12 col-sm-3">
	                       <div class="panel panel-default">
	                           <div class="panel-heading">
	                               Something
	                           </div>
	                           <div class="panel-body">
	                               The sidebar is naturally responsive according to screen width. You can toggle it using the menu button in the topbar. Test it out by increasing/decreasing your screen width and watch it respond.
	                           </div>
	                       </div>
	                       
	                       <div class="panel panel-default">
	                           <div class="panel-heading">
	                               Kaitani Labs
	                           </div>
	                           <div class="panel-body">
	                               Designed by <a href="http://www.kaitanilabs.com" target="_blank">Kaitani Labs</a></a>
	                           </div>
	                       </div>
	                   </div>
	                   
	               </div>
	               
	           </section>
	           
	           <section class="tab-pane fade" id="configuration">
	               <nav class="subbar">
			            <ul class="nav nav-tabs">
				            <li class="active"><a href="#access" data-toggle="tab"><i class="fa fa-code"></i> <span>System</span></a></li>
				            <li><a href="#roles" data-toggle="tab"><i class="fa fa-user"></i> <span>Roles</span></a></li>
			            </ul>
		            </nav>
		            
		            <section class="tab-content content">
		                
		                <section class="tab-pane active fade in" id="access">
		                    
                            <div class="row">
                                <div class="col-xs-12">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="col-xs-12 col-sm-4">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="col-xs-12 col-sm-4">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="col-xs-12 col-sm-4">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
                            </div>
		                    
		                </section>
		                
		                <section class="tab-pane fade" id="roles">
		                    
		                    <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-9">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                            <div class="hidden-xs col-sm-4 col-md-3">
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/>
	                                    </div>
	                                </div>
	                                
	                                <div class="panel panel-default">
	                                    <div class="panel-heading">
	                                        Something
	                                    </div>
	                                    <div class="panel-body">
	                                        <br/><br/><br/>
	                                    </div>
	                                </div>
	                            </div>
	                       </div>
		                </section>
		                
		            </section>
		            
	           </section>
	           
	           <section class="tab-pane fade" id="users">
	               
	           </section>
	           
	           <section class="tab-pane fade" id="mail">
	               
	           </section>
	           
	        </section>
	        
	    </section>
	    
	</article>
	
	<script>
		$(document).on("click",".sidebar-toggle",function(){
			$(".wrapper").toggleClass("toggled");
		});
	</script>