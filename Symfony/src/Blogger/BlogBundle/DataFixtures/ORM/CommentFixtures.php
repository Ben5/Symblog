<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/CommentFixtures.php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blogger\BlogBundle\Entity\Comment;
use Blogger\BlogBundle\Entity\Blog;

class CommentFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function
    load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setUser('symfony');
        $comment->setComment('To make a long story short, you can\'t go wrong by choosing Symfony');
        $comment->setBlog($manager->merge($this->getReference('blog-1')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setUser('Rodrigo');
        $comment->setComment('Choosing a framework is easy - choose Symfony');
        $comment->setBlog($manager->merge($this->getReference('blog-1')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setUser('Ben');
        $comment->setComment('This pool is always leaking. Stupid pool.');
        $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setUser('Ben5');
        $comment->setComment('Apache is good, but Nginx is faster for serving static files. Done.');
        $comment->setBlog($manager->merge($this->getReference('blog-3')));
        $comment->setCreated(new \DateTime("2013-02-08 09:55:40"));
        $manager->persist($comment);

        $manager->flush();
    }

    public function
    getOrder()
    {
        return 2;
    }
}
