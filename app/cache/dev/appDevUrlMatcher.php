<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
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

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
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

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/zeus')) {
            // zeus_index
            if (rtrim($pathinfo, '/') === '/zeus') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_zeus_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'zeus_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ZeusController::indexAction',  '_route' => 'zeus_index',);
            }
            not_zeus_index:

            // zeus_new
            if ($pathinfo === '/zeus/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_zeus_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ZeusController::newAction',  '_route' => 'zeus_new',);
            }
            not_zeus_new:

            // zeus_show
            if (preg_match('#^/zeus/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_zeus_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zeus_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ZeusController::showAction',));
            }
            not_zeus_show:

            // zeus_edit
            if (preg_match('#^/zeus/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_zeus_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zeus_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ZeusController::editAction',));
            }
            not_zeus_edit:

            // zeus_delete
            if (preg_match('#^/zeus/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_zeus_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'zeus_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ZeusController::deleteAction',));
            }
            not_zeus_delete:

        }

        if (0 === strpos($pathinfo, '/timelaps')) {
            // timelaps_index
            if (rtrim($pathinfo, '/') === '/timelaps') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_timelaps_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'timelaps_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\TimelapsController::indexAction',  '_route' => 'timelaps_index',);
            }
            not_timelaps_index:

            // timelaps_new
            if ($pathinfo === '/timelaps/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_timelaps_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\TimelapsController::newAction',  '_route' => 'timelaps_new',);
            }
            not_timelaps_new:

            // timelaps_show
            if (preg_match('#^/timelaps/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_timelaps_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timelaps_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\TimelapsController::showAction',));
            }
            not_timelaps_show:

            // timelaps_edit
            if (preg_match('#^/timelaps/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_timelaps_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timelaps_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\TimelapsController::editAction',));
            }
            not_timelaps_edit:

            // timelaps_delete
            if (preg_match('#^/timelaps/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_timelaps_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'timelaps_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\TimelapsController::deleteAction',));
            }
            not_timelaps_delete:

        }

        if (0 === strpos($pathinfo, '/shop')) {
            if (0 === strpos($pathinfo, '/shopowner')) {
                // shopowner_index
                if (rtrim($pathinfo, '/') === '/shopowner') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_shopowner_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'shopowner_index');
                    }

                    return array (  '_controller' => 'AdBoxBundle\\Controller\\ShopOwnerController::indexAction',  '_route' => 'shopowner_index',);
                }
                not_shopowner_index:

                // shopowner_new
                if ($pathinfo === '/shopowner/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_shopowner_new;
                    }

                    return array (  '_controller' => 'AdBoxBundle\\Controller\\ShopOwnerController::newAction',  '_route' => 'shopowner_new',);
                }
                not_shopowner_new:

                // shopowner_show
                if (preg_match('#^/shopowner/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_shopowner_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'shopowner_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ShopOwnerController::showAction',));
                }
                not_shopowner_show:

                // shopowner_edit
                if (preg_match('#^/shopowner/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_shopowner_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'shopowner_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ShopOwnerController::editAction',));
                }
                not_shopowner_edit:

                // shopowner_delete
                if (preg_match('#^/shopowner/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_shopowner_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'shopowner_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ShopOwnerController::deleteAction',));
                }
                not_shopowner_delete:

            }

            // shop_index
            if (rtrim($pathinfo, '/') === '/shop') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_shop_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'shop_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ShopController::indexAction',  '_route' => 'shop_index',);
            }
            not_shop_index:

            // shop_new
            if ($pathinfo === '/shop/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_shop_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ShopController::newAction',  '_route' => 'shop_new',);
            }
            not_shop_new:

            // shop_show
            if (preg_match('#^/shop/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_shop_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ShopController::showAction',));
            }
            not_shop_show:

            // shop_edit
            if (preg_match('#^/shop/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_shop_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ShopController::editAction',));
            }
            not_shop_edit:

            // shop_delete
            if (preg_match('#^/shop/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_shop_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'shop_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ShopController::deleteAction',));
            }
            not_shop_delete:

        }

        if (0 === strpos($pathinfo, '/reservation')) {
            // reservation_index
            if (rtrim($pathinfo, '/') === '/reservation') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reservation_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'reservation_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ReservationController::indexAction',  '_route' => 'reservation_index',);
            }
            not_reservation_index:

            // reservation_new
            if ($pathinfo === '/reservation/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_reservation_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ReservationController::newAction',  '_route' => 'reservation_new',);
            }
            not_reservation_new:

            // reservation_show
            if (preg_match('#^/reservation/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_reservation_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ReservationController::showAction',));
            }
            not_reservation_show:

            // reservation_edit
            if (preg_match('#^/reservation/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_reservation_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ReservationController::editAction',));
            }
            not_reservation_edit:

            // reservation_delete
            if (preg_match('#^/reservation/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_reservation_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'reservation_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ReservationController::deleteAction',));
            }
            not_reservation_delete:

        }

        if (0 === strpos($pathinfo, '/pub')) {
            // pub_index
            if (rtrim($pathinfo, '/') === '/pub') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_pub_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'pub_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\PubController::indexAction',  '_route' => 'pub_index',);
            }
            not_pub_index:

            // pub_new
            if ($pathinfo === '/pub/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_pub_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\PubController::newAction',  '_route' => 'pub_new',);
            }
            not_pub_new:

            // pub_show
            if (preg_match('#^/pub/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_pub_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pub_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\PubController::showAction',));
            }
            not_pub_show:

            // pub_edit
            if (preg_match('#^/pub/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_pub_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pub_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\PubController::editAction',));
            }
            not_pub_edit:

            // pub_delete
            if (preg_match('#^/pub/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_pub_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pub_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\PubController::deleteAction',));
            }
            not_pub_delete:

        }

        if (0 === strpos($pathinfo, '/notification')) {
            // notification_index
            if (rtrim($pathinfo, '/') === '/notification') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_notification_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'notification_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\NotificationController::indexAction',  '_route' => 'notification_index',);
            }
            not_notification_index:

            // notification_new
            if ($pathinfo === '/notification/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_notification_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\NotificationController::newAction',  '_route' => 'notification_new',);
            }
            not_notification_new:

            // notification_show
            if (preg_match('#^/notification/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_notification_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\NotificationController::showAction',));
            }
            not_notification_show:

            // notification_edit
            if (preg_match('#^/notification/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_notification_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\NotificationController::editAction',));
            }
            not_notification_edit:

            // notification_delete
            if (preg_match('#^/notification/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_notification_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'notification_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\NotificationController::deleteAction',));
            }
            not_notification_delete:

        }

        if (0 === strpos($pathinfo, '/media')) {
            // media_index
            if (rtrim($pathinfo, '/') === '/media') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_media_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'media_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\MediaController::indexAction',  '_route' => 'media_index',);
            }
            not_media_index:

            // media_new
            if ($pathinfo === '/media/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_media_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\MediaController::newAction',  '_route' => 'media_new',);
            }
            not_media_new:

            // media_show
            if (preg_match('#^/media/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_media_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'media_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\MediaController::showAction',));
            }
            not_media_show:

            // media_edit
            if (preg_match('#^/media/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_media_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'media_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\MediaController::editAction',));
            }
            not_media_edit:

            // media_delete
            if (preg_match('#^/media/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_media_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'media_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\MediaController::deleteAction',));
            }
            not_media_delete:

        }

        if (0 === strpos($pathinfo, '/eventtimelaps')) {
            // eventtimelaps_index
            if (rtrim($pathinfo, '/') === '/eventtimelaps') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_eventtimelaps_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'eventtimelaps_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\EventTimelapsController::indexAction',  '_route' => 'eventtimelaps_index',);
            }
            not_eventtimelaps_index:

            // eventtimelaps_new
            if ($pathinfo === '/eventtimelaps/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_eventtimelaps_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\EventTimelapsController::newAction',  '_route' => 'eventtimelaps_new',);
            }
            not_eventtimelaps_new:

            // eventtimelaps_show
            if (preg_match('#^/eventtimelaps/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_eventtimelaps_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'eventtimelaps_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\EventTimelapsController::showAction',));
            }
            not_eventtimelaps_show:

            // eventtimelaps_edit
            if (preg_match('#^/eventtimelaps/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_eventtimelaps_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'eventtimelaps_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\EventTimelapsController::editAction',));
            }
            not_eventtimelaps_edit:

            // eventtimelaps_delete
            if (preg_match('#^/eventtimelaps/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_eventtimelaps_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'eventtimelaps_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\EventTimelapsController::deleteAction',));
            }
            not_eventtimelaps_delete:

        }

        if (0 === strpos($pathinfo, '/client')) {
            // client_index
            if (rtrim($pathinfo, '/') === '/client') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'client_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ClientController::indexAction',  '_route' => 'client_index',);
            }
            not_client_index:

            // client_new
            if ($pathinfo === '/client/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_client_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ClientController::newAction',  '_route' => 'client_new',);
            }
            not_client_new:

            // client_show
            if (preg_match('#^/client/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ClientController::showAction',));
            }
            not_client_show:

            // client_edit
            if (preg_match('#^/client/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_client_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ClientController::editAction',));
            }
            not_client_edit:

            // client_delete
            if (preg_match('#^/client/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_client_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ClientController::deleteAction',));
            }
            not_client_delete:

        }

        if (0 === strpos($pathinfo, '/b')) {
            if (0 === strpos($pathinfo, '/box')) {
                // box_index
                if (rtrim($pathinfo, '/') === '/box') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_box_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'box_index');
                    }

                    return array (  '_controller' => 'AdBoxBundle\\Controller\\BoxController::indexAction',  '_route' => 'box_index',);
                }
                not_box_index:

                // box_new
                if ($pathinfo === '/box/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_box_new;
                    }

                    return array (  '_controller' => 'AdBoxBundle\\Controller\\BoxController::newAction',  '_route' => 'box_new',);
                }
                not_box_new:

                // box_show
                if (preg_match('#^/box/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_box_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'box_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\BoxController::showAction',));
                }
                not_box_show:

                // box_edit
                if (preg_match('#^/box/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_box_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'box_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\BoxController::editAction',));
                }
                not_box_edit:

                // box_delete
                if (preg_match('#^/box/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_box_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'box_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\BoxController::deleteAction',));
                }
                not_box_delete:

            }

            if (0 === strpos($pathinfo, '/bid')) {
                if (0 === strpos($pathinfo, '/bidclient')) {
                    // bidclient_index
                    if (rtrim($pathinfo, '/') === '/bidclient') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_bidclient_index;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'bidclient_index');
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\BidClientController::indexAction',  '_route' => 'bidclient_index',);
                    }
                    not_bidclient_index:

                    // bidclient_new
                    if ($pathinfo === '/bidclient/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_bidclient_new;
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\BidClientController::newAction',  '_route' => 'bidclient_new',);
                    }
                    not_bidclient_new:

                    // bidclient_show
                    if (preg_match('#^/bidclient/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_bidclient_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bidclient_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\BidClientController::showAction',));
                    }
                    not_bidclient_show:

                    // bidclient_edit
                    if (preg_match('#^/bidclient/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_bidclient_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bidclient_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\BidClientController::editAction',));
                    }
                    not_bidclient_edit:

                    // bidclient_delete
                    if (preg_match('#^/bidclient/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_bidclient_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bidclient_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\BidClientController::deleteAction',));
                    }
                    not_bidclient_delete:

                }

                // bid_index
                if (rtrim($pathinfo, '/') === '/bid') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_bid_index;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'bid_index');
                    }

                    return array (  '_controller' => 'AdBoxBundle\\Controller\\BidController::indexAction',  '_route' => 'bid_index',);
                }
                not_bid_index:

                // bid_new
                if ($pathinfo === '/bid/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_bid_new;
                    }

                    return array (  '_controller' => 'AdBoxBundle\\Controller\\BidController::newAction',  '_route' => 'bid_new',);
                }
                not_bid_new:

                // bid_show
                if (preg_match('#^/bid/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_bid_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bid_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\BidController::showAction',));
                }
                not_bid_show:

                // bid_edit
                if (preg_match('#^/bid/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_bid_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bid_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\BidController::editAction',));
                }
                not_bid_edit:

                // bid_delete
                if (preg_match('#^/bid/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_bid_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bid_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\BidController::deleteAction',));
                }
                not_bid_delete:

            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/ad')) {
                if (0 === strpos($pathinfo, '/adresse')) {
                    // adresse_index
                    if (rtrim($pathinfo, '/') === '/adresse') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adresse_index;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'adresse_index');
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\AdresseController::indexAction',  '_route' => 'adresse_index',);
                    }
                    not_adresse_index:

                    // adresse_new
                    if ($pathinfo === '/adresse/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_adresse_new;
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\AdresseController::newAction',  '_route' => 'adresse_new',);
                    }
                    not_adresse_new:

                    // adresse_show
                    if (preg_match('#^/adresse/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_adresse_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adresse_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\AdresseController::showAction',));
                    }
                    not_adresse_show:

                    // adresse_edit
                    if (preg_match('#^/adresse/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_adresse_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adresse_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\AdresseController::editAction',));
                    }
                    not_adresse_edit:

                    // adresse_delete
                    if (preg_match('#^/adresse/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_adresse_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'adresse_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\AdresseController::deleteAction',));
                    }
                    not_adresse_delete:

                }

                if (0 === strpos($pathinfo, '/admin')) {
                    // admin_index
                    if (rtrim($pathinfo, '/') === '/admin') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_admin_index;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_index');
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::indexAction',  '_route' => 'admin_index',);
                    }
                    not_admin_index:

                    // admin_new
                    if ($pathinfo === '/admin/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_admin_new;
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::newAction',  '_route' => 'admin_new',);
                    }
                    not_admin_new:

                    // admin_show
                    if (preg_match('#^/admin/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_admin_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::showAction',));
                    }
                    not_admin_show:

                    // admin_edit
                    if (preg_match('#^/admin/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_admin_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::editAction',));
                    }
                    not_admin_edit:

                    // admin_delete
                    if (preg_match('#^/admin/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_admin_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::deleteAction',));
                    }
                    not_admin_delete:

                }

            }

            if (0 === strpos($pathinfo, '/action')) {
                if (0 === strpos($pathinfo, '/actiontimelaps')) {
                    // actiontimelaps_index
                    if (rtrim($pathinfo, '/') === '/actiontimelaps') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_actiontimelaps_index;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'actiontimelaps_index');
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\ActionTimelapsController::indexAction',  '_route' => 'actiontimelaps_index',);
                    }
                    not_actiontimelaps_index:

                    // actiontimelaps_new
                    if ($pathinfo === '/actiontimelaps/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_actiontimelaps_new;
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\ActionTimelapsController::newAction',  '_route' => 'actiontimelaps_new',);
                    }
                    not_actiontimelaps_new:

                    // actiontimelaps_show
                    if (preg_match('#^/actiontimelaps/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_actiontimelaps_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'actiontimelaps_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionTimelapsController::showAction',));
                    }
                    not_actiontimelaps_show:

                    // actiontimelaps_edit
                    if (preg_match('#^/actiontimelaps/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_actiontimelaps_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'actiontimelaps_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionTimelapsController::editAction',));
                    }
                    not_actiontimelaps_edit:

                    // actiontimelaps_delete
                    if (preg_match('#^/actiontimelaps/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_actiontimelaps_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'actiontimelaps_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionTimelapsController::deleteAction',));
                    }
                    not_actiontimelaps_delete:

                }

                if (0 === strpos($pathinfo, '/actionevent')) {
                    // actionevent_index
                    if (rtrim($pathinfo, '/') === '/actionevent') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_actionevent_index;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'actionevent_index');
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\ActionEventController::indexAction',  '_route' => 'actionevent_index',);
                    }
                    not_actionevent_index:

                    // actionevent_new
                    if ($pathinfo === '/actionevent/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_actionevent_new;
                        }

                        return array (  '_controller' => 'AdBoxBundle\\Controller\\ActionEventController::newAction',  '_route' => 'actionevent_new',);
                    }
                    not_actionevent_new:

                    // actionevent_show
                    if (preg_match('#^/actionevent/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_actionevent_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'actionevent_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionEventController::showAction',));
                    }
                    not_actionevent_show:

                    // actionevent_edit
                    if (preg_match('#^/actionevent/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_actionevent_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'actionevent_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionEventController::editAction',));
                    }
                    not_actionevent_edit:

                    // actionevent_delete
                    if (preg_match('#^/actionevent/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_actionevent_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'actionevent_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionEventController::deleteAction',));
                    }
                    not_actionevent_delete:

                }

            }

        }

        if (0 === strpos($pathinfo, '/event')) {
            // event_index
            if (rtrim($pathinfo, '/') === '/event') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_event_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'event_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\EventController::indexAction',  '_route' => 'event_index',);
            }
            not_event_index:

            // event_new
            if ($pathinfo === '/event/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_event_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\EventController::newAction',  '_route' => 'event_new',);
            }
            not_event_new:

            // event_show
            if (preg_match('#^/event/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_event_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'event_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\EventController::showAction',));
            }
            not_event_show:

            // event_edit
            if (preg_match('#^/event/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_event_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'event_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\EventController::editAction',));
            }
            not_event_edit:

            // event_delete
            if (preg_match('#^/event/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_event_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'event_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\EventController::deleteAction',));
            }
            not_event_delete:

        }

        if (0 === strpos($pathinfo, '/action')) {
            // action_index
            if (rtrim($pathinfo, '/') === '/action') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_action_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'action_index');
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ActionController::indexAction',  '_route' => 'action_index',);
            }
            not_action_index:

            // action_new
            if ($pathinfo === '/action/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_action_new;
                }

                return array (  '_controller' => 'AdBoxBundle\\Controller\\ActionController::newAction',  '_route' => 'action_new',);
            }
            not_action_new:

            // action_show
            if (preg_match('#^/action/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_action_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_show')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionController::showAction',));
            }
            not_action_show:

            // action_edit
            if (preg_match('#^/action/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_action_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_edit')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionController::editAction',));
            }
            not_action_edit:

            // action_delete
            if (preg_match('#^/action/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_action_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'action_delete')), array (  '_controller' => 'AdBoxBundle\\Controller\\ActionController::deleteAction',));
            }
            not_action_delete:

        }

        // ad_box_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'ad_box_homepage');
            }

            return array (  '_controller' => 'AdBoxBundle\\Controller\\DefaultController::indexAction',  '_route' => 'ad_box_homepage',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
