<?php

/* SonataAdminBundle:CRUD:list__select.html.twig */
class __TwigTemplate_439feaae9a1bf399faea93185c8d3799d0bc9298c4c737fd7bf01a3b19d4eb84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute($this->getContext($context, "admin"), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        echo "    <a class=\"btn\" href=\"#\">
        <i class=\"icon-arrow-right\"></i>
        ";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("list_select", array(), "SonataAdminBundle"), "html", null, true);
        echo "
    </a>
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list__select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 15,  26 => 14,  96 => 19,  91 => 18,  86 => 17,  81 => 16,  76 => 32,  69 => 28,  62 => 24,  58 => 22,  56 => 21,  53 => 20,  50 => 19,  47 => 18,  44 => 17,  42 => 16,  39 => 15,  36 => 14,  33 => 17,  27 => 12,  24 => 11,);
    }
}
