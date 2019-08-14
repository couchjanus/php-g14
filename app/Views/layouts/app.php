<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once VIEWS.'/layouts/partials/_head.php'; ?>
</head>
<body>

  <div class="wrapper">
    <!-- Sidebar  -->
    <?php require_once VIEWS.'/layouts/partials/_sidebar.php'; ?>

    <!-- Page Content  -->
    <div id="content">
        <?php require_once VIEWS.'/layouts/partials/_nav.php'; ?>
        <?php include(VIEWS."/".$path); ?>
        <?php require_once VIEWS.'/layouts/partials/_footer.php'; ?>
    </div>

  </div>
  
  <div class="overlay"></div>
  <?php require_once VIEWS.'/layouts/partials/_templates.php'; ?>
  <?php require_once VIEWS.'/layouts/partials/shared/_scripts.php'; ?>
  
</body>
</html>
