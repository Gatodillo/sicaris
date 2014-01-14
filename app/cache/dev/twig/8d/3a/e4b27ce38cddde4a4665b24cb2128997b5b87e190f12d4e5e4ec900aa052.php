<?php

/* SonataAdminBundle:CRUD:base_list_inner_row.html.twig */
class __TwigTemplate_8d3ae4b27ce38cddde4a4665b24cb2128997b5b87e190f12d4e5e4ec900aa052 extends Twig_Template
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
        // line 11
        echo "
";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "elements"));
        foreach ($context['_seq'] as $context["_key"] => $context["field_description"]) {
            // line 13
            echo "    ";
            if ((($this->getAttribute($this->getContext($context, "field_description"), "name") == "_action") && $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "isXmlHttpRequest"))) {
                // line 14
                echo "        ";
                // line 15
                echo "    ";
            } else {
                // line 16
                echo "        ";
                echo $this->env->getExtension('sonata_admin')->renderListElement($this->getContext($context, "object"), $this->getContext($context, "field_description"));
                echo "
    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_description'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_list_inner_row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 16,  31 => 15,  29 => 14,  26 => 13,  22 => 12,  19 => 11,  594 => 184,  583 => 182,  579 => 181,  571 => 178,  566 => 176,  560 => 174,  558 => 173,  552 => 169,  543 => 166,  539 => 165,  533 => 164,  530 => 163,  526 => 162,  521 => 160,  514 => 158,  509 => 156,  502 => 155,  499 => 154,  496 => 153,  491 => 150,  487 => 137,  484 => 136,  480 => 135,  477 => 134,  474 => 133,  470 => 126,  466 => 125,  463 => 124,  458 => 107,  447 => 105,  443 => 104,  436 => 100,  432 => 99,  427 => 98,  424 => 97,  412 => 86,  409 => 85,  405 => 109,  403 => 97,  399 => 95,  397 => 85,  394 => 84,  391 => 83,  386 => 138,  384 => 133,  378 => 129,  374 => 127,  372 => 124,  369 => 123,  364 => 120,  350 => 119,  341 => 118,  324 => 117,  319 => 116,  317 => 115,  313 => 113,  308 => 111,  305 => 110,  302 => 83,  299 => 82,  297 => 81,  292 => 79,  289 => 78,  286 => 77,  281 => 74,  266 => 72,  263 => 71,  260 => 70,  243 => 69,  240 => 68,  237 => 67,  231 => 63,  225 => 62,  222 => 61,  218 => 59,  214 => 58,  209 => 57,  203 => 56,  191 => 55,  189 => 54,  186 => 53,  183 => 52,  180 => 51,  177 => 50,  174 => 49,  171 => 48,  168 => 47,  165 => 46,  162 => 45,  159 => 44,  157 => 43,  153 => 41,  147 => 37,  144 => 36,  140 => 35,  136 => 33,  133 => 32,  128 => 23,  124 => 150,  121 => 149,  115 => 146,  112 => 145,  109 => 144,  105 => 142,  103 => 141,  100 => 140,  98 => 77,  95 => 76,  93 => 67,  90 => 66,  88 => 32,  85 => 31,  80 => 29,  75 => 28,  72 => 27,  69 => 26,  67 => 25,  64 => 24,  61 => 23,  58 => 22,  52 => 20,  47 => 17,  45 => 16,  42 => 15,  39 => 14,);
    }
}
