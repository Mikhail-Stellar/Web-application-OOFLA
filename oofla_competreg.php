<?php
// oofla_competreg.php - СОРЕВНОВАНИЯ (с авторизацией)
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Вы должны авторизоваться";
    header('location: oofla_reg.php');
    exit();
}

include 'db_connect.php';

$page_title = "Календарь мероприятий - Орловская областная федерация лёгкой атлетики";
$active_page = 'compet';
$is_auth = true;
include 'modern_header.php';
?>

<section class="mb-2">
    <h1 class="text-center mb-2">Календарь мероприятий</h1>
    
    <div class="form-container" style="max-width: 800px;">
        <?php
        $query = "SELECT * FROM Competition";
        $result = mysqli_query($db, $query);
        
        while ($competition = mysqli_fetch_array($result)) {
            echo '<div style="padding: 1rem; border-bottom: 1px solid var(--border);">';
            // ИСПРАВЛЕНО: убрал footer-link, добавил нормальные стили
            echo '<a href="' . $competition['link'] . '" style="color: var(--primary); font-size: 1.1rem; text-decoration: none; font-weight: 500; transition: color 0.3s ease;">';
            echo $competition['txt'];
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<?php include 'modern_footer.php'; ?>