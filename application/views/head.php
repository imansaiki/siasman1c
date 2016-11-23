<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIASMAN1C</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=<?php echo base_url();?>>SIASMAN1C</a>
            </div>
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                <?php if (!empty($this->session->userdata('id'))){?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    	<?php echo $this->session->userdata('id');?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('akun/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
				<?php }else{?>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    	<?php echo $this->session->userdata('id');?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
						<div class="panel panel-info" >
							<div class="panel-heading">Login</div>
								<div class="panel-body">
									<form method="post" action="<?php echo base_url('Akun/login');?>" >
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user "></i></span>
											<input class="form-control" placeholder="nip / nis"  name="id" type="text" />
										</div>
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
											<input class="form-control" placeholder="password" name="password" type="password" />
										</div>
										<button type="submit" class="form-control btn-primary"><i class="fa fa-chevron-right "></i> Login</button>
									</form>
								</div>
						</div>
                    </ul>
				<?php }?>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
            
			<!-- navbar-sidebar -->
			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li>
							<a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
							
							<!-- navbar-sidebar-lv2 -->
							<ul class="nav nav-second-level">
								<li>
									<a href="flot.html">Flot Charts</a>
								</li>
								<li>
									<a href="morris.html">Morris.js Charts</a>
								</li>
							</ul>
							<!-- /.navbar-sidebar-lv2 -->
							
                        </li>
                    <?php if (!empty($this->session->userdata('id'))){ ?>
                    <li>
							<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
							
							<!-- navbar-sidebar-lv2 -->
							<ul class="nav nav-second-level">
								<li>
									<a href="flot.html">Flot Charts</a>
								</li>
								<li>
									<a href="morris.html">Morris.js Charts</a>
								</li>
							</ul>
							<!-- /.navbar-sidebar-lv2 -->
							
                        </li>
                    <?php }?>
                    </ul>    
                </div>
                <!-- /.navbar-sidebar -->
            </div>
	</nav>
</div>