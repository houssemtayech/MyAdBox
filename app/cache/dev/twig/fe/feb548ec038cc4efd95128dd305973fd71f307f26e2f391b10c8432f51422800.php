<?php

/* adresse/show.html.twig */
class __TwigTemplate_e4eb99d0a0fba3b6d934923b474cc8ad3ad1e0fd87b3ca645a9449a0928635a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "adresse/show.html.twig", 1);
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
        $__internal_556468c4a1e8787e88813dbc281fa66641fb69c2cd3867df94d3fc649c3194c4 = $this->env->getExtension("native_profiler");
        $__internal_556468c4a1e8787e88813dbc281fa66641fb69c2cd3867df94d3fc649c3194c4->enter($__internal_556468c4a1e8787e88813dbc281fa66641fb69c2cd3867df94d3fc649c3194c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "adresse/show.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_556468c4a1e8787e88813dbc281fa66641fb69c2cd3867df94d3fc649c3194c4->leave($__internal_556468c4a1e8787e88813dbc281fa66641fb69c2cd3867df94d3fc649c3194c4_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_4321be61bb6faa3e88e023934641a9a4763549467777f6c939e20fffcf4051e5 = $this->env->getExtension("native_profiler");
        $__internal_4321be61bb6faa3e88e023934641a9a4763549467777f6c939e20fffcf4051e5->enter($__internal_4321be61bb6faa3e88e023934641a9a4763549467777f6c939e20fffcf4051e5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>Adresse</h1>

    <table>
        <tbody>
            <tr>
                <th>Latitude</th>
                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "latitude", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Longitude</th>
                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "longitude", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Pays</th>
                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "pays", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Ville</th>
                <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "ville", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Region</th>
                <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "region", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Codepostal</th>
                <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "codepostal", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Rue</th>
                <td>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "rue", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Id</th>
                <td>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "id", array()), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("adresse_index");
        echo "\">Back to the list</a>
        </li>
        <li>
            <a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("adresse_edit", array("id" => $this->getAttribute((isset($context["adresse"]) ? $context["adresse"] : $this->getContext($context, "adresse")), "id", array()))), "html", null, true);
        echo "\">Edit</a>
        </li>
        <li>
            ";
        // line 51
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_start');
        echo "
                <input type=\"submit\" value=\"Delete\">
            ";
        // line 53
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form_end');
        echo "
        </li>
    </ul>
";
        
        $__internal_4321be61bb6faa3e88e023934641a9a4763549467777f6c939e20fffcf4051e5->leave($__internal_4321be61bb6faa3e88e023934641a9a4763549467777f6c939e20fffcf4051e5_prof);

    }

    public function getTemplateName()
    {
        return "adresse/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 53,  119 => 51,  113 => 48,  107 => 45,  97 => 38,  90 => 34,  83 => 30,  76 => 26,  69 => 22,  62 => 18,  55 => 14,  48 => 10,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <h1>Adresse</h1>*/
/* */
/*     <table>*/
/*         <tbody>*/
/*             <tr>*/
/*                 <th>Latitude</th>*/
/*                 <td>{{ adresse.latitude }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>Longitude</th>*/
/*                 <td>{{ adresse.longitude }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>Pays</th>*/
/*                 <td>{{ adresse.pays }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>Ville</th>*/
/*                 <td>{{ adresse.ville }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>Region</th>*/
/*                 <td>{{ adresse.region }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>Codepostal</th>*/
/*                 <td>{{ adresse.codepostal }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>Rue</th>*/
/*                 <td>{{ adresse.rue }}</td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <th>Id</th>*/
/*                 <td>{{ adresse.id }}</td>*/
/*             </tr>*/
/*         </tbody>*/
/*     </table>*/
/* */
/*     <ul>*/
/*         <li>*/
/*             <a href="{{ path('adresse_index') }}">Back to the list</a>*/
/*         </li>*/
/*         <li>*/
/*             <a href="{{ path('adresse_edit', { 'id': adresse.id }) }}">Edit</a>*/
/*         </li>*/
/*         <li>*/
/*             {{ form_start(delete_form) }}*/
/*                 <input type="submit" value="Delete">*/
/*             {{ form_end(delete_form) }}*/
/*         </li>*/
/*     </ul>*/
/* {% endblock %}*/
/* */
