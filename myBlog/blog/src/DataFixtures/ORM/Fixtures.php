<?php /** @noinspection PhpUndefinedClassInspection */

/**
 * Created by Afrass.
 * User: A707446
 * Date: 24/02/2019
 * Time: 01:09
 */
namespace App\DataFixtures\ORM;

use App\Entity\Article;
use App\Entity\BlogPost;
use App\Entity\Tag;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tag = new Tag();
        $tag
            ->setName('Tag1');
        $manager->persist($tag);

        $article = new Article();
        try {
            $article
                ->setTitle('my article\'s title')
                ->setSubtitle('my article\'s subtitle')
                ->setCorpus('my article\'s CORPUS')
                //->addTag($tag)
                ->setCreatedAt(new DateTime('24-02-2019'));
        }
        catch (\Exception $e) {
        }
        $manager->persist($article);

        $blogPost = new BlogPost();
        $blogPost
            ->setTitle('My first blog post')
            ->setSlug('first-post')
            ->setDescription('My blog\'s description')
            ->setBody('My blog\'s body')
            ->setArticle($article);
        $manager->persist($blogPost);

        $manager->flush();
    }
}