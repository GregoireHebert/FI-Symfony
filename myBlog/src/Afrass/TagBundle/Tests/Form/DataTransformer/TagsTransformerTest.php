<?php

namespace Afrass\TagBundle\Tests\Form\DataTransformer;


use Afrass\TagBundle\Entity\Tag;
use Afrass\TagBundle\Form\DataTransformer\TagsTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;

class TagsTransformerTest extends TestCase {

    //TEST FOR ReverseTransform

    public function testCreateTagArrayFromString(){
        $transformer = $this->getMockedTransformer();
        $tags = $transformer->reverseTransform('testTag1,testTag2');

        $this->assertCount(2,$tags);
        $this->assertSame('testTag2',$tags[1]->getName());
    }

    public function testUseAlreadyDefinedTag(){
        $tag = new Tag();
        $tag->setName('testTag1');
        $transformer = $this->getMockedTransformer([$tag]);
        $tags = $transformer->reverseTransform('testTag1,testTag2');

        $this->assertCount(2,$tags);
        $this->assertSame($tag,$tags[0]);
    }

    public function testRemoveEmptyTag(){

        $tags = $this->getMockedTransformer()->reverseTransform('testTag1,,testTag2, , ,');

        $this->assertCount(2,$tags);
        $this->assertSame('testTag2',$tags[1]->getName());
    }

    public function testRemoveDuplicateTag(){

        $tags = $this->getMockedTransformer()->reverseTransform('testTag1,,testTag2, testTag1,testTag1,');

        $this->assertCount(2,$tags);
    }

    private function getMockedTransformer($result = []){
        $tagRepository = $this->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $tagRepository->expects($this->any())
            ->method('findBy')
            ->will($this->returnValue($result));

        $entityManager = $this
            ->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $entityManager->expects($this->any())
            ->method('getRepository')
            ->will($this->returnValue($tagRepository));
        return new TagsTransformer($entityManager);
    }
}