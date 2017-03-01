<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Product;
use ShopBundle\Entity\Category;


class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $category_1 = new Category();
        $category_1->setName('phone');

        $category_2 = new Category();
        $category_2->setName('electronic');

        $category_3 = new Category();
        $category_3->setName('clothes');

        $product_1 = new Product();
        $product_1->setName('iphone');
        $product_1->setPrice(1000.00);


        $product_2 = new Product();
        $product_2->setName('galaxy');
        $product_2->setPrice(800.00);


        $product_3 = new Product();
        $product_3->setName('tv');
        $product_3->setPrice(300.00);


        $product_4 = new Product();
        $product_4->setName('nike');
        $product_4->setPrice(100.00);


        $product_1->addCategory($category_1);
        $product_1->addCategory($category_2);

        $product_2->addCategory($category_1);
        $product_2->addCategory($category_2);

        $product_3->addCategory($category_2);

        $product_4->addCategory($category_3);

        $category_1->addProduct($product_1);
        $category_1->addProduct($product_2);

        $category_2->addProduct($product_1);
        $category_2->addProduct($product_2);
        $category_2->addProduct($product_3);

        $category_3->addProduct($product_4);


        $manager->persist($product_1);
        $manager->persist($product_2);
        $manager->persist($product_3);
        $manager->persist($product_4);

        $manager->persist($category_1);
        $manager->persist($category_2);
        $manager->persist($category_3);


        $manager->flush();


        for ($i = 0; $i < 10 ; $i++) {
            $product = new Product();
            $product->setName('prod_name_'.$i);
            $product->setPrice(rand(1, 200));

            $manager->persist($product);
            $manager->flush();
        }

        for ($i = 0; $i < 10 ; $i++) {
            $category = new Category();
            $category->setName('category_name_'.$i);

            $manager->persist($category);
            $manager->flush();
        }
    }
}