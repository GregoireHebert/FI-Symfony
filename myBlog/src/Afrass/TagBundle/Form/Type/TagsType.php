<?php

namespace Afrass\TagBundle\Form\Type;

use Afrass\TagBundle\Form\DataTransformer\TagsTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TagsType extends AbstractType {

    /*
     * @var ObjectManager
     */
    private $manager;



    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }



    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addModelTransformer(new CollectionToArrayTransformer(), true)
            ->addModelTransformer(new TagsTransformer($this->manager), true);
    }

    public function getParent()
    {
        return TextType::class;
    }
}