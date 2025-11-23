<?php
// oofla_mainreg.php - ГЛАВНАЯ (с авторизацией)
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Вы должны авторизоваться";
    header('location: oofla_reg.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: oofla_reg.php");
    exit();
}

$page_title = "Орловская областная федерация лёгкой атлетики";
$active_page = 'main';
$is_auth = true;
include 'modern_header.php';
?>

<section class="mb-2">
    <h1 class="text-center mb-2">Добро пожаловать, <?php echo $_SESSION['username']; ?>!</h1>
    <h2 class="text-center mb-2">Последние новости</h2>
    
    <div class="news-grid">
        <?php
        include 'db_connect.php';
        
        $query = "SELECT * FROM Main";
        $result = mysqli_query($db, $query);
        
        while ($news = mysqli_fetch_array($result)) {
            echo '
            <div class="news-card">
                <img src="' . $news['photo'] . '" alt="' . $news['title'] . '" class="news-image">
                <div class="news-content">
                    <h3 class="news-title">' . $news['title'] . '</h3>
                    <p class="news-text">' . $news['news'] . '</p>
                    <a href="oofla_newsmainreg.php?id=' . $news['id'] . '" class="news-link">' . $news['button'] . '</a>
                </div>
            </div>';
        }
        ?>
    </div>
</section>

<?php include 'modern_footer.php'; ?>