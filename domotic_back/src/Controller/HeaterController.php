<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Heater;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


// mode 0: Winter | Mode 1: summer | Mode 3: Off
class HeaterController extends AbstractController
{
        /**
     * @Route("/heater/delete/{id}", methods={"DELETE"}, name="delete_heater")
     */
    public function deleteHeater($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager(); 
        $heater = $this->getDoctrine()
            ->getRepository(Heater::class)
            ->find($id); 
        if (!$heater) {
                throw $this->createNotFoundException(
                    'No heater found'
                );
                $response = new Response('No heater found with this ID', 400);
                return $response;
        }
        $entityManager->remove($heater);
        $entityManager->flush();  ;
        $response = new Response('', 200);
        return $response;
    }
            /**
     * @Route("/heater/show/{id}", methods={"GET"}, name="show_light_by_id")
     */
    public function getHeaterById($id)
    {
        $entityManager = $this->getDoctrine()->getManager();    

        $heater = $this->getDoctrine()
            ->getRepository(Heater::class)
            ->find($id);

        if (!$heater) {
            throw $this->createNotFoundException(
                'No heater found for id '.$id
            );
        }
        return $this->json($heater);
    }
    /**
     * @Route("/heater/update/{id}", methods={"POST"}, name="heater_up")
     */
    public function updateHeater($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();   
        $heater = $this->getDoctrine()
            ->getRepository(Heater::class)
            ->find($id);

        if (!$heater) {
            throw $this->createNotFoundException(
                'No Heater found by ID'
            );
            $response = new Response('No heater found by ID', 400);
            return $response;
        }
        $name = json_decode($request->getContent())->heater->name;
        $temperature = json_decode($request->getContent())->heater->temperature;
        $mode = json_decode($request->getContent())->heater->mode;
        $heater->setName($name);
        $heater->setTemperature($temperature);
        $heater->setMode($mode);
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
        /**
     * @Route("/heater/add", methods={"POST"}, name="add_heater")
     */
    public function createHeater(Request $request) {
        
        $entityManager = $this->getDoctrine()->getManager();   
        $name = json_decode($request->getContent())->heater->name; 
        if (!$name) {
            throw $this->createNotFoundException(
                'No name found'
            );
            $response = new Response('', 400);
            return $response;
        }
        
        $heater = New Heater;
        $heater->setMode(0);
        $heater->setName($name);
        $heater->setTemperature(25);
        $entityManager->persist($heater);
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
    /**
     * @Route("/heater/show", name="heater")
     */
    public function getHeater() {
        $heater = $this->getDoctrine()
            ->getRepository(Heater::class)
            ->findAll();

        if (!$heater) {
            throw $this->createNotFoundException(
                'No heater found'
            );
        }
        return $this->json($heater);
    }
    
}
