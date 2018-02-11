<?php
namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class LangListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $request = $event->getRequest();
        $session = $request->getSession();
        if ($lang = $request->get('lang')) {
            if (($session->get('lang') != $lang) && (in_array($lang, ['en', 'de']))) {
                $session->set('lang', $lang);
            }
        } else {
            if (!$session->get('lang')) {
                $session->set('lang', 'en');
            }
        }
    }
}