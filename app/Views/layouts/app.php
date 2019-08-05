<!DOCTYPE html>
<html lang="en">

<?php require_once VIEWS.'/layouts/partials/_head.php'; ?>

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
  
  <script src="/assets/js/all.min.js"></script>
  <script src="/assets/js/main.js"></script>  
  <script src="/assets/js/src.js"></script>
  
</body>
</html>
