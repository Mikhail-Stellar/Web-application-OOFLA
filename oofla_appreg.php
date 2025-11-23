<?php
// oofla_appreg.php - ПОДАЧА ЗАЯВКИ
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

$page_title = "Подача заявки - Орловская областная федерация лёгкой атлетики";
$active_page = 'compet';
$is_auth = true;
include 'modern_header.php';
?>

<section class="mb-2">
    <h1 class="text-center mb-2">Подача заявки на соревнования</h1>
    
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label class="form-label">Фамилия и имя:</label>
                <input type="text" name="name" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Пол:</label>
                <div style="display: flex; gap: 2rem; margin-top: 0.5rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="radio" name="gender" value="Мужской" required> Мужской
                    </label>
                    <label style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="radio" name="gender" value="Женский"> Женский
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Дата рождения:</label>
                <input type="date" name="birthday" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Разряд:</label>
                <select name="rank" class="form-input form-select" required>
                    <option value="MCMK">МСМК</option>
                    <option value="MC">МС</option>
                    <option value="KMC">КМС</option>
                    <option value="1 взрослый">1 взрослый</option>
                    <option value="2 взрослый">2 взрослый</option>
                    <option value="3 взрослый">3 взрослый</option>
                    <option value="1 юношеский">1 юн.</option>
                    <option value="2 юношеский">2 юн.</option>
                    <option value="3 юношеский">3 юн.</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Нагрудный номер:</label>
                <input type="text" name="number" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Вид программы:</label>
                <select name="view" class="form-input form-select" required>
                    <option value="бег 60м">Бег 60м</option>
                    <option value="бег 200м">Бег 200м</option>
                    <option value="бег 400м">Бег 400м</option>
                    <option value="бег 800м">Бег 800м</option>
                    <option value="бег 1500м">Бег 1500м</option>
                    <option value="бег 3000м">Бег 3000м</option>
                    <option value="бег 60м с/б">Бег 60м с/б</option>
                    <option value="прыжок в длину">Прыжок в длину</option>
                    <option value="тройной прыжок">Тройной прыжок</option>
                    <option value="прыжок в высоту">Прыжок в высоту</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Организация:</label>
                <input type="text" name="school" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">ФИО тренера:</label>
                <input type="text" name="trainer" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Допуск врача:</label>
                <input type="file" name="file" accept=".jpg,.jpeg,.png" class="form-input">
            </div>

            <div class="form-actions">
                <button type="submit" name="formSubmit" class="btn">Подать заявку</button>
                <button type="reset" class="btn btn-secondary">Очистить форму</button>
            </div>
        </form>
    </div>
</section>

<?php
if (isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['birthday']) && isset($_POST['rank']) 
    && isset($_POST['number']) && isset($_POST['view']) && isset($_POST['school']) && isset($_POST['trainer'])) {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $rank = $_POST['rank'];
    $number = $_POST['number'];
    $view = $_POST['view'];
    $school = $_POST['school'];
    $trainer = $_POST['trainer'];
    $file = $_POST['file'] ?? '';

    $db_host = "localhost"; 
    $db_user = "root"; 
    $db_password = ""; 
    $db_base = 'Kursovoy'; 

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        $db->exec("set names utf8");    
        
        $data = array('name' => $name, 'gender' => $gender, 'birthday' => $birthday, 'rank' => $rank,
        'number' => $number, 'view' => $view, 'school' => $school, 'trainer' => $trainer, 'file' => $file); 
        
        $query = $db->prepare("INSERT INTO App values ('$name', '$gender', '$birthday', '$rank', '$number',
         '$view', '$school', '$trainer', '$file')");
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