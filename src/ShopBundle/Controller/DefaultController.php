<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {
    /**
     * @Route("/")
     */
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT p FROM ShopBundle:Product p";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            6
        );

        $categories = $em->getRepository('ShopBundle:Category')->findAll();

        return $this->render('ShopBundle:Default:index.html.twig', [
            'pagination' => $pagination,
            'categories' => $categories,
        ]);


    }
}
