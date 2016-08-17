<?php

/* AdBoxBundle:Admin:login.html.twig */
class __TwigTemplate_c030e7bc9c79e4db5d360441a06190d26da347af086f1697fcde0a18a1a9c6d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_07de8a13593af8fb088a6287f2bf139ca3bba6f05d46c1770ab242452be3d934 = $this->env->getExtension("native_profiler");
        $__internal_07de8a13593af8fb088a6287f2bf139ca3bba6f05d46c1770ab242452be3d934->enter($__internal_07de8a13593af8fb088a6287f2bf139ca3bba6f05d46c1770ab242452be3d934_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AdBoxBundle:Admin:login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html class=\"no-js css-menubar\" lang=\"en\">

<!-- Mirrored from getbootstrapadmin.com/remark/material/center/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2016 10:39:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" /><!-- /Added by HTTrack -->
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui\">
  <meta name=\"description\" content=\"bootstrap material admin template\">
  <meta name=\"author\" content=\"\">

  <title>ADBox</title>

  <link rel=\"apple-touch-icon\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/images/apple-touch-icon.png"), "html", null, true);
        echo "\">
  <link rel=\"shortcut icon\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/images/favicon.ico"), "html", null, true);
        echo "\">

  <!-- Stylesheets -->
  <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/css/bootstrap.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/css/bootstrap-extend.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/css/site.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">

  <!-- Skin tools (demo site only) -->
  <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/css/skintools.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/sections/skintools.min.js"), "html", null, true);
        echo "\"></script>

  <!-- Plugins -->
  <link rel=\"stylesheet\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/animsition/animsition.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/switchery/switchery.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/intro-js/introjs.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/waves/waves.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">

  <!-- Page -->
  <link rel=\"stylesheet\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/examples/css/pages/login-v2.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">

  <!-- Fonts -->
  <link rel=\"stylesheet\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/fonts/material-design/material-design.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0"), "html", null, true);
        echo "\">

  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700'>


  <!--[if lt IE 9]>
    <script src=\"../../global/vendor/html5shiv/html5shiv.min.js\"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src=\"../../global/vendor/media-match/media.match.min.js\"></script>
    <script src=\"../../global/vendor/respond/respond.min.js\"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/modernizr/modernizr.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/breakpoints/breakpoints.min.js"), "html", null, true);
        echo "\"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class=\"page-login-v2 layout-full page-dark\">
  <!--[if lt IE 8]>
        <p class=\"browserupgrade\">You are using an <strong>outdated</strong> browser. Please <a href=\"http://browsehappy.com/\">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class=\"page animsition\" data-animsition-in=\"fade-in\" data-animsition-out=\"fade-out\">
    <div class=\"page-content\">
      <div class=\"page-brand-info\">
        <div class=\"brand\">
          <img class=\"brand-img\" src=\"../assets/images/logo%402x.png\" alt=\"...\">
          <h2 class=\"brand-text font-size-40\"></h2>
        </div>
        
      </div>

      <div class=\"page-login-main\">
        <div class=\"brand visible-xs\">
          <img class=\"brand-img\" src=\"../assets/images/logo%402x.png\" alt=\"...\">
          <h3 class=\"brand-text font-size-40\"></h3>
        </div>
        <h3 class=\"font-size-24\">Sign In</h3>
       

        <form method=\"post\" action=\"http://getbootstrapadmin.com/remark/material/center/pages/login-v2.html\" autocomplete=\"off\">
          <div class=\"form-group form-material floating\">
            <input type=\"email\" class=\"form-control empty\" id=\"inputEmail\" name=\"email\">
            <label class=\"floating-label\" for=\"inputEmail\">Email</label>
          </div>
          <div class=\"form-group form-material floating\">
            <input type=\"password\" class=\"form-control empty\" id=\"inputPassword\" name=\"password\">
            <label class=\"floating-label\" for=\"inputPassword\">Password</label>
          </div>
          <div class=\"form-group clearfix\">
            <div class=\"checkbox-custom checkbox-inline checkbox-primary pull-left\">
              <input type=\"checkbox\" id=\"remember\" name=\"checkbox\">
              <label for=\"inputCheckbox\">Remember me</label>
            </div>
            <a class=\"pull-right\" href=\"forgot-password.html\">Forgot password?</a>
          </div>
          <button type=\"submit\" class=\"btn btn-primary btn-block\">Sign in</button>
        </form>

        <p>No account? <a href=\"";
        // line 106
        echo $this->env->getExtension('routing')->getPath("register_page");
        echo "\">Sign Up</a></p>

        <footer class=\"page-copyright\">
         
          <div class=\"social\">
            <a class=\"btn btn-icon btn-round social-twitter\" href=\"javascript:void(0)\">
              <i class=\"icon bd-twitter\" aria-hidden=\"true\"></i>
            </a>
            <a class=\"btn btn-icon btn-round social-facebook\" href=\"javascript:void(0)\">
              <i class=\"icon bd-facebook\" aria-hidden=\"true\"></i>
            </a>
            <a class=\"btn btn-icon btn-round social-google-plus\" href=\"javascript:void(0)\">
              <i class=\"icon bd-google-plus\" aria-hidden=\"true\"></i>
            </a>
          </div>
        </footer>
      </div>

    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/bootstrap/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/animsition/animsition.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/asscroll/jquery-asScroll.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("/global/vendor/mousewheel/jquery.mousewheel.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/asscrollable/jquery.asScrollable.all.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/ashoverscroll/jquery-asHoverScroll.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/waves/waves.min.js"), "html", null, true);
        echo "\"></script>

  <!-- Plugins -->
  <script src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/switchery/switchery.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/intro-js/intro.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/screenfull/screenfull.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/slidepanel/jquery-slidePanel.min.js"), "html", null, true);
        echo "\"></script>

  <!-- Plugins For This Page -->
  <script src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/vendor/jquery-placeholder/jquery.placeholder.min.js"), "html", null, true);
        echo "\"></script>

  <!-- Scripts -->
  <script src=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/core.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/site.min.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/sections/menu.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/sections/menubar.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/sections/sidebar.min.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 156
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/configs/config-colors.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("assets/js/configs/config-tour.min.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/components/asscrollable.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/components/animsition.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/components/slidepanel.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/components/switchery.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/components/tabs.min.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/components/jquery-placeholder.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("global/js/components/material.min.js"), "html", null, true);
        echo "\"></script>


  <script>
    (function(document, window, \$) {
      'use strict';

      var Site = window.Site;
      \$(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'http://www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>
</body>


<!-- Mirrored from getbootstrapadmin.com/remark/material/center/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2016 10:39:17 GMT -->
</html>";
        
        $__internal_07de8a13593af8fb088a6287f2bf139ca3bba6f05d46c1770ab242452be3d934->leave($__internal_07de8a13593af8fb088a6287f2bf139ca3bba6f05d46c1770ab242452be3d934_prof);

    }

    public function getTemplateName()
    {
        return "AdBoxBundle:Admin:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 166,  323 => 165,  318 => 163,  314 => 162,  310 => 161,  306 => 160,  302 => 159,  297 => 157,  293 => 156,  288 => 154,  284 => 153,  280 => 152,  275 => 150,  271 => 149,  265 => 146,  259 => 143,  255 => 142,  251 => 141,  247 => 140,  241 => 137,  237 => 136,  233 => 135,  229 => 134,  225 => 133,  221 => 132,  217 => 131,  213 => 130,  186 => 106,  134 => 57,  130 => 56,  112 => 41,  108 => 40,  102 => 37,  96 => 34,  92 => 33,  88 => 32,  84 => 31,  80 => 30,  76 => 29,  72 => 28,  66 => 25,  62 => 24,  56 => 21,  52 => 20,  48 => 19,  42 => 16,  38 => 15,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html class="no-js css-menubar" lang="en">*/
/* */
/* <!-- Mirrored from getbootstrapadmin.com/remark/material/center/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2016 10:39:16 GMT -->*/
/* <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->*/
/* <head>*/
/*   <meta charset="utf-8">*/
/*   <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">*/
/*   <meta name="description" content="bootstrap material admin template">*/
/*   <meta name="author" content="">*/
/* */
/*   <title>ADBox</title>*/
/* */
/*   <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">*/
/*   <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">*/
/* */
/*   <!-- Stylesheets -->*/
/*   <link rel="stylesheet" href="{{asset('global/css/bootstrap.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('assets/css/site.min3f0d.css?v2.2.0')}}">*/
/* */
/*   <!-- Skin tools (demo site only) -->*/
/*   <link rel="stylesheet" href="{{asset('global/css/skintools.min3f0d.css?v2.2.0')}}">*/
/*   <script src="{{asset('assets/js/sections/skintools.min.js')}}"></script>*/
/* */
/*   <!-- Plugins -->*/
/*   <link rel="stylesheet" href="{{asset('global/vendor/animsition/animsition.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/vendor/switchery/switchery.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/vendor/intro-js/introjs.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/vendor/waves/waves.min3f0d.css?v2.2.0')}}">*/
/* */
/*   <!-- Page -->*/
/*   <link rel="stylesheet" href="{{asset('assets/examples/css/pages/login-v2.min3f0d.css?v2.2.0')}}">*/
/* */
/*   <!-- Fonts -->*/
/*   <link rel="stylesheet" href="{{asset('global/fonts/material-design/material-design.min3f0d.css?v2.2.0')}}">*/
/*   <link rel="stylesheet" href="{{asset('global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0')}}">*/
/* */
/*   <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700'>*/
/* */
/* */
/*   <!--[if lt IE 9]>*/
/*     <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>*/
/*     <![endif]-->*/
/* */
/*   <!--[if lt IE 10]>*/
/*     <script src="../../global/vendor/media-match/media.match.min.js"></script>*/
/*     <script src="../../global/vendor/respond/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/*   <!-- Scripts -->*/
/*   <script src="{{asset('global/vendor/modernizr/modernizr.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/breakpoints/breakpoints.min.js')}}"></script>*/
/*   <script>*/
/*     Breakpoints();*/
/*   </script>*/
/* </head>*/
/* <body class="page-login-v2 layout-full page-dark">*/
/*   <!--[if lt IE 8]>*/
/*         <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>*/
/*     <![endif]-->*/
/* */
/* */
/*   <!-- Page -->*/
/*   <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">*/
/*     <div class="page-content">*/
/*       <div class="page-brand-info">*/
/*         <div class="brand">*/
/*           <img class="brand-img" src="../assets/images/logo%402x.png" alt="...">*/
/*           <h2 class="brand-text font-size-40"></h2>*/
/*         </div>*/
/*         */
/*       </div>*/
/* */
/*       <div class="page-login-main">*/
/*         <div class="brand visible-xs">*/
/*           <img class="brand-img" src="../assets/images/logo%402x.png" alt="...">*/
/*           <h3 class="brand-text font-size-40"></h3>*/
/*         </div>*/
/*         <h3 class="font-size-24">Sign In</h3>*/
/*        */
/* */
/*         <form method="post" action="http://getbootstrapadmin.com/remark/material/center/pages/login-v2.html" autocomplete="off">*/
/*           <div class="form-group form-material floating">*/
/*             <input type="email" class="form-control empty" id="inputEmail" name="email">*/
/*             <label class="floating-label" for="inputEmail">Email</label>*/
/*           </div>*/
/*           <div class="form-group form-material floating">*/
/*             <input type="password" class="form-control empty" id="inputPassword" name="password">*/
/*             <label class="floating-label" for="inputPassword">Password</label>*/
/*           </div>*/
/*           <div class="form-group clearfix">*/
/*             <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">*/
/*               <input type="checkbox" id="remember" name="checkbox">*/
/*               <label for="inputCheckbox">Remember me</label>*/
/*             </div>*/
/*             <a class="pull-right" href="forgot-password.html">Forgot password?</a>*/
/*           </div>*/
/*           <button type="submit" class="btn btn-primary btn-block">Sign in</button>*/
/*         </form>*/
/* */
/*         <p>No account? <a href="{{path('register_page')}}">Sign Up</a></p>*/
/* */
/*         <footer class="page-copyright">*/
/*          */
/*           <div class="social">*/
/*             <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">*/
/*               <i class="icon bd-twitter" aria-hidden="true"></i>*/
/*             </a>*/
/*             <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">*/
/*               <i class="icon bd-facebook" aria-hidden="true"></i>*/
/*             </a>*/
/*             <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">*/
/*               <i class="icon bd-google-plus" aria-hidden="true"></i>*/
/*             </a>*/
/*           </div>*/
/*         </footer>*/
/*       </div>*/
/* */
/*     </div>*/
/*   </div>*/
/*   <!-- End Page -->*/
/* */
/* */
/*   <!-- Core  -->*/
/*   <script src="{{asset('global/vendor/jquery/jquery.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/bootstrap/bootstrap.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/animsition/animsition.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/asscroll/jquery-asScroll.min.js')}}"></script>*/
/*   <script src="{{asset('/global/vendor/mousewheel/jquery.mousewheel.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/asscrollable/jquery.asScrollable.all.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/ashoverscroll/jquery-asHoverScroll.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/waves/waves.min.js')}}"></script>*/
/* */
/*   <!-- Plugins -->*/
/*   <script src="{{asset('global/vendor/switchery/switchery.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/intro-js/intro.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/screenfull/screenfull.min.js')}}"></script>*/
/*   <script src="{{asset('global/vendor/slidepanel/jquery-slidePanel.min.js')}}"></script>*/
/* */
/*   <!-- Plugins For This Page -->*/
/*   <script src="{{asset('global/vendor/jquery-placeholder/jquery.placeholder.min.js')}}"></script>*/
/* */
/*   <!-- Scripts -->*/
/*   <script src="{{asset('global/js/core.min.js')}}"></script>*/
/*   <script src="{{asset('assets/js/site.min.js')}}"></script>*/
/* */
/*   <script src="{{asset('assets/js/sections/menu.min.js')}}"></script>*/
/*   <script src="{{asset('assets/js/sections/menubar.min.js')}}"></script>*/
/*   <script src="{{asset('assets/js/sections/sidebar.min.js')}}"></script>*/
/* */
/*   <script src="{{asset('global/js/configs/config-colors.min.js')}}"></script>*/
/*   <script src="{{asset('assets/js/configs/config-tour.min.js')}}"></script>*/
/* */
/*   <script src="{{asset('global/js/components/asscrollable.min.js')}}"></script>*/
/*   <script src="{{asset('global/js/components/animsition.min.js')}}"></script>*/
/*   <script src="{{asset('global/js/components/slidepanel.min.js')}}"></script>*/
/*   <script src="{{asset('global/js/components/switchery.min.js')}}"></script>*/
/*   <script src="{{asset('global/js/components/tabs.min.js')}}"></script>*/
/* */
/*   <script src="{{asset('global/js/components/jquery-placeholder.min.js')}}"></script>*/
/*   <script src="{{asset('global/js/components/material.min.js')}}"></script>*/
/* */
/* */
/*   <script>*/
/*     (function(document, window, $) {*/
/*       'use strict';*/
/* */
/*       var Site = window.Site;*/
/*       $(document).ready(function() {*/
/*         Site.run();*/
/*       });*/
/*     })(document, window, jQuery);*/
/*   </script>*/
/* */
/* */
/*   <!-- Google Analytics -->*/
/*   <script>*/
/*     (function(i, s, o, g, r, a, m) {*/
/*       i['GoogleAnalyticsObject'] = r;*/
/*       i[r] = i[r] || function() {*/
/*         (i[r].q = i[r].q || []).push(arguments)*/
/*       }, i[r].l = 1 * new Date();*/
/*       a = s.createElement(o),*/
/*         m = s.getElementsByTagName(o)[0];*/
/*       a.async = 1;*/
/*       a.src = g;*/
/*       m.parentNode.insertBefore(a, m)*/
/*     })(window, document, 'script', 'http://www.google-analytics.com/analytics.js',*/
/*       'ga');*/
/* */
/*     ga('create', 'UA-65522665-1', 'auto');*/
/*     ga('send', 'pageview');*/
/*   </script>*/
/* </body>*/
/* */
/* */
/* <!-- Mirrored from getbootstrapadmin.com/remark/material/center/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2016 10:39:17 GMT -->*/
/* </html>*/
