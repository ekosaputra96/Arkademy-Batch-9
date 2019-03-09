        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">User Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <form class="form-inline my-2 my-lg-0" action="../includes/logout.php" method="post">
                <button class="btn btn-primary my-2 my-sm-0 custom-button" type="submit" name="logout-submit">Logout</button>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php echo isset($dashboard) ? 'class= "active"': '' ?>><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                    <li <?php echo isset($createregion) ? 'class= "active"': '' ?>><a href="createregion.php"><i class="fa fa-fw fa-map-marker"> </i> Create Region</a></li>
                    <li <?php echo isset($regions) ? 'class= "active"': '' ?>><a href="regions.php"><i class="fa fa-fw fa-sitemap" aria-hidden="true"></i> Regions </a>
                    </li>
                    <li <?php echo isset($person) ? 'class= "active"': '' ?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-user"></i> Person <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="person.php">Show All Person</a>
                            </li>
                            <li>
                                <a href="person.php?status=add">Add A Person</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo isset($population) ? 'class= "active"': '' ?>><a href="population.php"><i class="fa fa-fw fa-edit"></i> Population Data</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>