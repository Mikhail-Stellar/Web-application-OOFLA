<?php
// modern_footer.php
$is_auth = $is_auth ?? false;
?>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-section">
                <h3 class="footer-title">О нас</h3>
                <p>
                    Региональная общественная организация<br>
                    «Орловская областная федерация легкой атлетики»<br>
                    создана и официально зарегистрирована Управлением<br>
                    Министерства юстиции РФ по Орловской области в<br>
                    2011 году. Является региональным представителем<br>
                    Всероссийской федерации легкой атлетики.<br><br>
                    <a href="<?php echo $is_auth ? 'oofla_historyreg.php' : 'oofla_history.php'; ?>" class="footer-link">Подробнее...</a>
                </p>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-title">Контакты</h3>
                <p>
                    Адрес: 302020, г.Орёл, ул.Матросова, 5<br>
                    Телефон/факс: +7(4862) 42 87 37<br>
                    Email: info@fla57.ru<br>
                </p>
            </div>
            
            <div class="footer-section">
                <h3 class="footer-title">Соревнования</h3>
                <p>
                    <a href="<?php echo $is_auth ? 'oofla_competreg.php' : 'oofla_compet.php'; ?>" class="footer-link">Календарь</a><br>
                    <a href="<?php echo $is_auth ? 'oofla_appreg.php' : 'oofla_reg.php'; ?>" class="footer-link">Подача заявки</a><br>
                </p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>Copyright © 2025 - Орловская областная федерация легкой атлетики</p>
        </div>
    </footer>
</body>
</html>