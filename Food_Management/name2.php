
<header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href=""><?php include("title.php");?></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                                <a class="nav-link" href="applyfood.php">Home</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="foodlist.php">Food List</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="delivery.php">Food Delivery</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="feed.php">Feedback</a>
                            </li>
                            

                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <li>
                            &ensp;&ensp;&ensp;&ensp;
                            <a class="navbar-brand" href="#">Welcome <h6 style="color:goldenrod"><?php echo $username;?></h6></a>

                            </li>


                        </ul>
                    </div>
                </nav>
            </div>
        </header>
