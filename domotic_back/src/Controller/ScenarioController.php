<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Light;
use App\Entity\Heater;
use App\Entity\Shutter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/scenario/nightmode", methods={"POST"}, name="scenario")
     */
    public function nightMode() {
        $entityManager = $this->getDoctrine()->getManager();   
        $shutter = $this->getDoctrine()
            ->getRepository(Shutter::class)
            ->findAll();
        $heater = $this->getDoctrine()
            ->getRepository(Heater::class)
            ->findAll();
        $light = $this->getDoctrine()
            ->getRepository(Light::class)
            ->findAll();
    
        foreach ($light as $light_unit){
            $light_unit->setIntensity(0);
            $light_unit->setState(false);
        }
        foreach ($shutter as $shutter_unit){
            $shutter_unit->setState(false);
        }
        foreach ($heater as $heater_unit){
            $heater_unit->setMode(3);
        }
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
        /**
     * @Route("/scenario/equalizeint/{intensity}", methods={"POST"}, name="equalizeint")
     */
    public function equalizeIntensity($intensity) {
        $entityManager = $this->getDoctrine()->getManager();   
        $light = $this->getDoctrine()
            ->getRepository(Light::class)
            ->findAll();
    
        foreach ($light as $light_unit){
            $light_unit->setIntensity($intensity);
        }
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
        /**
     * @Route("/scenario/coldmode", methods={"POST"}, name="coldmode")
     */
    public function coldMode() {
        $entityManager = $this->getDoctrine()->getManager();   
        $shutter = $this->getDoctrine()
            ->getRepository(Shutter::class)
            ->findAll();
        $heater = $this->getDoctrine()
            ->getRepository(Heater::class)
            ->findAll();
    
        foreach ($shutter as $shutter_unit){
            $shutter_unit->setState(true);
        }
        foreach ($heater as $heater_unit){
            $heater_unit->setMode(0);
            $heater_unit->setTemperature(30);
        }
        $entityManager->flush();
        $response = new Response('', 200);
        return $response;
    }
}
