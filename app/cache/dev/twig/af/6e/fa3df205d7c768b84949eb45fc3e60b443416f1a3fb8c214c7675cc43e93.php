<?php

/* SonataDoctrineORMAdminBundle:CRUD:list_orm_many_to_one.html.twig */
class __TwigTemplate_af6efa3df205d7c768b84949eb45fc3e60b443416f1a3fb8c214c7675cc43e93 extends Twig_Template
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
        echo "    ";
        if ($this->getContext($context, "value")) {
            // line 16
            echo "        ";
            if ((($this->getAttribute($this->getContext($context, "field_description"), "hasAssociationAdmin") && $this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "associationadmin"), "hasRoute", array(0 => "edit"), "method")) && $this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "associationadmin"), "isGranted", array(0 => "EDIT", 1 => $this->getContext($context, "value")), "method"))) {
                // line 17
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "associationadmin"), "generateObjectUrl", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "options"), "route"), "name"), 1 => $this->getContext($context, "value"), 2 => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "options"), "route"), "parameters")), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($this->getContext($context, "value"), $this->getContext($context, "field_description")), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 19
                echo "            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($this->getContext($context, "value"), $this->getContext($context, "field_description")), "html", null, true);
                echo "
        ";
            }
            // line 21
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:CRUD:list_orm_many_to_one.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  406 => 158,  403 => 157,  401 => 156,  394 => 152,  390 => 150,  369 => 141,  366 => 140,  364 => 139,  352 => 135,  349 => 133,  342 => 129,  336 => 126,  332 => 125,  328 => 124,  315 => 118,  296 => 109,  290 => 106,  280 => 101,  277 => 100,  274 => 98,  267 => 94,  261 => 91,  256 => 89,  244 => 85,  239 => 83,  234 => 80,  228 => 78,  225 => 77,  215 => 74,  198 => 69,  195 => 68,  184 => 63,  180 => 62,  174 => 60,  155 => 53,  127 => 32,  124 => 41,  81 => 30,  194 => 87,  186 => 82,  170 => 74,  165 => 72,  160 => 70,  150 => 65,  129 => 57,  65 => 30,  671 => 293,  621 => 245,  615 => 242,  610 => 239,  608 => 238,  600 => 232,  596 => 230,  590 => 229,  566 => 226,  561 => 224,  558 => 223,  555 => 222,  551 => 221,  548 => 220,  545 => 219,  542 => 218,  523 => 215,  518 => 213,  515 => 212,  511 => 211,  508 => 210,  505 => 209,  502 => 208,  483 => 205,  478 => 203,  475 => 202,  471 => 201,  454 => 196,  451 => 195,  449 => 194,  439 => 189,  436 => 188,  434 => 187,  431 => 186,  426 => 183,  417 => 179,  408 => 177,  404 => 176,  396 => 173,  389 => 171,  378 => 144,  376 => 161,  373 => 142,  359 => 138,  351 => 152,  344 => 150,  340 => 149,  327 => 138,  325 => 137,  317 => 133,  311 => 132,  301 => 111,  297 => 127,  293 => 126,  289 => 125,  286 => 124,  279 => 122,  265 => 110,  263 => 109,  260 => 108,  255 => 105,  237 => 98,  233 => 97,  226 => 95,  213 => 90,  202 => 81,  200 => 70,  197 => 79,  192 => 65,  175 => 71,  146 => 49,  134 => 45,  126 => 42,  53 => 14,  161 => 32,  90 => 15,  84 => 39,  520 => 44,  513 => 403,  510 => 402,  506 => 400,  501 => 398,  496 => 397,  479 => 383,  468 => 200,  466 => 199,  347 => 151,  335 => 258,  333 => 257,  137 => 46,  110 => 45,  104 => 42,  76 => 24,  20 => 1,  34 => 16,  23 => 4,  480 => 162,  474 => 382,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 191,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 172,  387 => 122,  384 => 147,  381 => 120,  379 => 119,  374 => 116,  368 => 157,  365 => 111,  362 => 110,  360 => 109,  355 => 136,  341 => 260,  337 => 103,  322 => 136,  314 => 99,  312 => 98,  309 => 97,  305 => 129,  298 => 91,  294 => 90,  285 => 89,  283 => 102,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 88,  247 => 78,  241 => 84,  229 => 73,  220 => 92,  214 => 69,  177 => 61,  169 => 57,  140 => 55,  132 => 44,  128 => 49,  107 => 36,  61 => 13,  273 => 200,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 96,  227 => 81,  224 => 71,  221 => 75,  219 => 76,  217 => 91,  208 => 68,  204 => 72,  179 => 72,  159 => 61,  143 => 48,  135 => 35,  119 => 28,  102 => 38,  71 => 27,  67 => 27,  63 => 16,  59 => 23,  38 => 6,  94 => 33,  89 => 40,  85 => 33,  75 => 17,  68 => 31,  56 => 21,  26 => 14,  87 => 33,  31 => 15,  201 => 92,  196 => 90,  183 => 73,  171 => 70,  166 => 71,  163 => 62,  158 => 67,  156 => 68,  151 => 57,  142 => 59,  138 => 36,  136 => 52,  121 => 46,  117 => 51,  105 => 39,  91 => 27,  62 => 29,  49 => 21,  25 => 4,  21 => 12,  28 => 14,  24 => 12,  19 => 11,  93 => 34,  88 => 31,  78 => 24,  46 => 12,  44 => 9,  27 => 6,  79 => 26,  72 => 25,  69 => 24,  47 => 19,  40 => 13,  37 => 8,  22 => 12,  246 => 86,  157 => 30,  145 => 46,  139 => 60,  131 => 50,  123 => 54,  120 => 40,  115 => 42,  111 => 40,  108 => 48,  101 => 41,  98 => 37,  96 => 17,  83 => 25,  74 => 34,  66 => 15,  55 => 22,  52 => 21,  50 => 20,  43 => 19,  41 => 18,  35 => 17,  32 => 16,  29 => 15,  209 => 73,  203 => 71,  199 => 67,  193 => 73,  189 => 64,  187 => 84,  182 => 80,  176 => 77,  173 => 65,  168 => 69,  164 => 68,  162 => 55,  154 => 29,  149 => 50,  147 => 58,  144 => 62,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 23,  116 => 41,  112 => 49,  109 => 40,  106 => 36,  103 => 46,  99 => 26,  95 => 43,  92 => 36,  86 => 30,  82 => 12,  80 => 19,  73 => 29,  64 => 26,  60 => 25,  57 => 20,  54 => 18,  51 => 13,  48 => 13,  45 => 19,  42 => 8,  39 => 17,  36 => 16,  33 => 9,  30 => 15,);
    }
}
