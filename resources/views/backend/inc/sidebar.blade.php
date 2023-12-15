<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route("panel.index")}}" class="brand-link">
      <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="Secretdhorloger" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Secretdhorloger</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Alexander Pierce">
        </div>
        <div class="info">
          <a href="{{route("panel.index")}}" class="d-block">Admin</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route("panel.slider.index")}}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Carrousel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("panel.categorie.index")}}" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Catégories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("panel.product.index")}}" class="nav-link">
                <i class="nav-icon far fa-clock"></i>
               <p>
                Produits
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route("panel.sitesetting.index")}}" class="nav-link">
                <i class=" nav-icon fas fa-info-circle"></i>
               <p>
                Paramètres du site
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route("panel.order.index")}}" class="nav-link">
                <i class=" nav-icon fas fa-cubes"></i>
               <p>
                Commandes
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
