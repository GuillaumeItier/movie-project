<?php 

namespace App\Model;

use App\Model\Grant;
use App\Database\Mysql;

class Account
{
    //Attributs
    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $password;
    private ?Grant $grant;
    private array $movies;
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection de dépendance
        $this->connect = (new Mysql())->connectBDD();
        $this->movies = [];
    }

    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getGrant(): ?Grant
    {
        return $this->grant;
    }

    public function setGrant(?Grant $grant): void
    {
        $this->grant = $grant;
    }

    //Méthode
    public function saveAccount(Account $account): void
    {
        try {
            //Ecrire la requête
            $sql = "INSERT INTO account(firstname, lastname, email, `password`, id_grant)
            VALUE(?,?,?,?,?)";
            //Préparer la requête
            $req = $this->connect->prepare($sql);
            //Assigner les paramètres
            $req->bindValue(1, $account->getFirstname(), \PDO::PARAM_STR);
            $req->bindValue(2, $account->getLastname(), \PDO::PARAM_STR);
            $req->bindValue(3, $account->getEmail(), \PDO::PARAM_STR);
            $req->bindValue(4, $account->getPassword(), \PDO::PARAM_STR);
            $req->bindValue(5, $account->getGrant()->getId(), \PDO::PARAM_INT);
            //Exécuter la requête
            $req->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function isAccountExistsByEmail(string $email) :bool
    {
        try {
            //Ecrire la requête
            $sql = "SELECT id FROM account WHERE email = ?";
            //Préparer la requête
            $req = $this->connect->prepare($sql);
            //Assigner le paramètre
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            //Exécuter la requête
            $req->execute();
            //Fetch le resultat
            $account = $req->fetch(\PDO::FETCH_ASSOC);
            //Test si la categorie n'existe pas
            if (empty($account)) {
                return false;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    } 
}