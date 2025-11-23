<?php
// oofla_federationreg.php - СБОРНАЯ (с авторизацией)
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Вы должны авторизоваться";
    header('location: oofla_reg.php');
    exit();
}

include 'db_connect.php';

$page_title = "Сборная команда - Орловская областная федерация лёгкой атлетики";
$active_page = 'federation';
$is_auth = true;
include 'modern_header.php';
?>

<section class="mb-2">
    <h1 class="text-center mb-2">Спортивная сборная команда Орловской области</h1>
    
    <div class="team-grid">
        <?php
        $query = "SELECT * FROM Team LIMIT 15";
        $result = mysqli_query($db, $query);
        
        while ($athlete = mysqli_fetch_array($result)) {
            echo '
            <div class="team-card">
                <img src="' . $athlete['photo'] . '" alt="' . $athlete['name'] . '" class="team-image">
                <div class="team-info">
                    <span class="team-name">' . $athlete['name'] . '</span><br>
                    ' . $athlete['distance'] . '
                </div>
            </div>';
        }
        ?>
    </div>
</section>

<?php include 'modern_footer.php'; ?>