<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <button type="button" class="btn btn-primary">
            <span>Peculiar Shopaholic</span>
          </button>

          <button class="btn btn-primary d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/guestbook">GuestBook</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
          <?php if (Helper::isGuest()) :?>
          <a href="/login"><button type="button" id="sidebarCollapse" class="btn btn-primary">
            <span><i class="fas fa-user-plus"></i></span>
          </button></a>
          
          <?php else :?>
          <a href="/profile"><button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fas fa-address-card"></i>
          </button></a>
          
          <a href="/logout"><button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fas fa-sign-out-alt"></i>
          </button></a>
          <?php endif;?>
          
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fas fa-align-left"></i>
            <span><i class="fas fa-shopping-cart"></i></span>
          </button>
        </div>
      </nav>