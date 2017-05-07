<?php declare(strict_types=1);

namespace App\Symfony\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;

final class StaticController
{
    /**
     * @param Twig_Environment $twig
     *
     * @return Response
     *
     * @Route("/", name="home")
     */
    public function indexAction(Twig_Environment $twig): Response
    {
        return new Response($twig->render('static/home.html.twig'));
    }
}
