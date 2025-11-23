<?php 
// oofla_reg1.php - РЕГИСТРАЦИЯ
include('server.php');  
$page_title = "Регистрация - Орловская областная федерация лёгкой атлетики";
$active_page = '';
$is_auth = false;
include 'modern_header.php';
?>

<section class="mb-2">
    <div class="form-container" style="max-width: 400px;">
        <h1 class="text-center mb-2">Регистрация</h1>
        
        <?php if (isset($errors) && count($errors) > 0): ?>
            <div style="background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <?php foreach ($errors as $error): ?>
                    <p style="margin: 0.25rem 0;"><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="oofla_reg1.php">
            <div class="form-group">
                <label class="form-label">Введите логин:</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Электронный адрес:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Введите пароль:</label>
                <input type="password" name="password_1" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Подтвердите пароль:</label>
                <input type="password" name="password_2" class="form-input" required>
            </div>

            <div class="form-actions">
                <button type="submit" name="reg_user" class="btn" style="width: 100%;">Зарегистрироваться</button>
            </div>
        </form>
        
        <div style="text-align: center; margin-top: 1rem;">
            <p>Уже зарегистрированы? <a href="oofla_reg.php" style="color: var(--primary); font-weight: 500;">Войти</a></p>
        </div>
    </div>
</section>

<?php include 'modern_footer.php'; ?>