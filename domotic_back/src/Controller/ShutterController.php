<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Shutter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// state true: DOWN | state false: UP
class ShutterController extends AbstractController
{
       /**
     * @Route("/shutter/update/{id}", methods={"POST"}, name="update_heater")
     */
    public function updateShutter($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();   
        $shutter = $this->getDoctrine()
            ->getRepository(Shutter::class)
            ->find($id);

        if (!$shutter) {
            throw $this->createNotFoundException(
                'No Heater found by ID'
            );
            $response = new Response('No heater found by ID', 400);
            return $response;
        }
        $name = json_decode($request->getContent())->shutter->name;
        $state = json_decode($request->getContent())->shutter->state;
        $shutter->setName($name);
        $shutter->setState($state);
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
    /**
     * @Route("/shutter/add", methods={"POST"}, name="add_shutter")
     */
    public function createShutter(Request $request) {
        
        $entityManager = $this->getDoctrine()->getManager();   
        $name = json_decode($request->getContent())->shutter->name; 
        if (!$name) {
            throw $this->createNotFoundException(
                'No name found'
            );
            $response = new Response('', 400);
            return $response;
        }
        
        $shutter = New Shutter;
        $shutter->setState(false);
        $shutter->setName($name);
        $entityManager->persist($shutter);
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
    /**
     * @Route("/shutter/show", name="shutter")
     */
    public function getShutter() {
        $shutter = $this->getDoctrine()
            ->getRepository(Shutter::class)
            ->findAll();

        if (!$shutter) {
            throw $this->createNotFoundException(
                'No shutter found'
            );
        }
        return $this->json($shutter);
    }
}
