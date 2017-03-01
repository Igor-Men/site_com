<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {
    /**
     * @Route("/")
     */
    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('ShopBundle:Product')->findAll();

        $categories = $em->getRepository('ShopBundle:Category')->findAll();

        return $this->render('ShopBundle:Default:index.html.twig', [
            'products' => $products,
            'categories' => $categories,
        ]);


    }
}
