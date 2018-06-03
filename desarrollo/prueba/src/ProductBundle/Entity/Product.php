<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\ProductRepository")
 * @UniqueEntity(
 *         fields = {"code"},
 *         message = "Este código ya esta en uso."
 * )
 * @UniqueEntity(
 *         fields = {"name"},
 *         message = "Este nombre ya esta en uso."
 * )
 */
class Product
{
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
     * @ORM\Column(name="code", type="string", unique=true)
     * @Assert\NotBlank(message = "product.code.not_blank")
     * @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "product.code.min_length{{ limit }}",
     *      maxMessage = "product.code.max_length{{ limit }}"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Za0-9]+$/",
     *     match=true,
     *     message="product.code.regex"
     * )
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60, unique=true)
     * @Assert\NotBlank(message = "product.name.not_blank")
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "product.name.min_length{{ limit }}"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank(message = "product.description.not_blank")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=60)
     * @Assert\NotBlank(message = "product.brand.not_blank")
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=60)
     * @Assert\NotBlank(message = "product.category.not_blank")
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     * @Assert\NotBlank(message = "product.price.not_blank")
     * @Assert\Range(
     *      min = 0,
     *      max = 100000000,
     *      minMessage = "product.price.min_valid",
     *      maxMessage = "product.price.max_valid",
     *      invalidMessage = "product.price.valid"
     * )
     * 
     */
    private $price;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param integer $code
     *
     * @return Product
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Product
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }
}

