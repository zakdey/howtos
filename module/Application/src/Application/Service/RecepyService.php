<?php
namespace Application\Service;

use Application\Entity\Recepy;

class RecepyService {

    private $entityManager;
    private $recepyRepository;
    private $userRepository;
  //  private $categorieRepository;

    public function __construct($entityManager, $auth) {
        $this->entityManager = $entityManager;
        $this->recepyRepository = $entityManager->getRepository('Application\Entity\Recepy');
        $this->auth = $auth;
        //$this->categorieRepository = $entityManager->getRepository('Prodotti\Entity\Categoria');
    }

    public function getRecepy($id) {
        return $this->recepyRepository->findOneById($id);
    }

    public function getRecepyList() {
        return $this->recepyRepository->findAll();
    }

    public function getUserRecepyList() {
        return $this->recepyRepository->findByUser($this->auth->getIdentity()->getId());
    }

    /*public function getArrayCategorie() {
        $categorie = [];
        foreach($this->getListaCategorie() as $categoria) {
            $categorie[$categoria->getId()] = $categoria->getNome();
        }

        return $categorie;
    }*/

    public function createNewRecepy(array $data) {
        $recepy = new Recepy(
            $data['title'],
            $data['content'],
            $this->auth->getIdentity()/*,
            $this->entityManager->getReference('\Prodotti\Entity\Categoria', $dati['categoria'])*/
        );

        $this->entityManager->persist($recepy);
        $this->entityManager->flush();

        return $recepy;
    }

    /*public function elimina(Prodotto $prodotto) {
        $this->entityManager->remove($prodotto);
        $this->entityManager->flush();
    }*/

}
