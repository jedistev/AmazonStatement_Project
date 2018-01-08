<!-- Navigation -->
<nav class="navbar navbar-expand navbar-dark" style="background-color: #2C3E50">  
    <a class="sidebar-toggle text-light mr-3" id="sidebarCollapse"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="<?php echo 'index.php'; ?>"><i class="fa fa-code-branch"></i>Amazon Settlement Project</a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#marketplace">Marketplace</a>
                    <a class="dropdown-item" href="#sku">SKU</a>
                    <a class="dropdown-item" href="#dashboard">Dashboard</a>
                    <a class="dropdown-item" href="#general">General</a>
                    <a class="dropdown-item" href="#about">About</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>



        
        
        
        
        
        
        
        
          