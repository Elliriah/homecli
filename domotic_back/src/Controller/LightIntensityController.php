<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Light;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class LightIntensityController extends AbstractController
{
    /**
     * @Route("/light/intensity", name="light_intensity")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/LightIntensityController.php',
        ]);
    }
    /**
     * @Route("/light/update/{id}", methods={"POST"}, name="update_light")
     */
    public function updateLight($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();   
        $light = $this->getDoctrine()
            ->getRepository(Light::class)
            ->find($id);

        if (!$light) {
            throw $this->createNotFoundException(
                'No light found by ID'
            );
            $response = new Response('No light found by ID', 400);
            return $response;
        }
        $name = json_decode($request->getContent())->light->name;
        $intensity = json_decode($request->getContent())->light->intensity;
        $state = json_decode($request->getContent())->light->state;
        $light->setState($state);
        $light->setName($name);
        $light->setIntensity($intensity);
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }

    /**
     * @Route("/light/add", methods={"POST"}, name="add_light")
     */
    public function createLight(Request $request) {
        
        $entityManager = $this->getDoctrine()->getManager();   
        $name = json_decode($request->getContent())->light->name; 
        if (!$name) {
            throw $this->createNotFoundException(
                'No name found'
            );
            $response = new Response('', 400);
            return $response;
        }
        
        $light = New Light;
        $light->setState(false);
        $light->setName($name);
        $light->setIntensity(0);
        $entityManager->persist($light);
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
    /**
     * @Route("/light/delete", methods={"DELETE"}, name="delete_light")
     */
    public function deleteLight(Request $request) {
        $id = json_decode($request->getContent())->light->id;
        
        $entityManager = $this->getDoctrine()->getManager(); 
        $light = $this->getDoctrine()
            ->getRepository(Light::class)
            ->find($id); 
        if (!$light) {
                throw $this->createNotFoundException(
                    'No light found'
                );
                $response = new Response('No light found with this ID', 400);
                return $response;
        }
        $entityManager->remove($light);
        $entityManager->flush();  ;
        $response = new Response('', 200);
        return $response;
    }
    /**
     * @Route("/light/show", methods={"GET"}, name="light_show")
     */
    public function getLight() {
        $light = $this->getDoctrine()
            ->getRepository(Light::class)
            ->findAll();

        if (!$light) {
            throw $this->createNotFoundException(
                'No light found'
            );
        }
        return $this->json($light);
    }
    /**
     * @Route("/light/show/{id}", methods={"GET"}, name="light_intensity_show")
     */
    public function getLightById($id)
    {
        $entityManager = $this->getDoctrine()->getManager();    

        $light = $this->getDoctrine()
            ->getRepository(Light::class)
            ->find($id);

        if (!$light) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        return $this->json($light);
    }
}
