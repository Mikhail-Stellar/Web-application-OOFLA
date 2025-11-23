<?php 
// oofla_reg.php - ВХОД
include('server.php'); 
$page_title = "Вход на сайт - Орловская областная федерация лёгкой атлетики";
$active_page = '';
$is_auth = false;
include 'modern_header.php';
?>

<section class="mb-2">
    <div class="form-container" style="max-width: 400px;">
        <h1 class="text-center mb-2">Вход на сайт</h1>
        
        <?php if (isset($errors) && count($errors) > 0): ?>
            <div style="background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <?php foreach ($errors as $error): ?>
                    <p style="margin: 0.25rem 0;"><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
        
        <form action="oofla_reg.php" method="post">
            <div class="form-group">
                <label class="form-label">Логин:</label>
                <input type="text" name="username" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Пароль:</label>
                <input type="password" name="password" class="form-input" required>
            </div>

            <div class="form-actions">
                <button type="submit" name="login_user" class="btn" style="width: 100%;">Войти</button>
            </div>
        </form>
        
        <div style="text-align: center; margin-top: 1rem;">
            <p>Новый пользователь? <a href="oofla_reg1.php" style="color: var(--primary); font-weight: 500;">Регистрация</a></p>
        </div>
    </div>
</section>

<?php include 'modern_footer.php'; ?>