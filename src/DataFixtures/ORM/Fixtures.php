<?php
namespace App\DataFixtures\ORM;

use App\Entity\Author;
use App\Entity\User;
use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Fixtures extends Fixture
{

    private $encoder;
    /**
     * Fixtures constructor.
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('admin@admin.com');
        $user->setUsername("admin");
        $user->setPassword(
            $this->encoder->encodePassword($user,"admin")
        );
        $user->setPhone('0758587576');
        $user->setShortBio("Je suis le meilleur !!!!");


        $manager->persist($user);

        $blogPost = new BlogPost();
        $blogPost
            ->setTitle('Your first blog post example')
            ->setSubtitle('first-post')
            ->setCorpus('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.')
            ->setAuthor($user   );
        $manager->persist($blogPost);


        $blogPost1 = new BlogPost();
        $blogPost1
            ->setTitle('Your first blog post example')
            ->setSubtitle('first-post')
            ->setCorpus('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.')
            ->setAuthor($user   );
        $manager->persist($blogPost1);


        $blogPost2 = new BlogPost();
        $blogPost2
            ->setTitle('Your first blog post example')
            ->setSubtitle('first-post')
            ->setCorpus('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.')
            ->setAuthor($user   );
        $manager->persist($blogPost2);

        $blogPost3 = new BlogPost();
        $blogPost3
            ->setTitle('Your first blog post example')
            ->setSubtitle('first-post')
            ->setCorpus('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.')
            ->setAuthor($user   );
        $manager->persist($blogPost3);
        $manager->flush();
    }

}