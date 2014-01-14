<?php

/* SonataAdminBundle:Pager:base_results.html.twig */
class __TwigTemplate_d4b29059530939f170716f1498f91a6d2c9652dc9a0e895f95741fd5fab9086e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'num_pages' => array($this, 'block_num_pages'),
            'num_results' => array($this, 'block_num_results'),
            'max_per_page' => array($this, 'block_max_per_page'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('num_pages', $context, $blocks);
        // line 16
        echo "
";
        // line 17
        $this->displayBlock('num_results', $context, $blocks);
        // line 21
        echo "
";
        // line 22
        $this->displayBlock('max_per_page', $context, $blocks);
    }

    // line 12
    public function block_num_pages($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "page"), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "lastpage"), "html", null, true);
        echo "
    &nbsp;-&nbsp;
";
    }

    // line 17
    public function block_num_results($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        echo $this->env->getExtension('translator')->getTranslator()->transChoice("list_results_count", $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "nbresults"), array("%count%" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "nbresults")), "SonataAdminBundle");
        // line 19
        echo "    &nbsp;-&nbsp;
";
    }

    // line 22
    public function block_max_per_page($context, array $blocks = array())
    {
        // line 23
        echo "    <label class=\"control-label\" for=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
        echo "_per_page\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("label_per_page", array(), "SonataAdminBundle");
        echo "</label>
    <select class=\"per-page small\" id=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
        echo "_per_page\" style=\"width: auto; height: auto\">
        ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin"), "getperpageoptions"));
        foreach ($context['_seq'] as $context["_key"] => $context["per_page"]) {
            // line 26
            echo "            <option ";
            if (($this->getContext($context, "per_page") == $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "maxperpage"))) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => array("filter" => twig_array_merge($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "values"), array("_page" => 1, "_per_page" => $this->getContext($context, "per_page"))))), "method"), "html", null, true);
            echo "\">
                ";
            // line 27
            echo twig_escape_filter($this->env, $this->getContext($context, "per_page"), "html", null, true);
            echo "
            </option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['per_page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "    </select>
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Pager:base_results.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  99 => 30,  81 => 26,  77 => 25,  73 => 24,  66 => 23,  63 => 22,  55 => 18,  32 => 21,  30 => 17,  27 => 16,  25 => 12,  43 => 20,  38 => 35,  35 => 22,  33 => 20,  23 => 12,  20 => 11,  34 => 16,  31 => 15,  29 => 19,  26 => 14,  22 => 11,  19 => 11,  594 => 184,  583 => 182,  579 => 181,  571 => 178,  566 => 176,  560 => 174,  558 => 173,  552 => 169,  543 => 166,  539 => 165,  533 => 164,  530 => 163,  526 => 162,  521 => 160,  514 => 158,  509 => 156,  502 => 155,  499 => 154,  496 => 153,  491 => 150,  487 => 137,  484 => 136,  480 => 135,  477 => 134,  474 => 133,  470 => 126,  466 => 125,  463 => 124,  458 => 107,  447 => 105,  443 => 104,  436 => 100,  432 => 99,  427 => 98,  424 => 97,  412 => 86,  409 => 85,  405 => 109,  403 => 97,  399 => 95,  397 => 85,  394 => 84,  391 => 83,  386 => 138,  384 => 133,  378 => 129,  374 => 127,  372 => 124,  369 => 123,  364 => 120,  350 => 119,  341 => 118,  324 => 117,  319 => 116,  317 => 115,  313 => 113,  308 => 111,  305 => 110,  302 => 83,  299 => 82,  297 => 81,  292 => 79,  289 => 78,  286 => 77,  281 => 74,  266 => 72,  263 => 71,  260 => 70,  243 => 69,  240 => 68,  237 => 67,  231 => 63,  225 => 62,  222 => 61,  218 => 59,  214 => 58,  209 => 57,  203 => 56,  191 => 55,  189 => 54,  186 => 53,  183 => 52,  180 => 51,  177 => 50,  174 => 49,  171 => 48,  168 => 47,  165 => 46,  162 => 45,  159 => 44,  157 => 43,  153 => 41,  147 => 37,  144 => 36,  140 => 35,  136 => 33,  133 => 32,  128 => 23,  124 => 150,  121 => 149,  115 => 146,  112 => 145,  109 => 144,  105 => 142,  103 => 141,  100 => 140,  98 => 77,  95 => 76,  93 => 67,  90 => 27,  88 => 32,  85 => 31,  80 => 29,  75 => 28,  72 => 27,  69 => 26,  67 => 25,  64 => 24,  61 => 23,  58 => 19,  52 => 17,  47 => 17,  45 => 16,  42 => 13,  39 => 12,);
    }
}
