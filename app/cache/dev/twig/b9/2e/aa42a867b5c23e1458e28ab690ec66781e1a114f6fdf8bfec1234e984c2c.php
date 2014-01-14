<?php

/* SonataDoctrineORMAdminBundle:Block:block_audit.html.twig */
class __TwigTemplate_b92eaa42a867b5c23e1458e28ab690ec66781e1a114f6fdf8bfec1234e984c2c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataBlockBundle:Block:block_base.html.twig");

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataBlockBundle:Block:block_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_block($context, array $blocks = array())
    {
        // line 14
        echo "    <h3>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_audit_log", array(), "SonataAdminBundle"), "html", null, true);
        echo "</h3>

    <div>
        ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "revisions"));
        foreach ($context['_seq'] as $context["_key"] => $context["revision"]) {
            // line 18
            echo "            <div>
                ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "revision"), "revision"), "rev"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "revision"), "revision"), "username"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "revision"), "revision"), "timestamp")), "html", null, true);
            echo "

                <ul>
                    ";
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "revision"), "entities"));
            foreach ($context['_seq'] as $context["_key"] => $context["changedEntity"]) {
                // line 23
                echo "                        <li>
                            ";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "changedEntity"), "entity"), "html", null, true);
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "changedEntity"), "revisionType"), "html", null, true);
                echo " / ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "changedEntity"), "className"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "changedEntity"), "id"), "html", null, true);
                echo "
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['changedEntity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                </ul>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['revision'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:Block:block_audit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 27,  181 => 80,  148 => 64,  690 => 411,  681 => 405,  676 => 402,  674 => 397,  664 => 394,  659 => 392,  654 => 390,  650 => 388,  643 => 381,  639 => 380,  633 => 377,  629 => 376,  623 => 373,  613 => 366,  605 => 361,  595 => 354,  588 => 350,  581 => 346,  577 => 344,  575 => 341,  573 => 340,  567 => 337,  557 => 330,  550 => 326,  538 => 319,  531 => 312,  526 => 310,  514 => 306,  509 => 304,  504 => 302,  492 => 295,  486 => 292,  481 => 290,  456 => 273,  452 => 272,  445 => 267,  443 => 261,  429 => 255,  424 => 254,  422 => 250,  420 => 249,  415 => 247,  383 => 224,  361 => 208,  346 => 196,  331 => 187,  326 => 185,  304 => 174,  291 => 169,  272 => 158,  257 => 149,  242 => 140,  152 => 92,  114 => 71,  97 => 63,  58 => 23,  321 => 183,  318 => 122,  316 => 121,  299 => 112,  288 => 107,  284 => 106,  281 => 105,  275 => 103,  253 => 148,  250 => 93,  232 => 136,  222 => 81,  210 => 75,  191 => 69,  185 => 68,  153 => 56,  113 => 41,  100 => 36,  406 => 158,  403 => 157,  401 => 156,  394 => 152,  390 => 150,  369 => 141,  366 => 210,  364 => 139,  352 => 135,  349 => 133,  342 => 129,  336 => 126,  332 => 125,  328 => 124,  315 => 118,  296 => 109,  290 => 106,  280 => 101,  277 => 100,  274 => 98,  267 => 156,  261 => 91,  256 => 96,  244 => 85,  239 => 83,  234 => 80,  228 => 83,  225 => 77,  215 => 78,  198 => 69,  195 => 68,  184 => 63,  180 => 62,  174 => 64,  155 => 53,  127 => 56,  124 => 31,  81 => 25,  194 => 88,  186 => 83,  170 => 74,  165 => 59,  160 => 58,  150 => 55,  129 => 57,  65 => 30,  671 => 293,  621 => 245,  615 => 242,  610 => 239,  608 => 238,  600 => 232,  596 => 230,  590 => 229,  566 => 226,  561 => 224,  558 => 223,  555 => 222,  551 => 221,  548 => 220,  545 => 219,  542 => 321,  523 => 215,  518 => 307,  515 => 212,  511 => 211,  508 => 210,  505 => 209,  502 => 208,  483 => 205,  478 => 203,  475 => 202,  471 => 201,  454 => 196,  451 => 195,  449 => 194,  439 => 260,  436 => 188,  434 => 187,  431 => 186,  426 => 183,  417 => 179,  408 => 177,  404 => 176,  396 => 234,  389 => 171,  378 => 144,  376 => 161,  373 => 142,  359 => 138,  351 => 152,  344 => 150,  340 => 149,  327 => 138,  325 => 137,  317 => 133,  311 => 132,  301 => 111,  297 => 127,  293 => 109,  289 => 125,  286 => 124,  279 => 104,  265 => 99,  263 => 109,  260 => 98,  255 => 105,  237 => 86,  233 => 97,  226 => 95,  213 => 126,  202 => 81,  200 => 70,  197 => 119,  192 => 65,  175 => 77,  146 => 49,  134 => 45,  126 => 42,  53 => 14,  161 => 71,  90 => 15,  84 => 39,  520 => 44,  513 => 403,  510 => 402,  506 => 400,  501 => 398,  496 => 397,  479 => 383,  468 => 200,  466 => 280,  347 => 151,  335 => 188,  333 => 257,  137 => 59,  110 => 48,  104 => 67,  76 => 57,  20 => 1,  34 => 16,  23 => 18,  480 => 162,  474 => 285,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 191,  440 => 148,  437 => 147,  435 => 258,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 242,  402 => 130,  398 => 129,  393 => 172,  387 => 122,  384 => 147,  381 => 120,  379 => 119,  374 => 116,  368 => 157,  365 => 111,  362 => 110,  360 => 109,  355 => 136,  341 => 260,  337 => 103,  322 => 136,  314 => 99,  312 => 177,  309 => 117,  305 => 115,  298 => 173,  294 => 90,  285 => 89,  283 => 166,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 88,  247 => 78,  241 => 84,  229 => 73,  220 => 80,  214 => 69,  177 => 61,  169 => 74,  140 => 55,  132 => 58,  128 => 49,  107 => 36,  61 => 25,  273 => 200,  269 => 100,  254 => 92,  243 => 89,  240 => 86,  238 => 139,  235 => 74,  230 => 96,  227 => 134,  224 => 71,  221 => 75,  219 => 129,  217 => 79,  208 => 124,  204 => 73,  179 => 107,  159 => 70,  143 => 48,  135 => 81,  119 => 28,  102 => 37,  71 => 27,  67 => 28,  63 => 24,  59 => 23,  38 => 17,  94 => 33,  89 => 40,  85 => 30,  75 => 28,  68 => 31,  56 => 40,  26 => 14,  87 => 33,  31 => 14,  201 => 72,  196 => 90,  183 => 73,  171 => 102,  166 => 100,  163 => 62,  158 => 67,  156 => 93,  151 => 57,  142 => 61,  138 => 36,  136 => 52,  121 => 53,  117 => 51,  105 => 47,  91 => 27,  62 => 24,  49 => 21,  25 => 4,  21 => 12,  28 => 13,  24 => 13,  19 => 11,  93 => 68,  88 => 60,  78 => 36,  46 => 35,  44 => 19,  27 => 6,  79 => 26,  72 => 56,  69 => 50,  47 => 21,  40 => 18,  37 => 17,  22 => 12,  246 => 86,  157 => 30,  145 => 52,  139 => 60,  131 => 48,  123 => 54,  120 => 40,  115 => 50,  111 => 40,  108 => 39,  101 => 73,  98 => 44,  96 => 17,  83 => 25,  74 => 34,  66 => 25,  55 => 22,  52 => 21,  50 => 20,  43 => 33,  41 => 18,  35 => 16,  32 => 16,  29 => 15,  209 => 73,  203 => 122,  199 => 67,  193 => 73,  189 => 64,  187 => 84,  182 => 80,  176 => 65,  173 => 65,  168 => 60,  164 => 72,  162 => 55,  154 => 67,  149 => 50,  147 => 90,  144 => 62,  141 => 48,  133 => 55,  130 => 57,  125 => 45,  122 => 44,  116 => 41,  112 => 49,  109 => 69,  106 => 36,  103 => 46,  99 => 26,  95 => 43,  92 => 61,  86 => 64,  82 => 33,  80 => 19,  73 => 29,  64 => 23,  60 => 22,  57 => 22,  54 => 18,  51 => 21,  48 => 40,  45 => 19,  42 => 18,  39 => 17,  36 => 17,  33 => 9,  30 => 15,);
    }
}
