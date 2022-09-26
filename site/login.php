<?php
    session_start();

    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>

<?php
    include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>
                The Clann
            </header>

            <form action="#">
                <div class="error-text"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="email@email.com">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" value="Start Chatting">
                </div>

            </form>
            <div class="link">Not signed up yet? <a href="./index.php">Signup here</a></div>
        </section>
    </div>

    <script src="./scripts/toggle.js"></script>
    <script src="./scripts/login.js"></script>

</body>

</html>