    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="index.html" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Admin Area</label>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Products</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ Route('createproduct') }}" class="sub-link">Add Product</a></li>
            <li class="sub-item"><a href="{{ Route('manage') }}" class="sub-link">Manage Product</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Categories</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ Route('catmanage') }}" class="sub-link">Manage Categories</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Sub-Categories</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ Route('subcategorycreate') }}" class="sub-link">Add Sub-Categories</a></li>
            <li class="sub-item"><a href="{{ Route('subcategorymanage') }}" class="sub-link">Manage Sub-Categories</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Items</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ Route('item.create') }}" class="sub-link">Add Item</a></li>
            <li class="sub-item"><a href="{{ Route('item.manage') }}" class="sub-link">Manage Manage</a></li>
          </ul>
        </li>
      </ul><!-- br-sideleft-menu -->
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->