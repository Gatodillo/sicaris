<?php

/* SonataAdminBundle:CRUD:base_list.html.twig */
class __TwigTemplate_02cbd7a9e43a15e3c19fbab0543f7f9e5b94c2434770e8c35e7469e61923c4d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'actions' => array($this, 'block_actions'),
            'side_menu' => array($this, 'block_side_menu'),
            'list_table' => array($this, 'block_list_table'),
            'list_header' => array($this, 'block_list_header'),
            'table_header' => array($this, 'block_table_header'),
            'table_body' => array($this, 'block_table_body'),
            'table_footer' => array($this, 'block_table_footer'),
            'batch' => array($this, 'block_batch'),
            'batch_javascript' => array($this, 'block_batch_javascript'),
            'batch_actions' => array($this, 'block_batch_actions'),
            'pager_results' => array($this, 'block_pager_results'),
            'pager_links' => array($this, 'block_pager_links'),
            'list_footer' => array($this, 'block_list_footer'),
            'list_filters' => array($this, 'block_list_filters'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getContext($context, "base_template"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_actions($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"sonata-actions btn-group\">
        ";
        // line 16
        $this->env->loadTemplate("SonataAdminBundle:Core:create_button.html.twig")->display($context);
        // line 17
        echo "    </div>
";
    }

    // line 20
    public function block_side_menu($context, array $blocks = array())
    {
        echo $this->env->getExtension('knp_menu')->render($this->getAttribute($this->getContext($context, "admin"), "sidemenu", array(0 => $this->getContext($context, "action")), "method"), array("currentClass" => "active"), "list");
    }

    // line 22
    public function block_list_table($context, array $blocks = array())
    {
        // line 23
        echo "    ";
        $this->displayBlock('list_header', $context, $blocks);
        // line 24
        echo "
    ";
        // line 25
        $context["batchactions"] = $this->getAttribute($this->getContext($context, "admin"), "batchactions");
        // line 26
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "results")) > 0)) {
            // line 27
            echo "        ";
            if ($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method")) {
                // line 28
                echo "        <form action=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "batch", 1 => array("filter" => $this->getAttribute($this->getContext($context, "admin"), "filterParameters"))), "method"), "html", null, true);
                echo "\" method=\"POST\" >
            <input type=\"hidden\" name=\"_sonata_csrf_token\" value=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->getContext($context, "csrf_token"), "html", null, true);
                echo "\" />
        ";
            }
            // line 31
            echo "            <table class=\"table table-bordered table-striped\">
                ";
            // line 32
            $this->displayBlock('table_header', $context, $blocks);
            // line 66
            echo "
                ";
            // line 67
            $this->displayBlock('table_body', $context, $blocks);
            // line 76
            echo "
                ";
            // line 77
            $this->displayBlock('table_footer', $context, $blocks);
            // line 140
            echo "            </table>
        ";
            // line 141
            if ($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method")) {
                // line 142
                echo "        </form>
        ";
            }
            // line 144
            echo "    ";
        } else {
            // line 145
            echo "        <p class=\"notice\">
            ";
            // line 146
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("no_result", array(), "SonataAdminBundle"), "html", null, true);
            echo "
        </p>
    ";
        }
        // line 149
        echo "
    ";
        // line 150
        $this->displayBlock('list_footer', $context, $blocks);
    }

    // line 23
    public function block_list_header($context, array $blocks = array())
    {
    }

    // line 32
    public function block_table_header($context, array $blocks = array())
    {
        // line 33
        echo "                    <thead>
                        <tr class=\"sonata-ba-list-field-header\">
                            ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "elements"));
        foreach ($context['_seq'] as $context["_key"] => $context["field_description"]) {
            // line 36
            echo "                                ";
            if ((($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method") && ($this->getAttribute($this->getContext($context, "field_description"), "getOption", array(0 => "code"), "method") == "_batch")) && (twig_length_filter($this->env, $this->getContext($context, "batchactions")) > 0))) {
                // line 37
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-batch\">
                                      <input type=\"checkbox\" id=\"list_batch_checkbox\" />
                                    </th>
                                ";
            } elseif (($this->getAttribute($this->getContext($context, "field_description"), "getOption", array(0 => "code"), "method") == "_select")) {
                // line 41
                echo "                                    <th class=\"sonata-ba-list-field-header sonata-ba-list-field-header-select\"></th>
                                ";
            } elseif ((($this->getAttribute($this->getContext($context, "field_description"), "name") == "_action") && $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "isXmlHttpRequest"))) {
                // line 43
                echo "                                        ";
                // line 44
                echo "                                ";
            } else {
                // line 45
                echo "                                    ";
                $context["sortable"] = false;
                // line 46
                echo "                                    ";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "field_description", true), "options", array(), "any", false, true), "sortable", array(), "any", true, true) && $this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "options"), "sortable"))) {
                    // line 47
                    echo "                                        ";
                    $context["sortable"] = true;
                    // line 48
                    echo "                                        ";
                    $context["sort_parameters"] = $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "sortparameters", array(0 => $this->getContext($context, "field_description"), 1 => $this->getAttribute($this->getContext($context, "admin"), "datagrid")), "method");
                    // line 49
                    echo "                                        ";
                    $context["current"] = (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "values"), "_sort_by") == $this->getContext($context, "field_description")) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "values"), "_sort_by"), "fieldName") == $this->getAttribute($this->getAttribute($this->getContext($context, "sort_parameters"), "filter"), "_sort_by")));
                    // line 50
                    echo "                                        ";
                    $context["sort_active_class"] = (($this->getContext($context, "current")) ? ("sonata-ba-list-field-order-active") : (""));
                    // line 51
                    echo "                                        ";
                    $context["sort_by"] = (($this->getContext($context, "current")) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "values"), "_sort_order")) : ($this->getAttribute($this->getAttribute($this->getContext($context, "field_description"), "options"), "_sort_order")));
                    // line 52
                    echo "                                    ";
                }
                // line 53
                echo "
                                    ";
                // line 54
                ob_start();
                // line 55
                echo "                                        <th class=\"sonata-ba-list-field-header-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "field_description"), "type"), "html", null, true);
                echo " ";
                if ($this->getContext($context, "sortable")) {
                    echo " sonata-ba-list-field-header-order-";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getContext($context, "sort_by")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getContext($context, "sort_active_class"), "html", null, true);
                }
                echo "\">
                                            ";
                // line 56
                if ($this->getContext($context, "sortable")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => $this->getContext($context, "sort_parameters")), "method"), "html", null, true);
                    echo "\">";
                }
                // line 57
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "trans", array(0 => $this->getAttribute($this->getContext($context, "field_description"), "label"), 1 => array(), 2 => $this->getAttribute($this->getContext($context, "field_description"), "translationDomain")), "method"), "html", null, true);
                echo "
                                            ";
                // line 58
                if ($this->getContext($context, "sortable")) {
                    echo "</a>";
                }
                // line 59
                echo "                                        </th>
                                    ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 61
                echo "                                ";
            }
            // line 62
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_description'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "                        </tr>
                    </thead>
                ";
    }

    // line 67
    public function block_table_body($context, array $blocks = array())
    {
        // line 68
        echo "                    <tbody>
                        ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "results"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["object"]) {
            // line 70
            echo "                            <tr>
                                ";
            // line 71
            $template = $this->env->resolveTemplate($this->getAttribute($this->getContext($context, "admin"), "getTemplate", array(0 => "inner_list_row"), "method"));
            $template->display($context);
            // line 72
            echo "                            </tr>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['object'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "                    </tbody>
                ";
    }

    // line 77
    public function block_table_footer($context, array $blocks = array())
    {
        // line 78
        echo "                    <tr>
                        <th colspan=\"";
        // line 79
        echo twig_escape_filter($this->env, (twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "elements")) - (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "isXmlHttpRequest")) ? (($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "has", array(0 => "_action"), "method") + $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "list"), "has", array(0 => "batch"), "method"))) : (0))), "html", null, true);
        echo "\">
                            <div class=\"form-inline\">
                                ";
        // line 81
        if ((!$this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "isXmlHttpRequest"))) {
            // line 82
            echo "                                    ";
            if (($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "batch"), "method") && (twig_length_filter($this->env, $this->getContext($context, "batchactions")) > 0))) {
                // line 83
                echo "                                        ";
                $this->displayBlock('batch', $context, $blocks);
                // line 110
                echo "
                                        <input type=\"submit\" class=\"btn btn-small btn-primary\" value=\"";
                // line 111
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_batch", array(), "SonataAdminBundle"), "html", null, true);
                echo "\"/>
                                    ";
            }
            // line 113
            echo "
                                    <div class=\"pull-right\">
                                        ";
            // line 115
            if ((($this->getAttribute($this->getContext($context, "admin"), "hasRoute", array(0 => "export"), "method") && $this->getAttribute($this->getContext($context, "admin"), "isGranted", array(0 => "EXPORT"), "method")) && twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "getExportFormats", array(), "method")))) {
                // line 116
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_export_download", array(), "SonataAdminBundle"), "html", null, true);
                echo "
                                            ";
                // line 117
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin"), "getExportFormats", array(), "method"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["format"]) {
                    // line 118
                    echo "                                                <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "export", 1 => ($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "modelmanager"), "paginationparameters", array(0 => $this->getAttribute($this->getContext($context, "admin"), "datagrid"), 1 => 0), "method") + array("format" => $this->getContext($context, "format")))), "method"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "format"), "html", null, true);
                    echo "</a>";
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo ",";
                    }
                    // line 119
                    echo "                                            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['format'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 120
                echo "
                                            &nbsp;-&nbsp;
                                        ";
            }
            // line 123
            echo "
                                        ";
            // line 124
            $this->displayBlock('pager_results', $context, $blocks);
            // line 127
            echo "                                    </div>
                                ";
        }
        // line 129
        echo "                            </div>
                        </th>
                    </tr>

                    ";
        // line 133
        $this->displayBlock('pager_links', $context, $blocks);
        // line 138
        echo "
                ";
    }

    // line 83
    public function block_batch($context, array $blocks = array())
    {
        // line 84
        echo "                                            <script type=\"text/javascript\">
                                                ";
        // line 85
        $this->displayBlock('batch_javascript', $context, $blocks);
        // line 95
        echo "                                            </script>

                                            ";
        // line 97
        $this->displayBlock('batch_actions', $context, $blocks);
        // line 109
        echo "                                        ";
    }

    // line 85
    public function block_batch_javascript($context, array $blocks = array())
    {
        // line 86
        echo "                                                    jQuery(document).ready(function (\$) {
                                                        \$('#list_batch_checkbox').click(function () {
                                                            \$(this).closest('table').find(\"td input[type='checkbox']\").attr('checked', \$(this).is(':checked')).parent().parent().toggleClass('sonata-ba-list-row-selected', \$(this).is(':checked'));
                                                        });
                                                        \$(\"td.sonata-ba-list-field-batch input[type='checkbox']\").change(function () {
                                                            \$(this).parent().parent().toggleClass('sonata-ba-list-row-selected', \$(this).is(':checked'));
                                                        });
                                                    });
                                                ";
    }

    // line 97
    public function block_batch_actions($context, array $blocks = array())
    {
        // line 98
        echo "                                                <label class=\"checkbox\" for=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
        echo "_all_elements\">
                                                    <input type=\"checkbox\" name=\"all_elements\" id=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "uniqid"), "html", null, true);
        echo "_all_elements\"/>
                                                    ";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("all_elements", array(), "SonataAdminBundle"), "html", null, true);
        echo "
                                                </label>

                                                <select name=\"action\" style=\"width: auto; height: auto\">
                                                    ";
        // line 104
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "batchactions"));
        foreach ($context['_seq'] as $context["action"] => $context["options"]) {
            // line 105
            echo "                                                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "action"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "options"), "label"), "html", null, true);
            echo "</option>
                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['action'], $context['options'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "                                                </select>
                                            ";
    }

    // line 124
    public function block_pager_results($context, array $blocks = array())
    {
        // line 125
        echo "                                            ";
        $template = $this->env->resolveTemplate($this->getAttribute($this->getContext($context, "admin"), "getTemplate", array(0 => "pager_results"), "method"));
        $template->display($context);
        // line 126
        echo "                                        ";
    }

    // line 133
    public function block_pager_links($context, array $blocks = array())
    {
        // line 134
        echo "                        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "pager"), "haveToPaginate", array(), "method")) {
            // line 135
            echo "                            ";
            $template = $this->env->resolveTemplate($this->getAttribute($this->getContext($context, "admin"), "getTemplate", array(0 => "pager_links"), "method"));
            $template->display($context);
            // line 136
            echo "                        ";
        }
        // line 137
        echo "                    ";
    }

    // line 150
    public function block_list_footer($context, array $blocks = array())
    {
    }

    // line 153
    public function block_list_filters($context, array $blocks = array())
    {
        // line 154
        echo "    ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "filters")) {
            // line 155
            echo "        <form class=\"sonata-filter-form ";
            echo ((($this->getAttribute($this->getContext($context, "admin"), "isChild") && (1 == twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "filters"))))) ? ("hide") : (""));
            echo "\" action=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list"), "method"), "html", null, true);
            echo "\" method=\"GET\">
            ";
            // line 156
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
            echo "
            <fieldset class=\"filter_legend\">
                <legend class=\"filter_legend ";
            // line 158
            echo (($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "hasActiveFilters")) ? ("active") : ("inactive"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label_filters", array(), "SonataAdminBundle"), "html", null, true);
            echo "</legend>

                <div class=\"filter_container ";
            // line 160
            echo (($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "hasActiveFilters")) ? ("active") : ("inactive"));
            echo "\">
                    <div>
                        ";
            // line 162
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "admin"), "datagrid"), "filters"));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 163
                echo "                            <div class=\"clearfix\">
                                <label for=\"";
                // line 164
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), $this->getAttribute($this->getContext($context, "filter"), "formName"), array(), "array"), "children"), "value", array(), "array"), "vars"), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "trans", array(0 => $this->getAttribute($this->getContext($context, "filter"), "label"), 1 => array(), 2 => $this->getAttribute($this->getContext($context, "filter"), "translationDomain")), "method"), "html", null, true);
                echo "</label>
                                ";
                // line 165
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), $this->getAttribute($this->getContext($context, "filter"), "formName"), array(), "array"), "children"), "type", array(), "array"), 'widget', array("attr" => array("class" => "span8 sonata-filter-option")));
                echo "
                                ";
                // line 166
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), $this->getAttribute($this->getContext($context, "filter"), "formName"), array(), "array"), "children"), "value", array(), "array"), 'widget', array("attr" => array("class" => "span8")));
                echo "
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 169
            echo "                    </div>

                    <input type=\"hidden\" name=\"filter[_page]\" id=\"filter__page\" value=\"1\" />

                    ";
            // line 173
            $context["foo"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "form"), "children"), "_page", array(), "array"), "setRendered", array(), "method");
            // line 174
            echo "                    ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
            echo "

                    <input type=\"submit\" class=\"btn btn-primary\" value=\"";
            // line 176
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("btn_filter", array(), "SonataAdminBundle"), "html", null, true);
            echo "\" />

                    <a class=\"btn\" href=\"";
            // line 178
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "admin"), "generateUrl", array(0 => "list", 1 => array("filters" => "reset")), "method"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_reset_filter", array(), "SonataAdminBundle"), "html", null, true);
            echo "</a>
                </div>

                ";
            // line 181
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "admin"), "persistentParameters"));
            foreach ($context['_seq'] as $context["paramKey"] => $context["paramValue"]) {
                // line 182
                echo "                    <input type=\"hidden\" name=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "paramKey"), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "paramValue"), "html", null, true);
                echo "\" />
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['paramKey'], $context['paramValue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 184
            echo "            </fieldset>
        </form>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  594 => 184,  583 => 182,  579 => 181,  571 => 178,  566 => 176,  560 => 174,  558 => 173,  552 => 169,  543 => 166,  539 => 165,  533 => 164,  530 => 163,  526 => 162,  521 => 160,  514 => 158,  509 => 156,  502 => 155,  499 => 154,  496 => 153,  491 => 150,  487 => 137,  484 => 136,  480 => 135,  477 => 134,  474 => 133,  470 => 126,  466 => 125,  463 => 124,  458 => 107,  447 => 105,  443 => 104,  436 => 100,  432 => 99,  427 => 98,  424 => 97,  412 => 86,  409 => 85,  405 => 109,  403 => 97,  399 => 95,  397 => 85,  394 => 84,  391 => 83,  386 => 138,  384 => 133,  378 => 129,  374 => 127,  372 => 124,  369 => 123,  364 => 120,  350 => 119,  341 => 118,  324 => 117,  319 => 116,  317 => 115,  313 => 113,  308 => 111,  305 => 110,  302 => 83,  299 => 82,  297 => 81,  292 => 79,  289 => 78,  286 => 77,  281 => 74,  266 => 72,  263 => 71,  260 => 70,  243 => 69,  240 => 68,  237 => 67,  231 => 63,  225 => 62,  222 => 61,  218 => 59,  214 => 58,  209 => 57,  203 => 56,  191 => 55,  189 => 54,  186 => 53,  183 => 52,  180 => 51,  177 => 50,  174 => 49,  171 => 48,  168 => 47,  165 => 46,  162 => 45,  159 => 44,  157 => 43,  153 => 41,  147 => 37,  144 => 36,  140 => 35,  136 => 33,  133 => 32,  128 => 23,  124 => 150,  121 => 149,  115 => 146,  112 => 145,  109 => 144,  105 => 142,  103 => 141,  100 => 140,  98 => 77,  95 => 76,  93 => 67,  90 => 66,  88 => 32,  85 => 31,  80 => 29,  75 => 28,  72 => 27,  69 => 26,  67 => 25,  64 => 24,  61 => 23,  58 => 22,  52 => 20,  47 => 17,  45 => 16,  42 => 15,  39 => 14,);
    }
}
