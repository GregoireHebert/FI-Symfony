<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setTitle("Premier article");
        $article->setSubtitle("On est content");
        $article->setCorpus("Dans cet article, nous allons voir comment créer une application symfony...");
        $article->setCreatedAt(\DateTime::createFromFormat("d/m/Y H:i", "25/04/2015 15:00"));
        $manager->persist($article);

        $manager->flush();
    }
}
