<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller {

    /**
     * @Route("/item/{name}", name="product_name")
     */
    public function itemAction($name) {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('ShopBundle:Product')
            ->findOneBy(['name' => $name]);

        return $this->render('ShopBundle:Product:item.html.twig', array(
            'product' => $product
        ));
    }

}
