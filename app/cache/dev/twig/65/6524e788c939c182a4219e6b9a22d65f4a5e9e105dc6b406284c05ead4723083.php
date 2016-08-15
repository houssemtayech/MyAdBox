<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_3685aff5cec0f60a40e439b7181a6259d392620afffc5d5a03eabf70a2ceea7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_94b8a8ce49a93b73f1810e192e55ec86426ce7aa3a0a3743937dfb9c05e711ac = $this->env->getExtension("native_profiler");
        $__internal_94b8a8ce49a93b73f1810e192e55ec86426ce7aa3a0a3743937dfb9c05e711ac->enter($__internal_94b8a8ce49a93b73f1810e192e55ec86426ce7aa3a0a3743937dfb9c05e711ac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_94b8a8ce49a93b73f1810e192e55ec86426ce7aa3a0a3743937dfb9c05e711ac->leave($__internal_94b8a8ce49a93b73f1810e192e55ec86426ce7aa3a0a3743937dfb9c05e711ac_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_456b79af9dd2958cbf79c77a28268f81581f3047f88cf4d1492d4d5480a85f7c = $this->env->getExtension("native_profiler");
        $__internal_456b79af9dd2958cbf79c77a28268f81581f3047f88cf4d1492d4d5480a85f7c->enter($__internal_456b79af9dd2958cbf79c77a28268f81581f3047f88cf4d1492d4d5480a85f7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_456b79af9dd2958cbf79c77a28268f81581f3047f88cf4d1492d4d5480a85f7c->leave($__internal_456b79af9dd2958cbf79c77a28268f81581f3047f88cf4d1492d4d5480a85f7c_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_530526cef60e2aaf53f12fd9ea318fe17c7a88d6c535898b3a50543ee6f035e2 = $this->env->getExtension("native_profiler");
        $__internal_530526cef60e2aaf53f12fd9ea318fe17c7a88d6c535898b3a50543ee6f035e2->enter($__internal_530526cef60e2aaf53f12fd9ea318fe17c7a88d6c535898b3a50543ee6f035e2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_530526cef60e2aaf53f12fd9ea318fe17c7a88d6c535898b3a50543ee6f035e2->leave($__internal_530526cef60e2aaf53f12fd9ea318fe17c7a88d6c535898b3a50543ee6f035e2_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_43694d62bd41de134fde290895d31385123a092a1740df88f258c3693195f659 = $this->env->getExtension("native_profiler");
        $__internal_43694d62bd41de134fde290895d31385123a092a1740df88f258c3693195f659->enter($__internal_43694d62bd41de134fde290895d31385123a092a1740df88f258c3693195f659_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_43694d62bd41de134fde290895d31385123a092a1740df88f258c3693195f659->leave($__internal_43694d62bd41de134fde290895d31385123a092a1740df88f258c3693195f659_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
