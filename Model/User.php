<?php
class User
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $cin = null;
    private ?string $email = null;
    private ?string $mot_de_passe = null;
    private ?string $role = null;
    private ?string $telephone = null;
    private ?string $adresse = null;

    public function __construct($id = null, $nom = null, $prenom = null, $cin = null, $email = null, $mot_de_passe = null, $role = null, $telephone = null, $adresse = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->cin = $cin;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->role = $role;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
    }
    
    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getCin()
    {
        return $this->cin;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    // Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
        return $this;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }
}

?>

