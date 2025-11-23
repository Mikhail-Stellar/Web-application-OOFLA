<?php
// oofla_ask.php - ОБРАТНАЯ СВЯЗЬ (без авторизации)
$page_title = "Обратная связь - Орловская областная федерация лёгкой атлетики";
$active_page = 'ask';
$is_auth = false;
include 'modern_header.php';
?>

<section class="mb-2">
    <h1 class="text-center mb-2">Обратная связь</h1>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: start;">
        <div class="form-container">
            <form action="" method="POST">
                <div class="form-group">
                    <label class="form-label">ФИО:</label>
                    <input type="text" name="name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Номер телефона:</label>
                    <input type="tel" name="phone" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">E-mail:</label>
                    <input type="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Контактный адрес:</label>
                    <input type="text" name="addres" class="form-input">
                </div>

                <div class="form-group">
                    <label class="form-label">Сообщение:</label>
                    <textarea rows="5" name="message" class="form-input" required></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" name="formSubmit" class="btn">Отправить сообщение</button>
                    <button type="reset" class="btn btn-secondary">Сбросить данные</button>
                </div>
            </form>
        </div>

        <div>
            <div style="background: var(--background); padding: 2rem; border-radius: var(--radius); box-shadow: var(--shadow); margin-bottom: 2rem;">
                <h3 style="margin-bottom: 1rem; color: var(--text);">Контакты</h3>
                <p style="line-height: 1.8; color: var(--text);">
                    <strong>Адрес:</strong><br>
                    302020, г.Орёл, ул.Матросова, 5<br><br>
                    
                    <strong>Телефон/факс:</strong><br>
                    +7(4862) 42 87 37<br><br>
                    
                    <strong>Email:</strong><br>
                    info@fla57.ru
                </p>
            </div>
            
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Afe89195dce2dca48fb6dcbbb4e02ea5058e32f81283442a603a822baf487de5f&amp;source=constructor" 
                    width="100%" height="400" frameborder="0" style="border-radius: var(--radius);"></iframe>
        </div>
    </div>
</section>

<?php
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['addres']) && isset($_POST['message'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $addres = $_POST['addres'];
    $message = $_POST['message'];

    $db_host = "localhost"; 
    $db_user = "root"; 
    $db_password = ""; 
    $db_base = 'Kursovoy'; 

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        $db->exec("set names utf8");
        
        $data = array( 'name' => $name, 'phone' => $phone, 'email' => $email, 'addres' => $addres, 'message' => $message ); 
        
        $query = $db->prepare("INSERT INTO Ask values ('$name', '$phone', '$email', '$addres', '$message')");
        $query->execute($data);
        $result = true;
    } catch (PDOException $e) {
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
        echo '<div class="form-container" style="background: #d1fae5; border-color: #10b981;">';
        echo '<p style="color: #065f46; text-align: center; margin: 0;">Сообщение успешно отправлено! Ожидайте ответа на электронной почте</p>';
        echo '</div>';
    }
}
?>

<?php include 'modern_footer.php'; ?>