<?php

namespace Afrass\TagBundle\Form\Type;

use Afrass\TagBundle\Form\DataTransformer\TagsTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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

    public function configureOptions(OptionsResolver $resolver)
    {
        //si Tag est vide => la modification de l'article ne bloque pas
        $resolver->setDefault('required',false);
    }

    public function getParent()
    {
        return TextType::class;
    }
}