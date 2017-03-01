<?php

namespace ShopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\CategoryRepository")
 */
class Category {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @ORM\ManyToMany(targetEntity="ShopBundle\Entity\Product", inversedBy="categories")
     */
    private $products;

    public function __construct() {
        $this->products = new ArrayCollection();
    }

    /**
     * @param Category $product
     * @return ArrayCollection|Category[]
     */
    public function removeProduct(Product $product) {

        if ($this->products->contains($product)) {
            $this->products->remove($product);
        }

        return $this->products;
    }

    /**
     * @param Product $product
     * @return array|ArrayCollection|Product[]
     */
    public function addProduct(Product $product) {
            //$product->addCategory($this);
            $this->products[] = $product;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getProducts() {
        return $this->products;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }
}
