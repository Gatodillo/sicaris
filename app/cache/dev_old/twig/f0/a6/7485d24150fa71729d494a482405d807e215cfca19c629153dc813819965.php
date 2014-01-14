<?php

/* SabaFarmaciaBundle:SalidaPorReceta:crear.html.twig */
class __TwigTemplate_f0a67485d24150fa71729d494a482405d807e215cfca19c629153dc813819965 extends Twig_Template
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
        // line 2
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
<h3>RECETA</h3>
<div class=\"movimiento\">
    ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "receta"), "folio"), 'row');
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "SabaFarmaciaBundle:SalidaPorReceta:crear.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 2,);
    }
}
