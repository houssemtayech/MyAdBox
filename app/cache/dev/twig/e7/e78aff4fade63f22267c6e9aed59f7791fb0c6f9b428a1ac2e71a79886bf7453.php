<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_bb90a4666d58fd9bb0c40e969835cb0681bfe2faca1ee51aefeb8ec50b5ceb33 extends Twig_Template
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
        $__internal_ef11a658014be31518bfe48b7a2de163c0567578c40219c510baade72452d864 = $this->env->getExtension("native_profiler");
        $__internal_ef11a658014be31518bfe48b7a2de163c0567578c40219c510baade72452d864->enter($__internal_ef11a658014be31518bfe48b7a2de163c0567578c40219c510baade72452d864_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ef11a658014be31518bfe48b7a2de163c0567578c40219c510baade72452d864->leave($__internal_ef11a658014be31518bfe48b7a2de163c0567578c40219c510baade72452d864_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_c30574c7449dbdba9c77555d7d4b1936ad8514b42e659565204c9ab5115d7433 = $this->env->getExtension("native_profiler");
        $__internal_c30574c7449dbdba9c77555d7d4b1936ad8514b42e659565204c9ab5115d7433->enter($__internal_c30574c7449dbdba9c77555d7d4b1936ad8514b42e659565204c9ab5115d7433_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_c30574c7449dbdba9c77555d7d4b1936ad8514b42e659565204c9ab5115d7433->leave($__internal_c30574c7449dbdba9c77555d7d4b1936ad8514b42e659565204c9ab5115d7433_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_43af268a70752a39ac1ba9e9f3dbf0e93d4743e3919df240a41dae1589ae6629 = $this->env->getExtension("native_profiler");
        $__internal_43af268a70752a39ac1ba9e9f3dbf0e93d4743e3919df240a41dae1589ae6629->enter($__internal_43af268a70752a39ac1ba9e9f3dbf0e93d4743e3919df240a41dae1589ae6629_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_43af268a70752a39ac1ba9e9f3dbf0e93d4743e3919df240a41dae1589ae6629->leave($__internal_43af268a70752a39ac1ba9e9f3dbf0e93d4743e3919df240a41dae1589ae6629_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_8a26956eaf02ce5d81ecfa9f0cff940b4c89d6e264c185dc5bb0f441320beec2 = $this->env->getExtension("native_profiler");
        $__internal_8a26956eaf02ce5d81ecfa9f0cff940b4c89d6e264c185dc5bb0f441320beec2->enter($__internal_8a26956eaf02ce5d81ecfa9f0cff940b4c89d6e264c185dc5bb0f441320beec2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_8a26956eaf02ce5d81ecfa9f0cff940b4c89d6e264c185dc5bb0f441320beec2->leave($__internal_8a26956eaf02ce5d81ecfa9f0cff940b4c89d6e264c185dc5bb0f441320beec2_prof);

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
