<?php
session_start();
if (!isset($_SESSION["email"]))
    header("location: login.php");
?>
<!doctype html>
<html lang="en">

<?php
include("./templates/header.php");
?>

<body>
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <?php
        include("./templates/dashboard_header.php");

        include("./templates/nav_left_sidebar.php");

        include("./rotas.php");
        ?>
        <!-- ============================================================== -->

    </div>
    <?php
    include("./templates/footer.php");
    ?>
</body>

</html>