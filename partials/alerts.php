<?php if (count($errors) > 0): ?>
  <div class="alert-con error" id="alert_con">
  	<?php foreach ($errors as $error): ?>
  	  <p><?php echo $error; ?></p>
  	<?php endforeach; ?>
    <i class='bx bx-x' onclick="closeAlert()"></i>
  </div>
<?php endif; ?>
