<?php
// modern_header.php - ИСПРАВЛЕННЫЙ
$page_title = $page_title ?? "Орловская областная федерация лёгкой атлетики";
$active_page = $active_page ?? '';
$is_auth = $is_auth ?? false;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/modern-style.css">
    <link rel="shortcut icon" href="/photo/favicon.ico">
    <title><?php echo $page_title; ?></title>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="<?php echo $is_auth ? 'oofla_mainreg.php' : 'oofla_main.php'; ?>">
                    <img src="/photo/logo.png" alt="Логотип">
                </a>
            </div>

            <nav class="nav-main">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="<?php echo $is_auth ? 'oofla_mainreg.php' : 'oofla_main.php'; ?>" 
                           class="nav-link <?php echo $active_page === 'main' ? 'active' : ''; ?>">
                            Главная
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?php echo $is_auth ? 'oofla_competreg.php' : 'oofla_compet.php'; ?>" 
                           class="nav-link <?php echo $active_page === 'compet' ? 'active' : ''; ?>">
                            Соревнования
                        </a>
                        <div class="dropdown-menu">
                            <a href="<?php echo $is_auth ? 'oofla_resultreg.php' : 'oofla_result.php'; ?>" class="dropdown-link">Результаты</a>
                            <a href="<?php echo $is_auth ? 'oofla_appreg.php' : 'oofla_reg.php'; ?>" class="dropdown-link">Подача заявки</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?php echo $is_auth ? 'oofla_federationreg.php' : 'oofla_federation.php'; ?>" 
                           class="nav-link <?php echo $active_page === 'federation' ? 'active' : ''; ?>">
                            Федерация
                        </a>
                        <div class="dropdown-menu">
                            <a href="<?php echo $is_auth ? 'oofla_federationreg.php' : 'oofla_federation.php'; ?>" class="dropdown-link">Сборная</a>
                            <a href="<?php echo $is_auth ? 'oofla_historyreg.php' : 'oofla_history.php'; ?>" class="dropdown-link">История</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $is_auth ? 'oofla_recordsreg.php' : 'oofla_reg.php'; ?>" 
                           class="nav-link <?php echo $active_page === 'records' ? 'active' : ''; ?>">
                            Записаться
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $is_auth ? 'oofla_askreg.php' : 'oofla_ask.php'; ?>" 
                           class="nav-link <?php echo $active_page === 'ask' ? 'active' : ''; ?>">
                            Задать вопрос
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="auth-buttons">
                <?php if ($is_auth): ?>
                    <a href="oofla_main.php?logout=1" class="btn">Выйти</a>
                <?php else: ?>
                    <a href="oofla_reg.php" class="btn">Вход на сайт</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="container">