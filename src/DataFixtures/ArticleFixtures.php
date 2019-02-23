<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $tagNew = new Tag("New");
        $manager->persist($tagNew);
        $tagSymfony = new Tag("Symfony");
        $manager->persist($tagSymfony);

        $tag = new Tag("PHP");
        $manager->persist($tag);
        $tag = new Tag("Java");
        $manager->persist($tag);
        $tag = new Tag("Javascript");
        $manager->persist($tag);
        $tag = new Tag("HTML");
        $manager->persist($tag);
        $tag = new Tag("CSS");
        $manager->persist($tag);
        $tag = new Tag("Ruby");
        $manager->persist($tag);
        $tag = new Tag("API");
        $manager->persist($tag);
        $tag = new Tag("Bonnes pratiques");
        $manager->persist($tag);

        $article = new Article();
        $article->setTitle("Premier article");
        $article->setSubtitle("On est content");
        $article->setCorpus("Dans cet article, nous allons voir comment créer une application symfony...");
        $article->setCreatedAt(\DateTime::createFromFormat("d/m/Y H:i", "25/04/2015 15:00"));
        $article->addTag($tagSymfony);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle("Deuxième article");
        $article->setSubtitle("On est encore content");
        $article->setCorpus("Dans cet article, nous allons voir comment créer une application symfony... et oui encore !");
        $article->setCreatedAt(\DateTime::createFromFormat("d/m/Y H:i", "25/04/2015 15:00"));
        $article->addTag($tagSymfony);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle("Troisième article");
        $article->setSubtitle("On avance bien");
        $article->setCorpus("Dans cet article, nous allons voir comment créer une application symfony... mais oui c'est clair.");
        $article->setCreatedAt(\DateTime::createFromFormat("d/m/Y H:i", "25/04/2015 15:00"));
        $article->addTag($tagSymfony);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle("Nouvel article");
        $article->setSubtitle("Ca vient de sortir");
        $article->setCorpus("Grande nouvelle, cet article révolutionnaire va vous changer la vie !
        Excitavit hic ardor milites per municipia plurima, quae isdem conterminant, dispositos et castella, sed quisque serpentes latius pro viribus repellere moliens, nunc globis confertos, aliquotiens et dispersos multitudine superabatur ingenti, quae nata et educata inter editos recurvosque ambitus montium eos ut loca plana persultat et mollia, missilibus obvios eminus lacessens et ululatu truci perterrens.

Et prima post Osdroenam quam, ut dictum est, ab hac descriptione discrevimus, Commagena, nunc Euphratensis, clementer adsurgit, Hierapoli, vetere Nino et Samosata civitatibus amplis inlustris.

Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis, amicitias esse expetendas; itaque, ut quisque minimum firmitatis haberet minimumque virium, ita amicitias appetere maxime; ex eo fieri ut mulierculae magis amicitiarum praesidia quaerant quam viri et inopes quam opulenti et calamitosi quam ii qui putentur beati.

Sed maximum est in amicitia parem esse inferiori. Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam Mummio anteposuit, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.

Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.

Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.

Proinde concepta rabie saeviore, quam desperatio incendebat et fames, amplificatis viribus ardore incohibili in excidium urbium matris Seleuciae efferebantur, quam comes tuebatur Castricius tresque legiones bellicis sudoribus induratae.

Quo cognito Constantius ultra mortalem modum exarsit ac nequo casu idem Gallus de futuris incertus agitare quaedam conducentia saluti suae per itinera conaretur, remoti sunt omnes de industria milites agentes in civitatibus perviis.

Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.

Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.");
        $article->setCreatedAt(new \DateTime());
        $article->addTag($tagSymfony);
        $article->addTag($tagNew);
        $manager->persist($article);

        $manager->flush();
    }
}
