<?php
// oofla_recordsreg.php - ЗАПИСЬ НА ТРЕНИРОВКИ
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

$page_title = "Запись на тренировки - Орловская областная федерация лёгкой атлетики";
$active_page = 'records';
$is_auth = true;
include 'modern_header.php';
?>

<section class="mb-2">
    <h1 class="text-center mb-2">Запись на тренировки</h1>
    
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label class="form-label">Выбор спортивной школы:</label>
                <select name="school" class="form-input form-select" required>
                    <option value="СШОР №1">СШОР №1</option>
                    <option value="СШОР №2">СШОР №2</option>
                    <option value="ДЮСШ №4">ДЮСШ №4</option>
                    <option value="Олимп">Олимп</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Номер телефона:</label>
                <input type="tel" name="phone" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Электронный адрес:</label>
                <input type="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Желаемый вид:</label>
                <select name="view" class="form-input form-select" required>
                    <option value="Спринт">Спринт</option>
                    <option value="Средние дистанции">Средние дистанции</option>
                    <option value="Дальние дистанции">Дальние дистанции</option>
                    <option value="Прыжки">Прыжки</option>
                    <option value="Технический виды">Технические виды</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Паспорт:</label>
                <input type="file" name="passport" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Допуск врача:</label>
                <input type="file" name="med" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Заявление:</label>
                <input type="file" name="dec" class="form-input">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Подать заявку</button>
                <button type="reset" class="btn btn-secondary">Очистить форму</button>
            </div>
        </form>
    </div>
</section>

<?php
if (isset($_POST['school']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['view']) 
    && isset($_POST['passport']) && isset($_POST['med']) && isset($_POST['dec'])){

    $school = $_POST['school'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $view = $_POST['view'];
    $passport = $_POST['passport'];
    $med = $_POST['med'];
    $dec = $_POST['dec'];

    $db_host = "localhost"; 
    $db_user = "root"; 
    $db_password = ""; 
    $db_base = 'Kursovoy'; 

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        $db->exec("set names utf8");
        
        $data = array('school' => $school, 'phone' => $phone, 'email' => $email, 'view' => $view,
        'passport' => $passport, 'med' => $med, 'dec' => $dec); 
        
        $query = $db->prepare("INSERT INTO App1 values ('$school', '$phone', '$email', '$view',
        '$passport', '$med', '$dec')");
        $query->execute($data);
        $result = true;
    } catch (PDOException $e) {
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
        echo '<div class="form-container" style="background: #d1fae5; border-color: #10b981;">';
        echo '<p style="color: #065f46; text-align: center; margin: 0;">Заявка успешно отправлена!</p>';
        echo '</div>';
    }
}
?>

<?php include 'modern_footer.php'; ?>