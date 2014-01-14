<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/farmacia')) {
            // saba_farmacia_inicio
            if ($pathinfo === '/farmacia') {
                return array (  '_controller' => 'Saba\\FarmaciaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'saba_farmacia_inicio',);
            }

            if (0 === strpos($pathinfo, '/farmacia/entradas')) {
                // saba_farmacia_entradas
                if ($pathinfo === '/farmacia/entradas') {
                    return array (  '_controller' => 'SabaFarmaciaBundle:Entradas:index',  '_route' => 'saba_farmacia_entradas',);
                }

                // saba_farmacia_entradas_por_factura
                if ($pathinfo === '/farmacia/entradas/por_factura') {
                    return array (  '_controller' => 'SabaFarmaciaBundle:Entradas:index',  '_route' => 'saba_farmacia_entradas_por_factura',);
                }

                // saba_farmacia_entradas_otras
                if ($pathinfo === '/farmacia/entradas/otras') {
                    return array (  '_controller' => 'Saba\\FarmaciaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'saba_farmacia_entradas_otras',);
                }

            }

            if (0 === strpos($pathinfo, '/farmacia/salidas')) {
                // saba_farmacia_salidas
                if ($pathinfo === '/farmacia/salidas') {
                    return array (  '_controller' => 'Saba\\FarmaciaBundle\\Controller\\DefaultController::indexAction',  'name' => 'Saba',  '_route' => 'saba_farmacia_salidas',);
                }

                if (0 === strpos($pathinfo, '/farmacia/salidas/por_receta')) {
                    // saba_farmacia_salidas_por_receta_buscar
                    if (preg_match('#^/farmacia/salidas/por_receta/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_saba_farmacia_salidas_por_receta_buscar;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'saba_farmacia_salidas_por_receta_buscar')), array (  '_controller' => 'Saba\\FarmaciaBundle\\Controller\\SalidasPorRecetaController::buscarAction',));
                    }
                    not_saba_farmacia_salidas_por_receta_buscar:

                    // saba_farmacia_salidas_por_receta_eliminar
                    if (preg_match('#^/farmacia/salidas/por_receta/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('DELETE', 'GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('DELETE', 'GET', 'HEAD'));
                            goto not_saba_farmacia_salidas_por_receta_eliminar;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'saba_farmacia_salidas_por_receta_eliminar')), array (  '_controller' => 'Saba\\FarmaciaBundle\\Controller\\SalidasPorRecetaController::eliminarAction',));
                    }
                    not_saba_farmacia_salidas_por_receta_eliminar:

                    // saba_farmacia_salidas_por_receta_crear
                    if ($pathinfo === '/farmacia/salidas/por_receta') {
                        if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                            goto not_saba_farmacia_salidas_por_receta_crear;
                        }

                        return array (  '_controller' => 'Saba\\FarmaciaBundle\\Controller\\SalidasPorRecetaController::crearAction',  '_route' => 'saba_farmacia_salidas_por_receta_crear',);
                    }
                    not_saba_farmacia_salidas_por_receta_crear:

                    // saba_farmacia_salidas_por_receta_actualizar
                    if (preg_match('#^/farmacia/salidas/por_receta/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('PUT', 'GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('PUT', 'GET', 'HEAD'));
                            goto not_saba_farmacia_salidas_por_receta_actualizar;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'saba_farmacia_salidas_por_receta_actualizar')), array (  '_controller' => 'SabaFarmaciaBundle::SalidasPorReceta:actualizar',));
                    }
                    not_saba_farmacia_salidas_por_receta_actualizar:

                }

                // saba_farmacia_salidas_otras
                if ($pathinfo === '/farmacia/salidas/otras') {
                    return array (  '_controller' => 'Saba\\FarmaciaBundle\\Controller\\DefaultController::indexAction',  '_route' => 'saba_farmacia_salidas_otras',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_redirect
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_admin_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
            }

            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',));
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/s')) {
                // sonata_admin_search
                if ($pathinfo === '/admin/search') {
                    return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_route' => 'sonata_admin_search',);
                }

                if (0 === strpos($pathinfo, '/admin/saba/farmacia')) {
                    if (0 === strpos($pathinfo, '/admin/saba/farmacia/salidaporreceta')) {
                        // admin_saba_farmacia_salidaporreceta_list
                        if ($pathinfo === '/admin/saba/farmacia/salidaporreceta/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.salida_por_receta',  '_sonata_name' => 'admin_saba_farmacia_salidaporreceta_list',  '_route' => 'admin_saba_farmacia_salidaporreceta_list',);
                        }

                        // admin_saba_farmacia_salidaporreceta_create
                        if ($pathinfo === '/admin/saba/farmacia/salidaporreceta/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.salida_por_receta',  '_sonata_name' => 'admin_saba_farmacia_salidaporreceta_create',  '_route' => 'admin_saba_farmacia_salidaporreceta_create',);
                        }

                        // admin_saba_farmacia_salidaporreceta_batch
                        if ($pathinfo === '/admin/saba/farmacia/salidaporreceta/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.salida_por_receta',  '_sonata_name' => 'admin_saba_farmacia_salidaporreceta_batch',  '_route' => 'admin_saba_farmacia_salidaporreceta_batch',);
                        }

                        // admin_saba_farmacia_salidaporreceta_edit
                        if (preg_match('#^/admin/saba/farmacia/salidaporreceta/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_salidaporreceta_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.salida_por_receta',  '_sonata_name' => 'admin_saba_farmacia_salidaporreceta_edit',));
                        }

                        // admin_saba_farmacia_salidaporreceta_delete
                        if (preg_match('#^/admin/saba/farmacia/salidaporreceta/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_salidaporreceta_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.salida_por_receta',  '_sonata_name' => 'admin_saba_farmacia_salidaporreceta_delete',));
                        }

                        // admin_saba_farmacia_salidaporreceta_show
                        if (preg_match('#^/admin/saba/farmacia/salidaporreceta/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_salidaporreceta_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.salida_por_receta',  '_sonata_name' => 'admin_saba_farmacia_salidaporreceta_show',));
                        }

                        // admin_saba_farmacia_salidaporreceta_export
                        if ($pathinfo === '/admin/saba/farmacia/salidaporreceta/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.salida_por_receta',  '_sonata_name' => 'admin_saba_farmacia_salidaporreceta_export',  '_route' => 'admin_saba_farmacia_salidaporreceta_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/saba/farmacia/receta')) {
                        // admin_saba_farmacia_receta_list
                        if ($pathinfo === '/admin/saba/farmacia/receta/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.receta',  '_sonata_name' => 'admin_saba_farmacia_receta_list',  '_route' => 'admin_saba_farmacia_receta_list',);
                        }

                        // admin_saba_farmacia_receta_create
                        if ($pathinfo === '/admin/saba/farmacia/receta/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.receta',  '_sonata_name' => 'admin_saba_farmacia_receta_create',  '_route' => 'admin_saba_farmacia_receta_create',);
                        }

                        // admin_saba_farmacia_receta_batch
                        if ($pathinfo === '/admin/saba/farmacia/receta/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.receta',  '_sonata_name' => 'admin_saba_farmacia_receta_batch',  '_route' => 'admin_saba_farmacia_receta_batch',);
                        }

                        // admin_saba_farmacia_receta_edit
                        if (preg_match('#^/admin/saba/farmacia/receta/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_receta_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.receta',  '_sonata_name' => 'admin_saba_farmacia_receta_edit',));
                        }

                        // admin_saba_farmacia_receta_delete
                        if (preg_match('#^/admin/saba/farmacia/receta/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_receta_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.receta',  '_sonata_name' => 'admin_saba_farmacia_receta_delete',));
                        }

                        // admin_saba_farmacia_receta_show
                        if (preg_match('#^/admin/saba/farmacia/receta/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_receta_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.receta',  '_sonata_name' => 'admin_saba_farmacia_receta_show',));
                        }

                        // admin_saba_farmacia_receta_export
                        if ($pathinfo === '/admin/saba/farmacia/receta/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.receta',  '_sonata_name' => 'admin_saba_farmacia_receta_export',  '_route' => 'admin_saba_farmacia_receta_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/saba/farmacia/medico')) {
                        // admin_saba_farmacia_medico_list
                        if ($pathinfo === '/admin/saba/farmacia/medico/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.medico',  '_sonata_name' => 'admin_saba_farmacia_medico_list',  '_route' => 'admin_saba_farmacia_medico_list',);
                        }

                        // admin_saba_farmacia_medico_create
                        if ($pathinfo === '/admin/saba/farmacia/medico/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.medico',  '_sonata_name' => 'admin_saba_farmacia_medico_create',  '_route' => 'admin_saba_farmacia_medico_create',);
                        }

                        // admin_saba_farmacia_medico_batch
                        if ($pathinfo === '/admin/saba/farmacia/medico/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.medico',  '_sonata_name' => 'admin_saba_farmacia_medico_batch',  '_route' => 'admin_saba_farmacia_medico_batch',);
                        }

                        // admin_saba_farmacia_medico_edit
                        if (preg_match('#^/admin/saba/farmacia/medico/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_medico_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.medico',  '_sonata_name' => 'admin_saba_farmacia_medico_edit',));
                        }

                        // admin_saba_farmacia_medico_delete
                        if (preg_match('#^/admin/saba/farmacia/medico/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_medico_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.medico',  '_sonata_name' => 'admin_saba_farmacia_medico_delete',));
                        }

                        // admin_saba_farmacia_medico_show
                        if (preg_match('#^/admin/saba/farmacia/medico/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_medico_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.medico',  '_sonata_name' => 'admin_saba_farmacia_medico_show',));
                        }

                        // admin_saba_farmacia_medico_export
                        if ($pathinfo === '/admin/saba/farmacia/medico/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.medico',  '_sonata_name' => 'admin_saba_farmacia_medico_export',  '_route' => 'admin_saba_farmacia_medico_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/saba/farmacia/paciente')) {
                        // admin_saba_farmacia_paciente_list
                        if ($pathinfo === '/admin/saba/farmacia/paciente/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.paciente',  '_sonata_name' => 'admin_saba_farmacia_paciente_list',  '_route' => 'admin_saba_farmacia_paciente_list',);
                        }

                        // admin_saba_farmacia_paciente_create
                        if ($pathinfo === '/admin/saba/farmacia/paciente/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.paciente',  '_sonata_name' => 'admin_saba_farmacia_paciente_create',  '_route' => 'admin_saba_farmacia_paciente_create',);
                        }

                        // admin_saba_farmacia_paciente_batch
                        if ($pathinfo === '/admin/saba/farmacia/paciente/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.paciente',  '_sonata_name' => 'admin_saba_farmacia_paciente_batch',  '_route' => 'admin_saba_farmacia_paciente_batch',);
                        }

                        // admin_saba_farmacia_paciente_edit
                        if (preg_match('#^/admin/saba/farmacia/paciente/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_paciente_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.paciente',  '_sonata_name' => 'admin_saba_farmacia_paciente_edit',));
                        }

                        // admin_saba_farmacia_paciente_delete
                        if (preg_match('#^/admin/saba/farmacia/paciente/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_paciente_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.paciente',  '_sonata_name' => 'admin_saba_farmacia_paciente_delete',));
                        }

                        // admin_saba_farmacia_paciente_show
                        if (preg_match('#^/admin/saba/farmacia/paciente/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_paciente_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.paciente',  '_sonata_name' => 'admin_saba_farmacia_paciente_show',));
                        }

                        // admin_saba_farmacia_paciente_export
                        if ($pathinfo === '/admin/saba/farmacia/paciente/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.paciente',  '_sonata_name' => 'admin_saba_farmacia_paciente_export',  '_route' => 'admin_saba_farmacia_paciente_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/saba/farmacia/medicamento')) {
                        // admin_saba_farmacia_medicamento_list
                        if ($pathinfo === '/admin/saba/farmacia/medicamento/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.medicamento',  '_sonata_name' => 'admin_saba_farmacia_medicamento_list',  '_route' => 'admin_saba_farmacia_medicamento_list',);
                        }

                        // admin_saba_farmacia_medicamento_create
                        if ($pathinfo === '/admin/saba/farmacia/medicamento/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.medicamento',  '_sonata_name' => 'admin_saba_farmacia_medicamento_create',  '_route' => 'admin_saba_farmacia_medicamento_create',);
                        }

                        // admin_saba_farmacia_medicamento_batch
                        if ($pathinfo === '/admin/saba/farmacia/medicamento/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.medicamento',  '_sonata_name' => 'admin_saba_farmacia_medicamento_batch',  '_route' => 'admin_saba_farmacia_medicamento_batch',);
                        }

                        // admin_saba_farmacia_medicamento_edit
                        if (preg_match('#^/admin/saba/farmacia/medicamento/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_medicamento_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.medicamento',  '_sonata_name' => 'admin_saba_farmacia_medicamento_edit',));
                        }

                        // admin_saba_farmacia_medicamento_delete
                        if (preg_match('#^/admin/saba/farmacia/medicamento/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_medicamento_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.medicamento',  '_sonata_name' => 'admin_saba_farmacia_medicamento_delete',));
                        }

                        // admin_saba_farmacia_medicamento_show
                        if (preg_match('#^/admin/saba/farmacia/medicamento/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_medicamento_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.medicamento',  '_sonata_name' => 'admin_saba_farmacia_medicamento_show',));
                        }

                        // admin_saba_farmacia_medicamento_export
                        if ($pathinfo === '/admin/saba/farmacia/medicamento/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.medicamento',  '_sonata_name' => 'admin_saba_farmacia_medicamento_export',  '_route' => 'admin_saba_farmacia_medicamento_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/saba/farmacia/recetatienelineas')) {
                        // admin_saba_farmacia_recetatienelineas_list
                        if ($pathinfo === '/admin/saba/farmacia/recetatienelineas/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.receta_tiene_lineas',  '_sonata_name' => 'admin_saba_farmacia_recetatienelineas_list',  '_route' => 'admin_saba_farmacia_recetatienelineas_list',);
                        }

                        // admin_saba_farmacia_recetatienelineas_create
                        if ($pathinfo === '/admin/saba/farmacia/recetatienelineas/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.receta_tiene_lineas',  '_sonata_name' => 'admin_saba_farmacia_recetatienelineas_create',  '_route' => 'admin_saba_farmacia_recetatienelineas_create',);
                        }

                        // admin_saba_farmacia_recetatienelineas_batch
                        if ($pathinfo === '/admin/saba/farmacia/recetatienelineas/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.receta_tiene_lineas',  '_sonata_name' => 'admin_saba_farmacia_recetatienelineas_batch',  '_route' => 'admin_saba_farmacia_recetatienelineas_batch',);
                        }

                        // admin_saba_farmacia_recetatienelineas_edit
                        if (preg_match('#^/admin/saba/farmacia/recetatienelineas/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_recetatienelineas_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.receta_tiene_lineas',  '_sonata_name' => 'admin_saba_farmacia_recetatienelineas_edit',));
                        }

                        // admin_saba_farmacia_recetatienelineas_delete
                        if (preg_match('#^/admin/saba/farmacia/recetatienelineas/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_recetatienelineas_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.receta_tiene_lineas',  '_sonata_name' => 'admin_saba_farmacia_recetatienelineas_delete',));
                        }

                        // admin_saba_farmacia_recetatienelineas_show
                        if (preg_match('#^/admin/saba/farmacia/recetatienelineas/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_recetatienelineas_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.receta_tiene_lineas',  '_sonata_name' => 'admin_saba_farmacia_recetatienelineas_show',));
                        }

                        // admin_saba_farmacia_recetatienelineas_export
                        if ($pathinfo === '/admin/saba/farmacia/recetatienelineas/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.receta_tiene_lineas',  '_sonata_name' => 'admin_saba_farmacia_recetatienelineas_export',  '_route' => 'admin_saba_farmacia_recetatienelineas_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/saba/farmacia/lineadereceta')) {
                        // admin_saba_farmacia_lineadereceta_list
                        if ($pathinfo === '/admin/saba/farmacia/lineadereceta/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.linea_de_recetas',  '_sonata_name' => 'admin_saba_farmacia_lineadereceta_list',  '_route' => 'admin_saba_farmacia_lineadereceta_list',);
                        }

                        // admin_saba_farmacia_lineadereceta_create
                        if ($pathinfo === '/admin/saba/farmacia/lineadereceta/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.linea_de_recetas',  '_sonata_name' => 'admin_saba_farmacia_lineadereceta_create',  '_route' => 'admin_saba_farmacia_lineadereceta_create',);
                        }

                        // admin_saba_farmacia_lineadereceta_batch
                        if ($pathinfo === '/admin/saba/farmacia/lineadereceta/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.linea_de_recetas',  '_sonata_name' => 'admin_saba_farmacia_lineadereceta_batch',  '_route' => 'admin_saba_farmacia_lineadereceta_batch',);
                        }

                        // admin_saba_farmacia_lineadereceta_edit
                        if (preg_match('#^/admin/saba/farmacia/lineadereceta/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_lineadereceta_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.linea_de_recetas',  '_sonata_name' => 'admin_saba_farmacia_lineadereceta_edit',));
                        }

                        // admin_saba_farmacia_lineadereceta_delete
                        if (preg_match('#^/admin/saba/farmacia/lineadereceta/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_lineadereceta_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.linea_de_recetas',  '_sonata_name' => 'admin_saba_farmacia_lineadereceta_delete',));
                        }

                        // admin_saba_farmacia_lineadereceta_show
                        if (preg_match('#^/admin/saba/farmacia/lineadereceta/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_saba_farmacia_lineadereceta_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.linea_de_recetas',  '_sonata_name' => 'admin_saba_farmacia_lineadereceta_show',));
                        }

                        // admin_saba_farmacia_lineadereceta_export
                        if ($pathinfo === '/admin/saba/farmacia/lineadereceta/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.linea_de_recetas',  '_sonata_name' => 'admin_saba_farmacia_lineadereceta_export',  '_route' => 'admin_saba_farmacia_lineadereceta_export',);
                        }

                    }

                }

            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
