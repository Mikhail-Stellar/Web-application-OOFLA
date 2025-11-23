<?php
// oofla_newsmainreg.php - ПОЛНАЯ НОВОСТЬ (с авторизацией) - ИСПРАВЛЕННЫЙ
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Вы должны авторизоваться";
    header('location: oofla_reg.php');
    exit();
}

include 'db_connect.php';

$page_title = "Новость - Орловская областная федерация лёгкой атлетики";
$active_page = 'main';
$is_auth = true;
include 'modern_header.php';
?>

<section class="mb-2">
    <?php
    if(isset($_GET['id'])){
        $result = mysqli_query($db, "SELECT * FROM Main WHERE `id` = ".$_GET['id']."");
        $news = mysqli_fetch_array($result);

        echo '<div style="max-width: 1000px; margin: 0 auto;">';
        echo '<div style="background: var(--background); border-radius: var(--radius); box-shadow: var(--shadow-lg); padding: 3rem; border: 1px solid var(--border);">';
        echo '<h1 class="text-center mb-2">'.$news['title'].'</h1>';            
        echo '<div style="line-height: 1.8; color: var(--text); font-size: 1.1rem;">';
        
        if ($news['photo'] != ''){
            echo '<img src="'.$news['photo'].'" style="width: 100%; max-width: 800px; height: auto; border-radius: var(--radius); margin: 0 auto 2rem; display: block;">';
        }
        
        // Используем nl2br для правильного отображения переносов строк
        $news_content = nl2br($news['new']);
        echo '<div style="text-align: justify;">' . $news_content . '</div>'; 	
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div style="max-width: 1000px; margin: 0 auto;">';
        echo '<div style="background: var(--background); border-radius: var(--radius); box-shadow: var(--shadow-lg); padding: 2rem; border: 1px solid var(--border);">';
        echo '<p class="text-center" style="font-size: 1.2rem; color: var(--text-light);">Новость не найдена</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</section>

<?php include 'modern_footer.php'; ?>