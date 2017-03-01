<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/category/{name}", name="category_name")
     */
    public function categoryAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $this->getDoctrine()
            ->getRepository('ShopBundle:Category')
            ->findOneBy(['name' => $name]);

        return $this->render('ShopBundle:Category:category.html.twig', array(
            'category' => $category
        ));
    }

}
