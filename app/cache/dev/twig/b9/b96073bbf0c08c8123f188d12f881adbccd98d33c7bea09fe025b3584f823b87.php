<?php

/* base.html.twig */
class __TwigTemplate_b128e78edeb6a8764872b36592ec8289b1820f572cd6f8d21b55d962402a1068 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9a0609b1e7830971b29ced75285690eee1bff325e4fb41cbc282ac28cf84421b = $this->env->getExtension("native_profiler");
        $__internal_9a0609b1e7830971b29ced75285690eee1bff325e4fb41cbc282ac28cf84421b->enter($__internal_9a0609b1e7830971b29ced75285690eee1bff325e4fb41cbc282ac28cf84421b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_9a0609b1e7830971b29ced75285690eee1bff325e4fb41cbc282ac28cf84421b->leave($__internal_9a0609b1e7830971b29ced75285690eee1bff325e4fb41cbc282ac28cf84421b_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_682115e355a0cb23de93f2aa60a37574880e763293b0973571793f98482a816c = $this->env->getExtension("native_profiler");
        $__internal_682115e355a0cb23de93f2aa60a37574880e763293b0973571793f98482a816c->enter($__internal_682115e355a0cb23de93f2aa60a37574880e763293b0973571793f98482a816c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_682115e355a0cb23de93f2aa60a37574880e763293b0973571793f98482a816c->leave($__internal_682115e355a0cb23de93f2aa60a37574880e763293b0973571793f98482a816c_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_d52178602aacc52f5a2e8b44135becc94c1cca5e02ddd7bde8f27108d3507e4c = $this->env->getExtension("native_profiler");
        $__internal_d52178602aacc52f5a2e8b44135becc94c1cca5e02ddd7bde8f27108d3507e4c->enter($__internal_d52178602aacc52f5a2e8b44135becc94c1cca5e02ddd7bde8f27108d3507e4c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_d52178602aacc52f5a2e8b44135becc94c1cca5e02ddd7bde8f27108d3507e4c->leave($__internal_d52178602aacc52f5a2e8b44135becc94c1cca5e02ddd7bde8f27108d3507e4c_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_9822761504f6b0dede804ef4fec26ff746d1044b6703d01ece50cd9c4becf1e5 = $this->env->getExtension("native_profiler");
        $__internal_9822761504f6b0dede804ef4fec26ff746d1044b6703d01ece50cd9c4becf1e5->enter($__internal_9822761504f6b0dede804ef4fec26ff746d1044b6703d01ece50cd9c4becf1e5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_9822761504f6b0dede804ef4fec26ff746d1044b6703d01ece50cd9c4becf1e5->leave($__internal_9822761504f6b0dede804ef4fec26ff746d1044b6703d01ece50cd9c4becf1e5_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_4a8d07d8c1e8fdeac7f3894af60703ab1ccf095f11d5abfe18cee55394b1108c = $this->env->getExtension("native_profiler");
        $__internal_4a8d07d8c1e8fdeac7f3894af60703ab1ccf095f11d5abfe18cee55394b1108c->enter($__internal_4a8d07d8c1e8fdeac7f3894af60703ab1ccf095f11d5abfe18cee55394b1108c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_4a8d07d8c1e8fdeac7f3894af60703ab1ccf095f11d5abfe18cee55394b1108c->leave($__internal_4a8d07d8c1e8fdeac7f3894af60703ab1ccf095f11d5abfe18cee55394b1108c_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
