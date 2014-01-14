<?php

/* SonataAdminBundle::ajax_layout.html.twig */
class __TwigTemplate_2fd32ec3c62639de30ba3342c5122eaf4b9de2ec2ee8939defea3f07230afa32 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'preview' => array($this, 'block_preview'),
            'form' => array($this, 'block_form'),
            'list' => array($this, 'block_list'),
            'show' => array($this, 'block_show'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        $context["_list_table"] = $this->renderBlock("list_table", $context, $blocks);
        // line 14
        echo "    ";
        $context["_list_filters"] = $this->renderBlock("list_filters", $context, $blocks);
        // line 15
        echo "
    ";
        // line 16
        $this->displayBlock('preview', $context, $blocks);
        // line 17
        echo "    ";
        $this->displayBlock('form', $context, $blocks);
        // line 18
        echo "    ";
        $this->displayBlock('list', $context, $blocks);
        // line 19
        echo "    ";
        $this->displayBlock('show', $context, $blocks);
        // line 20
        echo "
    ";
        // line 21
        if (((twig_length_filter($this->env, $this->getContext($context, "_list_table")) > 0) || (twig_length_filter($this->env, $this->getContext($context, "_list_filters")) > 0))) {
            // line 22
            echo "        <div class=\"row-fluid\">
            <div class=\"sonata-ba-list span10\">
                ";
            // line 24
            echo $this->getContext($context, "_list_table");
            echo "
            </div>

            <div class=\"sonata-ba-filter span2\">
                ";
            // line 28
            echo $this->getContext($context, "_list_filters");
            echo "
            </div>
        </div>
    ";
        }
        // line 32
        echo "
";
    }

    // line 16
    public function block_preview($context, array $blocks = array())
    {
    }

    // line 17
    public function block_form($context, array $blocks = array())
    {
    }

    // line 18
    public function block_list($context, array $blocks = array())
    {
    }

    // line 19
    public function block_show($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle::ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  96 => 19,  91 => 18,  86 => 17,  81 => 16,  76 => 32,  69 => 28,  62 => 24,  58 => 22,  56 => 21,  53 => 20,  50 => 19,  47 => 18,  44 => 17,  42 => 16,  39 => 15,  36 => 14,  33 => 13,  27 => 12,  24 => 11,);
    }
}
