<?php

/* adresse/edit.html.twig */
class __TwigTemplate_045be47b962220ed21f2c931d280b4c4647b6fa173d0abfd187fc96733fded53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "adresse/edit.html.twig", 1);
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
        $__internal_de0db80730ffe01832a1da7520fd115bfda9bf3f270f93fc13726b9df18b4afd = $this->env->getExtension("native_profiler");
        $__internal_de0db80730ffe01832a1da7520fd115bfda9bf3f270f93fc13726b9df18b4afd->enter($__internal_de0db80730ffe01832a1da7520fd115bfda9bf3f270f93fc13726b9df18b4afd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "adresse/edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_de0db80730ffe01832a1da7520fd115bfda9bf3f270f93fc13726b9df18b4afd->leave($__internal_de0db80730ffe01832a1da7520fd115bfda9bf3f270f93fc13726b9df18b4afd_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_6ed44c7cbc6b976a8d0d4908c44d5dc181b032fd240a2b16ff6fd02040e97195 = $this->env->getExtension("native_profiler");
        $__internal_6ed44c7cbc6b976a8d0d4908c44d5dc181b032fd240a2b16ff6fd02040e97195->enter($__internal_6ed44c7cbc6b976a8d0d4908c44d5dc181b032fd240a2b16ff6fd02040e97195_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>Adresse edit</h1>

    ";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_start');
        echo "
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'widget');
        echo "
        <input type=\"submit\" value=\"Edit\" />
    ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_end');
        echo "

    <ul>
        <li>
            <a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("adresse_index");
        echo "\">Back to the list</a>
        </li>
        <li>
            ";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_start');
        echo "
                <input type=\"submit\" value=\"Delete\">
            ";
        // line 18
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_end');
        echo "
        </li>
    </ul>
";
        
        $__internal_6ed44c7cbc6b976a8d0d4908c44d5dc181b032fd240a2b16ff6fd02040e97195->leave($__internal_6ed44c7cbc6b976a8d0d4908c44d5dc181b032fd240a2b16ff6fd02040e97195_prof);

    }

    public function getTemplateName()
    {
        return "adresse/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 18,  66 => 16,  60 => 13,  53 => 9,  48 => 7,  44 => 6,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <h1>Adresse edit</h1>*/
/* */
/*     {{ form_start(edit_form) }}*/
/*         {{ form_widget(edit_form) }}*/
/*         <input type="submit" value="Edit" />*/
/*     {{ form_end(edit_form) }}*/
/* */
/*     <ul>*/
/*         <li>*/
/*             <a href="{{ path('adresse_index') }}">Back to the list</a>*/
/*         </li>*/
/*         <li>*/
/*             {{ form_start(delete_form) }}*/
/*                 <input type="submit" value="Delete">*/
/*             {{ form_end(delete_form) }}*/
/*         </li>*/
/*     </ul>*/
/* {% endblock %}*/
/* */
