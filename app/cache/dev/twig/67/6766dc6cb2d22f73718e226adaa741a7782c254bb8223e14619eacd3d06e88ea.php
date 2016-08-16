<?php

/* adresse/index.html.twig */
class __TwigTemplate_d1137630d440e533585a89d2fbaa9b8fb86953be3357d4b1384cf13a5f01cc2a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "adresse/index.html.twig", 1);
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
        $__internal_68954b9911adddf0caa11cce1af2f9e099fade7fc267b787a834f48fe9da4437 = $this->env->getExtension("native_profiler");
        $__internal_68954b9911adddf0caa11cce1af2f9e099fade7fc267b787a834f48fe9da4437->enter($__internal_68954b9911adddf0caa11cce1af2f9e099fade7fc267b787a834f48fe9da4437_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "adresse/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_68954b9911adddf0caa11cce1af2f9e099fade7fc267b787a834f48fe9da4437->leave($__internal_68954b9911adddf0caa11cce1af2f9e099fade7fc267b787a834f48fe9da4437_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_f558e32fef0c13084400c43b9ffe393a8a76bb8ca456abe46284709c538483a5 = $this->env->getExtension("native_profiler");
        $__internal_f558e32fef0c13084400c43b9ffe393a8a76bb8ca456abe46284709c538483a5->enter($__internal_f558e32fef0c13084400c43b9ffe393a8a76bb8ca456abe46284709c538483a5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <h1>Adresse list</h1>

    <table>
        <thead>
            <tr>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Pays</th>
                <th>Ville</th>
                <th>Region</th>
                <th>Codepostal</th>
                <th>Rue</th>
                <th>Id</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["adresses"]) ? $context["adresses"] : $this->getContext($context, "adresses")));
        foreach ($context['_seq'] as $context["_key"] => $context["adresse"]) {
            // line 22
            echo "            <tr>
                <td><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("adresse_show", array("id" => $this->getAttribute($context["adresse"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "latitude", array()), "html", null, true);
            echo "</a></td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "longitude", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "pays", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "ville", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "region", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "codepostal", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "rue", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["adresse"], "id", array()), "html", null, true);
            echo "</td>
                <td>
                    <ul>
                        <li>
                            <a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("adresse_show", array("id" => $this->getAttribute($context["adresse"], "id", array()))), "html", null, true);
            echo "\">show</a>
                        </li>
                        <li>
                            <a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("adresse_edit", array("id" => $this->getAttribute($context["adresse"], "id", array()))), "html", null, true);
            echo "\">edit</a>
                        </li>
                    </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adresse'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "        </tbody>
    </table>

    <ul>
        <li>
            <a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("adresse_new");
        echo "\">Create a new entry</a>
        </li>
    </ul>
";
        
        $__internal_f558e32fef0c13084400c43b9ffe393a8a76bb8ca456abe46284709c538483a5->leave($__internal_f558e32fef0c13084400c43b9ffe393a8a76bb8ca456abe46284709c538483a5_prof);

    }

    public function getTemplateName()
    {
        return "adresse/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 48,  121 => 43,  109 => 37,  103 => 34,  96 => 30,  92 => 29,  88 => 28,  84 => 27,  80 => 26,  76 => 25,  72 => 24,  66 => 23,  63 => 22,  59 => 21,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <h1>Adresse list</h1>*/
/* */
/*     <table>*/
/*         <thead>*/
/*             <tr>*/
/*                 <th>Latitude</th>*/
/*                 <th>Longitude</th>*/
/*                 <th>Pays</th>*/
/*                 <th>Ville</th>*/
/*                 <th>Region</th>*/
/*                 <th>Codepostal</th>*/
/*                 <th>Rue</th>*/
/*                 <th>Id</th>*/
/*                 <th>Actions</th>*/
/*             </tr>*/
/*         </thead>*/
/*         <tbody>*/
/*         {% for adresse in adresses %}*/
/*             <tr>*/
/*                 <td><a href="{{ path('adresse_show', { 'id': adresse.id }) }}">{{ adresse.latitude }}</a></td>*/
/*                 <td>{{ adresse.longitude }}</td>*/
/*                 <td>{{ adresse.pays }}</td>*/
/*                 <td>{{ adresse.ville }}</td>*/
/*                 <td>{{ adresse.region }}</td>*/
/*                 <td>{{ adresse.codepostal }}</td>*/
/*                 <td>{{ adresse.rue }}</td>*/
/*                 <td>{{ adresse.id }}</td>*/
/*                 <td>*/
/*                     <ul>*/
/*                         <li>*/
/*                             <a href="{{ path('adresse_show', { 'id': adresse.id }) }}">show</a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="{{ path('adresse_edit', { 'id': adresse.id }) }}">edit</a>*/
/*                         </li>*/
/*                     </ul>*/
/*                 </td>*/
/*             </tr>*/
/*         {% endfor %}*/
/*         </tbody>*/
/*     </table>*/
/* */
/*     <ul>*/
/*         <li>*/
/*             <a href="{{ path('adresse_new') }}">Create a new entry</a>*/
/*         </li>*/
/*     </ul>*/
/* {% endblock %}*/
/* */
