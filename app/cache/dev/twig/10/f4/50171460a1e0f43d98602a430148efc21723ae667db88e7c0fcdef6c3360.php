<?php

/* SabaFarmaciaBundle:SalidaPorReceta:crear.html.twig */
class __TwigTemplate_10f450171460a1e0f43d98602a430148efc21723ae667db88e7c0fcdef6c3360 extends Twig_Template
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
        // line 3
        echo $this->env->getExtension('knp_menu')->render("SabaFarmaciaBundle:Builder:mainMenu");
        echo "
";
        // line 4
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_start');
        echo "
    ";
        // line 6
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "numero"), 'row');
        echo "
    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "receta"), 'row');
        echo "

    <ul class=\"tags\" data-prototype=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "movimientos"), "vars"), "prototype"), 'widget'));
        echo "\">
        ";
        // line 11
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "movimientos"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimiento"]) {
            // line 12
            echo "            <li>";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "movimiento"), "fechaDeRegistro"), 'row');
            echo "</li>
            <li>";
            // line 13
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "movimiento"), "fechaDeEjecucion"), 'row');
            echo "</li>
            <li>";
            // line 14
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "movimiento"), "almacenOrigen"), 'row');
            echo "</li>
            <li>";
            // line 15
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "movimiento"), "almacenDestino"), 'row');
            echo "</li>
            <li>";
            // line 16
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "movimiento"), "articulo"), 'row');
            echo "</li>
            <li>";
            // line 17
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "movimiento"), "cantidad"), 'row');
            echo "</li>
            <li>";
            // line 18
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "movimiento"), "precioUnitario"), 'row');
            echo "</li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimiento'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    </ul>
";
        // line 21
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "form"), 'form_end');
        echo "

";
        // line 24
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-2.0.3.js"), "html", null, true);
        echo "\"></script>
    <script>
    var \$collectionHolder;

    // setup an \"add a tag\" link
    var \$addTagLink = \$('<a href=\"#\" class=\"add_tag_link\">Add a tag</a>');
    var \$newLinkLi = \$('<li></li>').append(\$addTagLink);

    jQuery(document).ready(function() {
            alert(\"HOLA\");

        // Get the ul that holds the collection of tags
        \$collectionHolder = \$('ul.tags');

        // add the \"add a tag\" anchor and li to the tags ul
        \$collectionHolder.append(\$newLinkLi);

        // count the current form inputs we have (e.g. 2), use that as the new
        // index when inserting a new item (e.g. 2)
        \$collectionHolder.data('index', \$collectionHolder.find(':input').length);

        \$addTagLink.on('click', function(e) {
            // prevent the link from creating a \"#\" on the URL
            e.preventDefault();

            // add a new tag form (see next code block)
            addTagForm(\$collectionHolder, \$newLinkLi);
        });
    });
    
    function addTagForm(\$collectionHolder, \$newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = \$collectionHolder.data('prototype');
        alert(\$collectionHolder.data('prototype'));

        // get the new index
        var index = \$collectionHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index);

        // increase the index with one for the next item
        \$collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the \"Add a tag\" link li
        var \$newFormLi = \$('<li></li>').append(newForm);
        \$newLinkLi.before(\$newFormLi);
        alert(newForm);
    }
</script>";
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
        return array (  23 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 18,  67 => 17,  63 => 16,  59 => 15,  38 => 6,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 14,  56 => 9,  26 => 6,  87 => 24,  31 => 4,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  25 => 3,  21 => 2,  28 => 3,  24 => 4,  19 => 3,  93 => 28,  88 => 6,  78 => 21,  46 => 12,  44 => 12,  27 => 6,  79 => 20,  72 => 16,  69 => 25,  47 => 9,  40 => 7,  37 => 9,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 14,  66 => 15,  55 => 14,  52 => 21,  50 => 10,  43 => 8,  41 => 11,  35 => 5,  32 => 7,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 36,  103 => 32,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 21,  80 => 19,  73 => 19,  64 => 17,  60 => 6,  57 => 11,  54 => 10,  51 => 13,  48 => 13,  45 => 17,  42 => 7,  39 => 9,  36 => 5,  33 => 4,  30 => 7,);
    }
}
