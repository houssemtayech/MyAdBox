<?php

/* adresse/new.html.twig */
class __TwigTemplate_b4f3b28f219577f578606c06261f62236e8c130c5e62ec0a843c7a178273c42c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "adresse/new.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d80584ad806d8c1cea53ba35504177e6894e2ca389124db7e59efe12c9e60612 = $this->env->getExtension("native_profiler");
        $__internal_d80584ad806d8c1cea53ba35504177e6894e2ca389124db7e59efe12c9e60612->enter($__internal_d80584ad806d8c1cea53ba35504177e6894e2ca389124db7e59efe12c9e60612_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "adresse/new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d80584ad806d8c1cea53ba35504177e6894e2ca389124db7e59efe12c9e60612->leave($__internal_d80584ad806d8c1cea53ba35504177e6894e2ca389124db7e59efe12c9e60612_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_05d51e33ff2c9dc338625fcd2fa2b6deb374dd8cd2d5290db4262edd8e000a7e = $this->env->getExtension("native_profiler");
        $__internal_05d51e33ff2c9dc338625fcd2fa2b6deb374dd8cd2d5290db4262edd8e000a7e->enter($__internal_05d51e33ff2c9dc338625fcd2fa2b6deb374dd8cd2d5290db4262edd8e000a7e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>Adresse creation</h1>

    ";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
        <input type=\"submit\" value=\"Create\" />
    ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

    <ul>
        <li>
            <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("adresse_index");
        echo "\">Back to the list</a>
        </li>
    </ul>
";
        
        $__internal_05d51e33ff2c9dc338625fcd2fa2b6deb374dd8cd2d5290db4262edd8e000a7e->leave($__internal_05d51e33ff2c9dc338625fcd2fa2b6deb374dd8cd2d5290db4262edd8e000a7e_prof);

    }

    public function getTemplateName()
    {
        return "adresse/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 13,  53 => 9,  48 => 7,  44 => 6,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <h1>Adresse creation</h1>*/
/* */
/*     {{ form_start(form) }}*/
/*         {{ form_widget(form) }}*/
/*         <input type="submit" value="Create" />*/
/*     {{ form_end(form) }}*/
/* */
/*     <ul>*/
/*         <li>*/
/*             <a href="{{ path('adresse_index') }}">Back to the list</a>*/
/*         </li>*/
/*     </ul>*/
/* {% endblock %}*/
/* */
