<?php
require realpath(__dir__ . '/parts/header.php');
?>

<title>Home</title>
</head>

<body>
    <header>
        <?php  
        // if session role = admin
        // require PUBLIC_PATH . 'html/parts/header_admin.php';
        // else if session role = sales
        // require PUBLIC_PATH . 'html/parts/header_sales.php';

        //etc.

        
        ?>
    </header>
    <main-content>
        <div class="login">
            <div class="container">
                <h1 class="text-center">Login</h1>

                <form action="">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <input type="submit" name="login" value="login">
                </form>
            </div>
        </div>
    </main-content>

</body>
</html>
