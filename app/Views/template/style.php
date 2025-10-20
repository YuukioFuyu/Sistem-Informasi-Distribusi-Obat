<!--
    #------------------------------------    
    # Author: Bdtask Ltd
    # Author link: https://www.bdtask.com/
    # Dynamic style php file
    #------------------------------------    
-->

<?php 

    // query dynamic css from theme color setup table
    $dcss  = $dynamic_color;
 
    $font_one = (@$dcss->font_one?@$dcss->font_one:'Alegreya+Sans');
    $font_two = (@$dcss->font_two?@$dcss->font_two:'Libre+Franklin');

    if ($font_one=='Lato') {
        $font_one = $font_one.', sans-serif';
    }
    if ($font_two=='Ubuntu') {
        $font_two = $font_two.', sans-serif';
    }
?>


<style type="text/css">

    body {
  overflow-x: hidden;
  overflow-y: auto;
  background: <?php echo @$dcss->color_code;?>;
  font-size: <?php echo @$dcss->body_font_size;?>px;
  color:<?php echo @$dcss->content_text_color;?>;
  height: 100%;
  font-family: <?php echo $font_two?>
    }

    

@font-face {
  font-family: DS-DIGI;
  src: url(../fonts/ds_digital/DS-DIGI.TTF)
}

::-moz-selection {
  color: #fff;
  background: #37a000;
  text-shadow: none
}

::selection {
  color: #fff;
  background: #37a000;
  text-shadow: none
}

:focus {
  outline: 0
}

.h1>a,
.h2>a,
.h3>a,
.h4>a,
.h5>a,
.h6>a,
h1>a,
h2>a,
h3>a,
h4>a,
h5>a,
h6>a {
  color: inherit
}

a {
  color: #37a000;
  text-decoration: none
}

a:active,
a:focus,
a:hover {
  outline: 0;
  text-decoration: none;
  color: #72afd2;
  -webkit-transition: all .3s;
  transition: all .3s
}

table code {
  white-space: nowrap
}



.right {
  float: right!important
}

.sidebar-brand_text{
            color:<?php echo @$dcss->logo_text_color;?> !important;
}

.sidebar-bunker .profile-element .profile-text h6 {
    color: <?php echo @$dcss->logo_text_color;?> !important;
}

.header-tabs.nav-tabs .nav-link:not(.active) {
  color: #212529
}

.header-tabs.nav-tabs .nav-item.show .nav-link,
.header-tabs.nav-tabs .nav-link.active {
  color: #37a000;
  background-color: transparent;
  border-color: transparent transparent #37a000
}

.navbar-custom-menu .nav-link {
  color: #7a7a7a;
  font-size: 15px;
  display: flex;
  align-items: center;
  border-radius: .25rem;
  padding: .5rem 1rem;
}

.navbar-custom-menu .nav-link:hover {
  color: #37a000;
}

.navbar-custom-menu .nav-link .top-menu-icon {
  font-size: 19px;
  margin-right: 7px;
}


/*Navbar Dropdown*/

.navbar-custom-menu .dropdown.show .nav-link {
  background-color: #efefef;
}

.dropdown-menu {
  min-width: 192px;
  min-width: 12rem;
  padding: .7rem 0;
  border: 1px solid #eff2f7;
  box-shadow: 0 0 1.25rem rgba(31, 45, 61, .08)
}


.dropdown-item {
  color: #7a7a7a;
  font-size: 14px;
}




/*Navbar Collapse*/

@media (max-width: 1199.98px) {
  .navbar-collapse {
    position: fixed;
    top: 1rem;
    left: 1rem;
    height: auto;
    max-height: calc(100% - 2rem)!important;
    width: calc(100% - 2rem);
    background-color: #fff;
    border-radius: .375rem;
    box-shadow: 0 1.5rem 4rem rgba(22, 28, 45, .15);
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 20px;
    z-index: 9;
  }
  .navbar-collapse.collapsing,
  .navbar-collapse.show {
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    transition-property: opacity, transform, -webkit-transform;
    -webkit-transform-origin: top right;
    transform-origin: top right;
  }
  .navbar-collapse.show {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  .navbar-collapse.collapsing {
    opacity: 0;
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
  }
  .navbar-collapse .navbar-toggler {
    position: absolute;
    top: 10px;
    right: 10px;
    height: 30px;
    width: 30px;
  }
  .navbar-collapse .navbar-toggler span {
    position: absolute;
    display: block;
    width: 70%;
    height: 2px;
    opacity: 1;
    border-radius: 2px;
    background: #37a000;
  }
  .navbar-collapse .navbar-toggler span:nth-child(1) {
    -webkit-transform: rotate(135deg);
    -ms-transform: rotate(135deg);
    transform: rotate(135deg);
  }
  .navbar-collapse .navbar-toggler span:nth-child(2) {
    -webkit-transform: rotate(-135deg);
    -ms-transform: rotate(-135deg);
    transform: rotate(-135deg);
  }
}

.navbar-custom-menu.navbar {
  background: #fff;
  border-radius: 0;
  height: 65px;
  z-index: 9;
  border: 0;
  padding: 0 24px;
  padding: 0 1rem;
  -webkit-transition: all .3s;
  transition: all .3s;
  box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)
}

.navbar-custom-menu .navbar-icon {
  margin-left: auto;
}

.navbar-custom-menu .navbar-icon .navbar-nav .nav-link,
.navbar-toggler {
  position: relative;
  /*font-size: 23px;*/
  font-size: 21px;
  color: #494c57;
  padding: 7px;
  line-height: 1;
  background-color: #fff;
  height: 40px;
  width: 40px;
  text-align: center;
  margin: 0 3px;
  border-radius: .25rem;
  /*box-shadow: 0 0 35px 0 rgba(80, 80, 80, .15);*/
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid #ececec;
}

.navbar-toggler:hover,
.navbar-custom-menu .navbar-icon .navbar-nav .nav-link:hover,
.navbar-custom-menu .navbar-icon .navbar-nav .dropdown.show .nav-link {
  background-color: #efefef;
}

.sidebar-toggle-icon {
  display: block;
  position: relative;
  margin: 0;
  padding: 0;
  width: 28px;
  height: 28px;
  font-size: 0;
  text-indent: -9999px;
  cursor: pointer;
  margin-right: .5rem;
}

.sidebar-toggle-icon span {
  display: block;
  position: absolute;
  top: 13px;
  height: 2px;
  min-height: 1px;
  width: 100%;
  border-radius: 0;
  background: #37a000;
  border-radius: 3px;
}

.sidebar-toggle-icon span:after,
.sidebar-toggle-icon span:before {
  position: absolute;
  display: block;
  left: 0;
  width: 100%;
  height: 2px;
  min-height: 1px;
  content: "";
  border-radius: 0;
  -webkit-transition: all .4s ease;
  transition: all .4s ease;
  background: #37a000;
  border-radius: 3px;
}




.sidebar-bunker {
  background-color: <?php echo @$dcss->menubg_color;?>;
  border-right-width: 0
}


/*@media(min-width:767px) and (max-width: 991px){*/


/*.sidebar-mini .sidebar,*/

@media(min-width: 768px) {
  .sidebar-collapse .sidebar {
    margin-left: 0;
    min-width: 70px;
    max-width: 70px;
  }
  .sidebar-collapse_hover .sidebar {
    min-width: 250px;
    max-width: 250px;
  }
  .sidebar-collapse .sidebar-header .sidebar-brand .sidebar-brand_text,
  .sidebar-collapse .profile-element .profile-text,
  .sidebar-collapse .sidebar-form,
  .sidebar-collapse .sidebar-body .nav-label .nav-label_text,
  .sidebar-collapse.sidebar-collapse_hover .sidebar-body .nav-label .nav-label_ellipsis,
  .sidebar-collapse .metismenu .has-arrow::after,
  .sidebar-collapse .sidebar-nav ul li.mm-active .mm-show {
    display: none;
  }
  .sidebar-collapse.sidebar-collapse_hover .sidebar-header .sidebar-brand .sidebar-brand_text,
  .sidebar-collapse.sidebar-collapse_hover .profile-element .profile-text,
  .sidebar-collapse.sidebar-collapse_hover .sidebar-form,
  .sidebar-collapse.sidebar-collapse_hover .sidebar-body .nav-label .nav-label_text,
  .sidebar-collapse .sidebar-body .nav-label .nav-label_ellipsis,
  .sidebar-collapse.sidebar-collapse_hover .metismenu .has-arrow::after,
  .sidebar-collapse.sidebar-collapse_hover .sidebar-nav ul li.mm-active .mm-show {
    display: block;
  }
  .sidebar-collapsed .sidebar+.content-wrapper {
    margin-left: 0;
  }
}

.overlay {
  display: none;
  position: fixed;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, .7);
  z-index: 998;
  opacity: 0;
  -webkit-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out
}

@media(min-width:768px) {
  .sidebar.active {
    /*margin-left: -250px*/
  }
  /*    .sidebar-mini .sidebar.active{
            margin-left: 0;
            min-width: 250px;
            max-width: 250px;
    
        }*/
}

@media(max-width:767px) {
  .sidebar {
    position: fixed;
    top: 0;
    left: -250px;
    height: 100vh;
    z-index: 999;
    -webkit-transition: all .3s;
    transition: all .3s;
    overflow-y: scroll
  }
  .sidebar.active {
    left: 0
  }
  .overlay.active {
    display: block;
    opacity: 1
  }
}

.sidebar-header {
  -ms-flex-negative: 0;
  flex-shrink: 0;
  height: 65px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 0 20px
}

.sidebar-header .sidebar-brand {
  font-size: 28px;
  color: #212229;
  display: flex;
  align-items: center;
  line-height: 1;
}

.sidebar-header .sidebar-brand .sidebar-brand_text {
  color: #37a000;
  padding-left: 8px;
  -webkit-animation: .3s cubic-bezier(.25, .8, .25, 1) 0s normal forwards 1 fadein;
  animation: .3s cubic-bezier(.25, .8, .25, 1) 0s normal forwards 1 fadein;
}

@-webkit-keyframes fadein {
  from {
    -webkit-transform: translate3d(0, 6px, 0);
    transform: translate3d(0, 6px, 0);
    opacity: 0;
  }
  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes fadein {
  from {
    -webkit-transform: translate3d(0, 6px, 0);
    transform: translate3d(0, 6px, 0);
    opacity: 0;
  }
  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.sidebar-header .sidebar-brand .sidebar-brand_text span {
  color: #fff;
}

.sidebar-header .sidebar-brand .sidebar-brand_icon {
  height: 28px
}

.profile-element {
  padding: 20px 15px;
}

.profile-element .avatar {
  width: 40px;
  height: 40px;
  position: relative
}

.profile-element .avatar:after {
  content: '';
  position: absolute;
  bottom: 0;
  right: 3px;
  width: 6px;
  height: 6px;
  background-color: #969dab;
  box-shadow: 0 0 0 2px rgba(255, 255, 255, .95);
  border-radius: 100%
}

.profile-element .avatar.online:after {
  background-color: #3bb001
}

.profile-element .profile-text {
  margin-left: 12px
}

.sidebar-bunker .profile-element .profile-text h6 {
  color: #fff
}

.profile-element .profile-text span {
  display: block;
  color: #70737c;
  font-size: 13px;
  line-height: 15px
}

.sidebar-bunker .profile-element .profile-text span {
  color: #a5a9ad
}

.search {
  position: relative
}

.navbar-custom-menu .search {
  width: 230px;
  margin-left: 20px;
  display: none
}

@media(min-width:992px) {
  .navbar-custom-menu .search {
    display: block
  }
}

.sidebar-form {
  margin: 0 15px 20px
}

.search__text {
  width: 100%;
  height: 40px;
  height: 2.5rem;
  font-size: 15px;
  color: #7a7a7a;
  border-radius: 30px;
  padding-left: 40px;
  padding-left: 2.5rem;
  background-color: #f5f5f5;
  border: 1px solid #f5f5f5;
  -webkit-transition: background-color .3s, color .3s;
  transition: background-color .3s, color .3s
}

.sidebar-bunker .search__text {
  color: #a5a9ad;
  background-color: #1c1f22;
  border: 1px solid #5a626b;
  border-radius: 4px
}

.search__text:focus {
  background-color: #fff;
  border-color: #fff;
  outline: 0
}

.search__helper {
  position: absolute;
  left: 0;
  top: 0;
  font-size: 23px;
  height: 100%;
  width: 40px;
  width: 2.5rem;
  text-align: center;
  line-height: 40px;
  line-height: 2.5rem;
  cursor: pointer;
  color: #a6a6a6;
  z-index: 4;
  transition: color .3s, -webkit-transform .4s;
  -webkit-transition: color .3s, -webkit-transform .4s;
  transition: color .3s, transform .4s;
  transition: color .3s, transform .4s, -webkit-transform .4s
}

.search--focus .search__helper {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
  line-height: 40px;
  line-height: 2.5rem
}

.search--focus .search__helper:before {
  content: '\e01b'
}

.search-content {
  pointer-events: auto
}

.search-form {
  display: block;
  position: relative;
  z-index: 700;
  background: #fff;
  border-radius: .375rem;
  margin: auto
}

.search-form .icon-addon-text {
  padding: 12px 20px;
  padding: .75rem 1.25rem
}

.search-form .form-control {
  border: 0;
  height: 68px;
  color: #454545;
  padding-left: 0;
  font-size: 20px;
  font-size: 1.25rem
}

.search-form .form-control:focus {
  box-shadow: none
}

.search-suggestions {
  min-height: 150px;
  padding: 24px;
  padding: 1.5rem;
  background: #fff;
  margin: auto;
  border-radius: .375rem;
  position: relative;
  opacity: 0;
  -webkit-transition: opacity .3s;
  transition: opacity .3s;
  transition-delay: 0s;
  -webkit-transition-delay: .21s;
  transition-delay: .21s
}

.modal.show .search-suggestions {
  opacity: 1
}

.search-suggestions:before {
  background: #fff;
  box-shadow: none;
  content: "";
  display: block;
  height: 16px;
  width: 16px;
  left: 20px;
  position: absolute;
  bottom: 100%;
  -webkit-transform: rotate(-45deg) translateY(1rem);
  transform: rotate(-45deg) translateY(1rem);
  z-index: -5;
  border-radius: .2rem
}

.search-suggestions .list-unstyled .list-link {
  display: block;
  padding-top: 4.8px;
  padding-top: .3rem;
  padding-bottom: 4.8px;
  padding-bottom: .3rem;
  font-size: 15px;
  color: #9a9a9a
}

.search-suggestions .list-unstyled .list-link i {
  margin-right: 8px;
  margin-right: .5rem;
  vertical-align: middle
}

.search-suggestions .list-link span {
  font-weight: 600;
  color: #212529
}

.search-suggestions .list-link:hover span,
.search-suggestions .list-unstyled .list-link:hover {
  color: #37a000
}

@media(min-width:992px) {
  .sidebar-search .modal-lg,
  .sidebar-search .modal-xl {
    max-width: 765px
  }
}

.sidebar-body .nav-label {
  text-transform: uppercase;
  font-size: <?php echo @$dcss->menu_font_size;?>px;
  font-weight: 600;
  letter-spacing: .5px;
  color: <?php echo @$dcss->menu_font_color;?>;
  padding-bottom: 5px;
  padding: 12px 25px
}

.sidebar-body .nav-label .nav-label_ellipsis {
  font-size: <?php echo @$dcss->menu_font_size;?>px;
  color: <?php echo @$dcss->menu_font_color;?>;
  display: none;
}

.sidebar-bunker .sidebar-body .nav-label {
  color: <?php echo @$dcss->menu_font_color;?>
}

.sidebar-nav ul {
  margin: 0;
  padding: 0;
  list-style: none
}

.sidebar-nav ul li {
  padding: 0 15px;
  position: relative;
  white-space: nowrap
}

.sidebar-nav ul li a {
  font-weight: 600;
  font-size: <?php echo @$dcss->menu_font_size;?>px;
  color: <?php echo @$dcss->menu_font_color;?>;
  padding: 10px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-transition: .3s;
  transition: .3s;
  border-radius: .25rem;
  overflow: hidden;
  text-overflow: ellipsis
}

.sidebar-nav ul li a:hover {
  color: <?php echo @$dcss->menu_hover_color;?>;
}

.sidebar-nav ul li.mm-active a {
  color: <?php echo @$dcss->active_menu_color;?>;
  background-color: <?php echo @$dcss->active_menu_bgcolor;?>;
  box-shadow: 0 0 10px 1px <?php echo @$dcss->active_menu_bgcolor;?>
}

.sidebar-nav ul li .nav-second-level li {
  padding: 0
}

.sidebar-nav ul li .nav-second-level li a {
  padding-left: 45px;
  padding-top: 7px;
  padding-bottom: 7px;
  color: <?php echo @$dcss->menu_font_color;?>;
  background-color: transparent;
  box-shadow: none;
  font-weight: 500
}

.sidebar-nav ul li .nav-second-level li a:hover {
  color: <?php echo @$dcss->menu_hover_color;?>;
}

.sidebar-nav ul li.mm-active ul li.mm-active a {
  color: <?php echo @$dcss->active_menu_color;?>;
  font-weight: 600
}

.sidebar-nav ul li .nav-second-level li .nav-third-level li a {
  padding-left: 61px
}

.sidebar-nav ul li.mm-active .nav-second-level li.mm-active .nav-third-level li a {
  color: <?php echo @$dcss->menu_font_color;?>;
  font-weight: 500
}

.sidebar-nav ul li.mm-active .nav-second-level li.mm-active .nav-third-level li.mm-active a {
  color: <?php echo @$dcss->active_menu_color;?>;
  font-weight: 700
}

.sidebar-nav ul li.mm-active .nav-second-level li.mm-active .nav-third-level li.mm-active .nav-fourth-level li a {
  color: #a5a9ad;
  font-weight: 500;
  padding-left: 81px
}

.footer-content {
  margin-top: auto;
  padding: 15px 20px;
  font-size: <?php echo @$dcss->body_font_size;?>px;
  font-weight: 600;
  color: <?php echo @$dcss->content_text_color;?>;
  background-color: #fff;
  -ms-flex-negative: 0;
  flex-shrink: 0;
  box-shadow: 0 0 35px 0 rgba(154, 161, 171, .15)
}


.table {
    color: <?php echo @$dcss->content_text_color;?>;
}

.input-group-text {
  color: <?php echo @$dcss->content_text_color;?>;  
}

</style>