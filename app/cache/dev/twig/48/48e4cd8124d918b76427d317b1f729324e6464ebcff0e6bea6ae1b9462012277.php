<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_aeed3b5e5634afb48e0ca4ba6c6202d81d96ce6895bb2ce62b5d38140f89ac59 extends Twig_Template
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
        $__internal_17041deac9378e9461694e408e722968e390efc3abc9e74e5caf24491bc8dda2 = $this->env->getExtension("native_profiler");
        $__internal_17041deac9378e9461694e408e722968e390efc3abc9e74e5caf24491bc8dda2->enter($__internal_17041deac9378e9461694e408e722968e390efc3abc9e74e5caf24491bc8dda2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_17041deac9378e9461694e408e722968e390efc3abc9e74e5caf24491bc8dda2->leave($__internal_17041deac9378e9461694e408e722968e390efc3abc9e74e5caf24491bc8dda2_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_60e0ec2c800cce175bf03e0862500514274b055cd15f195045d4bc08677537e1 = $this->env->getExtension("native_profiler");
        $__internal_60e0ec2c800cce175bf03e0862500514274b055cd15f195045d4bc08677537e1->enter($__internal_60e0ec2c800cce175bf03e0862500514274b055cd15f195045d4bc08677537e1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_60e0ec2c800cce175bf03e0862500514274b055cd15f195045d4bc08677537e1->leave($__internal_60e0ec2c800cce175bf03e0862500514274b055cd15f195045d4bc08677537e1_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_5049010f2d459c0ca48e8adf4bc143882473f7668e9bf1a9750023c1a7342c8e = $this->env->getExtension("native_profiler");
        $__internal_5049010f2d459c0ca48e8adf4bc143882473f7668e9bf1a9750023c1a7342c8e->enter($__internal_5049010f2d459c0ca48e8adf4bc143882473f7668e9bf1a9750023c1a7342c8e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_5049010f2d459c0ca48e8adf4bc143882473f7668e9bf1a9750023c1a7342c8e->leave($__internal_5049010f2d459c0ca48e8adf4bc143882473f7668e9bf1a9750023c1a7342c8e_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_0c1c7e09eb8e8e6f123d92bee7da8b0487ff055efc5199645794dd1146788e96 = $this->env->getExtension("native_profiler");
        $__internal_0c1c7e09eb8e8e6f123d92bee7da8b0487ff055efc5199645794dd1146788e96->enter($__internal_0c1c7e09eb8e8e6f123d92bee7da8b0487ff055efc5199645794dd1146788e96_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_0c1c7e09eb8e8e6f123d92bee7da8b0487ff055efc5199645794dd1146788e96->leave($__internal_0c1c7e09eb8e8e6f123d92bee7da8b0487ff055efc5199645794dd1146788e96_prof);

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
