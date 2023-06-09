<template>
        <div class="sidebar">
      <div class="sidebar-header">
        <div>
          <a href="../index.html" class="sidebar-logo"><span>LaravelGenies</span></a>
          <small class="sidebar-logo-headline">Project Manager</small>
        </div>
      </div><!-- sidebar-header -->
      <div id="dpSidebarBody" class="sidebar-body">
        <ul class="nav nav-sidebar">
          <li class="nav-label"><label class="content-label">Template Pages</label></li>
          <li class="nav-item" v-for="(menuItem, i,) in menu" :key="i">
            <router-link :to="menuItem.route" :class="'nav-link ' + (menuItem.subMenu ? 'with-sub ' : '')" exact active-class=" active "><i data-feather="box"></i> {{ menuItem.title }}</router-link>
            <!-- <a  href="" :class="'nav-link ' + (menuItem.subMenu ? 'with-sub' : '')"><i data-feather="box"></i> {{ menuItem.title }}</a> -->
            <nav v-if="menuItem.subMenu" class="nav nav-sub">
              <a v-for="(itm, i) in menuItem.subMenu" href="../pages/dashboard-one.html" class="nav-sub-link">{{ itm.title }}</a>
            </nav>
            <div v-if="menuItem.subMenu" class="">

            </div>
          </li>

          <!-- <li class="nav-item"><a href="../pages/themes.html" class="nav-link"> <i data-feather="box"></i> Themes</a></li> -->
         
        </ul>


        


      </div><!-- sidebar-body -->
    </div><!-- sidebar -->

    <div class="content">
      <div class="header">
        <div class="header-left">
          <a href="" class="burger-menu"><i data-feather="menu"></i></a>

          <div class="header-search">
            <i data-feather="search"></i>
            <input type="search" class="form-control" placeholder="What are you looking for?">
          </div><!-- header-search -->
        </div><!-- header-left -->

        <div class="header-right">
          <a href="" class="header-help-link"><i data-feather="help-circle"></i></a>
          <div class="dropdown dropdown-notification">
            <a href="" class="dropdown-link new" data-toggle="dropdown"><i data-feather="bell"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-menu-header">
                <h6>Notifications</h6>
                <a href=""><i data-feather="more-vertical"></i></a>
              </div><!-- dropdown-menu-header -->
              <div class="dropdown-menu-body">
                <a href="" class="dropdown-item">
                  <div class="avatar"><span class="avatar-initial rounded-circle text-primary bg-primary-light">s</span></div>
                  <div class="dropdown-item-body">
                    <p><strong>Socrates Itumay</strong> marked the task as completed.</p>
                    <span>5 hours ago</span>
                  </div>
                </a>
                <a href="" class="dropdown-item">
                  <div class="avatar"><span class="avatar-initial rounded-circle tx-pink bg-pink-light">r</span></div>
                  <div class="dropdown-item-body">
                    <p><strong>Reynante Labares</strong> marked the task as incomplete.</p>
                    <span>8 hours ago</span>
                  </div>
                </a>
                <a href="" class="dropdown-item">
                  <div class="avatar"><span class="avatar-initial rounded-circle tx-success bg-success-light">d</span></div>
                  <div class="dropdown-item-body">
                    <p><strong>Dyanne Aceron</strong> responded to your comment on this <strong>post</strong>.</p>
                    <span>a day ago</span>
                  </div>
                </a>
                <a href="" class="dropdown-item">
                  <div class="avatar"><span class="avatar-initial rounded-circle tx-indigo bg-indigo-light">k</span></div>
                  <div class="dropdown-item-body">
                    <p><strong>Kirby Avendula</strong> marked the task as incomplete.</p>
                    <span>2 days ago</span>
                  </div>
                </a>
              </div><!-- dropdown-menu-body -->
              <div class="dropdown-menu-footer">
                <a href="">View All Notifications</a>
              </div>
            </div><!-- dropdown-menu -->
          </div>
          <div class="dropdown dropdown-loggeduser">
            <a href="" class="dropdown-link" data-toggle="dropdown">
              <div class="avatar avatar-sm">
                <img src="http://themepixels.me/demo/cassie/assets/img/img1.jpg" class="rounded-circle" alt="">
              </div><!-- avatar -->
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-menu-header">
                <div class="media align-items-center">
                  <div class="avatar">
                    <img src="http://themepixels.me/demo/cassie/assets/img/img1.jpg" class="rounded-circle" alt="">
                  </div><!-- avatar -->
                  <div class="media-body mg-l-10">
                    <h6>Louise Kate Lumaad</h6>
                    <span>Administrator</span>
                  </div>
                </div><!-- media -->
              </div>
              <div class="dropdown-menu-body">
                <a href="" class="dropdown-item"><i data-feather="user"></i> View Profile</a>
                <a href="" class="dropdown-item"><i data-feather="edit-2"></i> Edit Profile</a>
                <a href="" class="dropdown-item"><i data-feather="briefcase"></i> Account Settings</a>
                <a href="" class="dropdown-item"><i data-feather="shield"></i> Privacy Settings</a>
                <a href="" class="dropdown-item"><i data-feather="log-out"></i> Sign Out</a>
              </div>
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- header-right -->
      </div><!-- header -->
      <div class="content-body content-body-components">
        

        <slot></slot>


      </div><!-- content-body -->
    </div><!-- content -->



</template>

<script>
export default {
    // setup: () => ({
    //     title: 'How To Install Vue 3 in Laravel 8 From Scratch'
    // }),
    data(){
        return {
            name: 'Layout',
            menu: [
              {title: 'Projects', icon: 'home', route: '/projects'},
              {title: 'Developers', icon: 'home', route: '/developers'},
            ]
        }
    },
}
</script>