<?php

namespace Plugin\ShareThis\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\ShareThis\From\Type\Admin\ShareThisConfigType;
use Plugin\ShareThis\Repository\ShareThisConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfigController extends AbstractController
{
    /**
     * @Route("/%eccube_admin_route%/share_this/config", name="share_this_admin_config")
     * @Template("@ShareThis/admin/config.html.twig")
     * @param Request $request
     * @param ShareThisConfigRepository $repository
     * @return array|RedirectResponse
     */
    public function index(Request $request, ShareThisConfigRepository $repository)
    {
        $config = $repository->get();
        $form = $this->createForm(ShareThisConfigType::class, $config);
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            $config=$form->getData();
            $this->entityManager->persist($config);
            $this->entityManager->flush();
            return $this->redirectToRoute('share_this_admin_config');
        }
        return [
            'form' => $form->createView()
        ];
    }
}