<?php

use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../database/models/Category.php';

class CategoryController {

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getById(int $id): Category
    {
        return $this->em->find('Category',$id);
    }

    public function getAll()
    {
        return $this->em->getRepository(Category::class)->findAll();
    }

    public function createCategory(array $args)
    {
        $category = new Category();
        $category->setName($args['name']);
        $category->setDescription($args['description']);
        $this->em->persist($category);
        $this->em->flush();
    }

    public function deleteCategory(int $id): bool
    {
        if ($category = $this->getById($id) != null) {
            $this->em->remove($category);
            $this->em->flush();
            return true;
        }
        return false;
    }

}
