<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once VIEWS.'/layouts/partials/_head.php'; ?>
    <?php require_once VIEWS.'/layouts/partials/admin/_styles.php'; ?>
</head>
<body>
    <?php require_once VIEWS.'/layouts/partials/admin/_nav.php'; ?>
  <div class="container-fluid">
    <div class="row">
        <!-- Sidebar  -->
        <?php require_once VIEWS.'/layouts/partials/admin/_sidebar.php'; ?>

        <!-- Page Content  -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            <?php require_once VIEWS.'/layouts/partials/admin/_toolbox.php'; ?>
            <?php include(VIEWS."/".$path); ?>
        
        </main>
    </div>
  </div>

  <?php require_once VIEWS.'/layouts/partials/shared/_scripts.php'; ?>
  
</body>
</html>
