<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /*
     * Show a blog entry
     */
    public function
    showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog)
        {
            throw $this->createNotFoundException('Unable to find blog post "'.$id.'".');
        }

        $comments = $em->getRepository('BloggerBlogBundle:comment')
                       ->getCommentsForBlog($blog->getId());

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', 
                             array('blog'     => $blog,
                                   'comments' => $comments));
    }
}
