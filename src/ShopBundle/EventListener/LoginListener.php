<?php

namespace ShopBundle\EventListener;

use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

/**
 * Custom login listener.
 */
class LoginListener {
    /** @var \Symfony\Component\Security\Core\SecurityContext */
    private $securityContext;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    /**
     * Constructor
     *
     * @param SecurityContext $securityContext
     * @param Doctrine $doctrine
     */
    public function __construct(SecurityContext $securityContext, Doctrine $doctrine) {
        $this->securityContext = $securityContext;
        $this->em = $doctrine->getEntityManager();
    }

    /**
     * Do the magic.
     *
     * @param InteractiveLoginEvent $event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event) {
        $request = $event->getRequest();
        $session = $request->getSession();
        $captcha_session = $session->get('captcha');
        $captcha_user = $request->get('_captcha');

        if ($captcha_session != $captcha_user) {
            throw new AuthenticationException('wrong captcha');
        }
    }
}