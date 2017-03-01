<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('ShopBundle:Product')->findOneBy([]);

        //$category = $em->getRepository('ShopBundle:Category')->findOneBy([]);

        $category = new Category();
        $category->setName('sone some new');

        //$category->addProduct($product);
        $product->addCategory($category);

        $em->persist($product);
        $em->persist($category);
        $em->flush();

        //var_dump($product);
        //var_dump($category);

        return $this->render('ShopBundle:Product:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/item/{name}", name="product_name")
     */
    public function itemAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('ShopBundle:Product')
            ->findOneBy(['name' => $name]);

        return $this->render('ShopBundle:Product:item.html.twig', array(
            'product' => $product
        ));
    }

}
