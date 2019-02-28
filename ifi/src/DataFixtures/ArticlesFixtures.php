<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 Articles! Bam!
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle('Article ' . $i);
            $article->setSubtitle('Subtitle ' . $i);
            $article->setCorpus('Illud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas. Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere? Sed istarum partium culpa est eorum, qui te agere voluerunt; laus pudoris tui, quod ea te invitum dicere videbamus, ingenii, quod ornate politeque dixisti.');
            $tag1 = new Tag();
            $tag1->setName('medecine');
            $tag2 = new Tag();
            $tag2->setName('cuisine');
            $article->setTag(array($tag1, $tag2));
            $article->setCreatedAt(new \DateTime());
            $manager->persist($article);
        }
        $manager->flush();
    }
}
