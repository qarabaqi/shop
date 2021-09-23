<?php
namespace App\Controller;

use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProductRepository $productRepo, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $productRepo->findAll(),
            $request->query->getInt('page', 1),
            16
        );

        return $this->render('index.html.twig', [
            'pagination' => $pagination
        ]);
    }
}
