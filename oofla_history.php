<?php
// oofla_history.php - ИСТОРИЯ (без авторизации)
include 'db_connect.php';

$page_title = "История федерации - Орловская областная федерация лёгкой атлетики";
$active_page = 'federation';
$is_auth = false;
include 'modern_header.php';
?>

<section class="mb-2">
    <h1 class="text-center mb-2">История федерации</h1>
    
    <div style="max-width: 1000px; margin: 0 auto;">
        <div style="background: var(--background); border-radius: var(--radius); box-shadow: var(--shadow-lg); padding: 3rem; border: 1px solid var(--border);">
            <?php
            $query = "SELECT * FROM History";
            $result = mysqli_query($db, $query);
            
            while ($history = mysqli_fetch_array($result)) {
                echo '<div style="margin-bottom: 2.5rem;">';
                // Заменяем переносы строк на HTML теги
                $formatted_text = nl2br($history['txt']);
                echo '<div style="line-height: 1.8; color: var(--text); font-size: 1.1rem; text-align: justify;">' . $formatted_text . '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<?php include 'modern_footer.php'; ?>