<?php
// src/Product.php
namespace App\Models;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Models
 * @ORM\Table(name="products")
 */
class Product
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\Column(type="string") 
     */
    protected $name;

    // .. (other code)
}