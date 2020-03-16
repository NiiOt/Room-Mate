     <aside id="sidebar" class="sidebar c-overflow">
                <div class="s-profile">
                    <a href="#" data-ma-action="profile-menu-toggle">
                        <div class="sp-pic">
                            <?php echo "<img class='img-responsive' src='../img/demo/profile-pics/".$_SESSION['avatar'].".jpg' alt=''>";?> 
                        </div>

                        <div class="sp-info">
                            <?php echo strtoupper($_SESSION["username"]);?>

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                       <!--  <li>
                            <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                        </li> -->
                        <!-- <li>
                            <a href="#"><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                        </li> -->
                        <li>
                            <a href="settings.php"><i class="zmdi zmdi-settings"></i> Settings</a>
                        </li>
                        <li>
                            <a href="php/logout.php"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="home.php"><i class="zmdi zmdi-home"></i> Home</a>
                    </li>
                    <li class="sub-menu">
                        <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-chart"></i> Manage</a>

                        <ul>
                            <!-- <li><a href="tenants.php">Tenants</a></li> -->
                            <li><a href="apartments.php">Apartments</a></li>
                            <!-- <li><a href="dashboards/analytics.html">Agents</a></li> -->
                            <!-- <li><a href="landlord.php">LandLords</a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="sub-menu">
                        <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> Headers</a>

                        <ul>
                            <li><a href="textual-menu.html">Textual menu</a></li>
                            <li><a href="image-logo.html">Image logo</a></li>
                            <li><a href="top-mainmenu.html">Mainmenu on top</a></li>
                        </ul>
                    </li>
                    <li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li> -->
                    
                </ul>
            </aside>