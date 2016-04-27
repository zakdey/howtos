<?php
namespace Application\Service;

use Application\Entity\Recepy;

class RecepyService {

    private $entityManager;
    private $recepyRepository;
  //  private $categorieRepository;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        $this->recepyRepository = $entityManager->getRepository('Application\Entity\Recepy');
        //$this->categorieRepository = $entityManager->getRepository('Prodotti\Entity\Categoria');
    }

    /*public function getProdotto($codice) {
        return $this->prodottiRepository->findOneByCodice($codice);
    }

    public function getListaProdotti() {
        return $this->prodottiRepository->findAll();
    }

    public function getListaCategorie() {
        return $this->categorieRepository->findAll();
    }

    public function getArrayCategorie() {
        $categorie = [];
        foreach($this->getListaCategorie() as $categoria) {
            $categorie[$categoria->getId()] = $categoria->getNome();
        }

        return $categorie;
    }

    public function creaNuovoProdotto(array $dati) {
        $prodotto = new Prodotto(
            $dati['codice'],
            $dati['nome'],
            $dati['descrizione'],
            $dati['ingredienti'],
            $dati['prezzo'],
            $this->entityManager->getReference('\Prodotti\Entity\Categoria', $dati['categoria'])
        );

        $this->entityManager->persist($prodotto);
        $this->entityManager->flush();

        return $prodotto;
    }

    public function elimina(Prodotto $prodotto) {
        $this->entityManager->remove($prodotto);
        $this->entityManager->flush();
    }*/

}
