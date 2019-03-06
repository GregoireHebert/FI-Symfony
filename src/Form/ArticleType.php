<?php
/**
 * Created by IntelliJ IDEA.
 * User: hqrd
 * Date: 24/02/2019
 * Time: 15:10
 */

namespace App\Form;


use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('subtitle', TextType::class, ['label' => 'Sous-titre'])
            ->add('corpus', TextareaType::class, ['label' => 'Corps'])
            ->add('tags', EntityType::class, [
                'required' => false,
                'class' => Tag::class,
                'choice_label' => 'name',
                'multiple' => true,
                'by_reference' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->andWhere('t.name != :name')
                        ->setParameter('name', 'New')
                        ->orderBy('t.name', 'ASC');
                },
            ])
            ->add('save', SubmitType::class, ['label' => 'Créer l\'article']);
    }
}