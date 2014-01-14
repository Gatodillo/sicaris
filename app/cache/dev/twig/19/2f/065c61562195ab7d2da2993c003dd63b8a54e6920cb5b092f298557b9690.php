<?php

/* SonataAdminBundle:Helper:short-object-description.html.twig */
class __TwigTemplate_192f065c61562195ab7d2da2993c003dd63b8a54e6920cb5b092f298557b9690 extends Twig_Template
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
        // line 1
        echo "<span class=\"inner-field-short-description\">
    ";
        // line 2
        if ((($this->getContext($context, "object") && $this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "edit"), "method")) && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "EDIT"), "method"))) {
            // line 3
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateObjectUrl", array(0 => "edit", 1 => $this->getContext($context, "object"), 2 => $this->getContext($context, "link_parameters")), "method"), "html", null, true);
            echo "\" target=\"new\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "description"), "html", null, true);
            echo "</a>
    ";
        } else {
            // line 5
            echo "        ";
            echo twig_escape_filter($this->env, $this->getContext($context, "description"), "html", null, true);
            echo "
    ";
        }
        // line 7
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Helper:short-object-description.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  32 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
