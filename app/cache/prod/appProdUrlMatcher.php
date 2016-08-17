<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // index_page
        if ($pathinfo === '/index') {
            return array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::indexAction',  '_route' => 'index_page',);
        }

        // login_page
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::loginAction',  '_route' => 'login_page',);
        }

        // register_page
        if ($pathinfo === '/register') {
            return array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::registerAction',  '_route' => 'register_page',);
        }

        // media_page
        if ($pathinfo === '/media') {
            return array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::mediaAction',  '_route' => 'media_page',);
        }

        // calendar_page
        if ($pathinfo === '/calendar') {
            return array (  '_controller' => 'AdBoxBundle\\Controller\\AdminController::calendarAction',  '_route' => 'calendar_page',);
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
