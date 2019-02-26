<?php
/**
 * Created by IntelliJ IDEA.
 * User: A707446
 * Date: 26/02/2019
 * Time: 01:45
 */
namespace Afrass\TagBundle\Form\DataTransformer;

use Afrass\TagBundle\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class TagsTransformer implements DataTransformerInterface {

    /*
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }


    /*
     * @return string
     */
    public function transform($value)
    {
        dump($value);
        return implode(',',$value);
    }

    /*
     * @return array
     */
    public function reverseTransform($string)
    {
      $names = explode(',',$string);
      $tags = $this->manager->getRepository('TagBundle:Tag')->findBy(
          [
              'name' => $names
          ]
      );
      $newNames = array_diff($names,$tags);
      foreach ($newNames as $name){
          $tag = new Tag();
          $tag->setName($name);
          $tags[] = $tag;
      }
      return $tags;
    }
}