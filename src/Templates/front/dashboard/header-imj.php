<?php
/**
 * Context:
 * @var callable|null $header_func
 * @var callable|null $sidebar_func
 */
if (!isset($header_func)) {
    $header_func = null;
}

if (!isset($sidebar_func)) {
    $sidebar_func = null;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <style>
    #loader {
      transition: all 0.3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000;
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden;
    }

    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }
      100% {
        -webkit-transform: scale(1.0);
        opacity: 0;
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0);
      }
      100% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
        opacity: 0;
      }
    }
  </style>
    <?php if ($header_func) {
        $header_func();
    } ?>
</head>
<body class="app">
<!-- @TOC -->
<!-- =================================================== -->
<!--
  + @Page Loader
  + @App Content
      - #Left Sidebar
          > $Sidebar Header
          > $Sidebar Menu

      - #Main
          > $Topbar
          > $App Screen Content
-->

<!-- @Page Loader -->
<!-- =================================================== -->
<div id='loader'>
  <div class="spinner"></div>
</div>

<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 300);
    });
</script>

<!-- @App Content -->
<!-- =================================================== -->
<div>
    <?php if ($sidebar_func) {
        $sidebar_func();
    } ?>
  <!-- #Main ============================ -->
  <div class="page-container">
    <!-- ### $Topbar ### -->
    <div class="header navbar">
      <div class="header-container">
        <ul class="nav-left">
          <li>
            <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
              <i class="ti-menu"></i>
            </a>
          </li>
        </ul>
        <ul class="nav-right">
          <li class="dropdown">
            <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
              <div class="peer mR-10">
                <img class="w-2r bdrs-50p" src="<?php echo esc_url(get_avatar_url(get_current_user_id())); ?>" alt="">
              </div>
              <div class="peer">
                <span class="fsz-sm c-grey-900"><?php ?></span>
              </div>
            </a>
            <ul class="dropdown-menu fsz-sm">
              <li role="separator" class="divider"></li>
              <li>
                <a href="<?php echo esc_url(wp_logout_url()); ?>" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                  <i class="ti-power-off mR-10"></i><span>로그아웃</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!-- ### $App Screen Content ### -->
    <main class='main-content bgc-grey-100'>
      <div id='mainContent'>
        <div class="full-container">
