<?php  
// errors.php
if (count($errors) > 0) : ?>
  <div style="background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
    <?php foreach ($errors as $error) : ?>
      <p style="margin: 0.25rem 0;"><?php echo $error ?></p>
    <?php endforeach ?>
  </div>
<?php endif ?>