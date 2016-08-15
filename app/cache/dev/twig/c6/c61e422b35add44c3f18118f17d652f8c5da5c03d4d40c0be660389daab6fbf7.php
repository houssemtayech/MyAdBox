<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_833368186c63efee6edb824e9a481e417d3960925a2d669264069da3ae11f9ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_880acf126159b78d74fd9c1873a5a57dd5549bbedfac4735ec7b8f1b3c9f0ebb = $this->env->getExtension("native_profiler");
        $__internal_880acf126159b78d74fd9c1873a5a57dd5549bbedfac4735ec7b8f1b3c9f0ebb->enter($__internal_880acf126159b78d74fd9c1873a5a57dd5549bbedfac4735ec7b8f1b3c9f0ebb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_880acf126159b78d74fd9c1873a5a57dd5549bbedfac4735ec7b8f1b3c9f0ebb->leave($__internal_880acf126159b78d74fd9c1873a5a57dd5549bbedfac4735ec7b8f1b3c9f0ebb_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_57df7b0460325b68e917c15aa6d947c0659ac77dc64b4e84d2a246fec112226b = $this->env->getExtension("native_profiler");
        $__internal_57df7b0460325b68e917c15aa6d947c0659ac77dc64b4e84d2a246fec112226b->enter($__internal_57df7b0460325b68e917c15aa6d947c0659ac77dc64b4e84d2a246fec112226b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_57df7b0460325b68e917c15aa6d947c0659ac77dc64b4e84d2a246fec112226b->leave($__internal_57df7b0460325b68e917c15aa6d947c0659ac77dc64b4e84d2a246fec112226b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_1fa8631955d1ab8a517476a45f33df77d85bbf185173cd943cbb33714100d7f9 = $this->env->getExtension("native_profiler");
        $__internal_1fa8631955d1ab8a517476a45f33df77d85bbf185173cd943cbb33714100d7f9->enter($__internal_1fa8631955d1ab8a517476a45f33df77d85bbf185173cd943cbb33714100d7f9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_1fa8631955d1ab8a517476a45f33df77d85bbf185173cd943cbb33714100d7f9->leave($__internal_1fa8631955d1ab8a517476a45f33df77d85bbf185173cd943cbb33714100d7f9_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_254458304625fe8b4a364f8dc6325daccef192e068f31b4aff63a1e57db69a54 = $this->env->getExtension("native_profiler");
        $__internal_254458304625fe8b4a364f8dc6325daccef192e068f31b4aff63a1e57db69a54->enter($__internal_254458304625fe8b4a364f8dc6325daccef192e068f31b4aff63a1e57db69a54_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_254458304625fe8b4a364f8dc6325daccef192e068f31b4aff63a1e57db69a54->leave($__internal_254458304625fe8b4a364f8dc6325daccef192e068f31b4aff63a1e57db69a54_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
