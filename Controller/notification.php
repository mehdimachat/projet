<?php
class Notif
{
    private ?int $idn = null;       // ID de la notification
    private ?string $titre = null;  // Titre de la notification
    private ?string $contenu = null; // Contenu de la notification
    private ?int $id = null;        // Clé étrangère vers l'utilisateur

    public function __construct($idn = null, $titre = null, $contenu = null, $id = null)
    {
        $this->idn = $idn;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->id = $id;
    }

    // Getters
    public function getIdn(): ?int
    {
        return $this->idn;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // Setters
    public function setIdn(int $idn): self
    {
        $this->idn = $idn;
        return $this;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}
?>