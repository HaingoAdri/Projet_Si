create database entreprise;
\c entreprise;

create table ListeDevise(
    id SERIAL primary key,
    devise varchar(50)
);

insert into ListeDevise(devise) values
                        ('Ariary'),
                        ('Dollar'),
                        ('Euro'),
                        ('Yen');

create table Entreprise(
    id SERIAL primary key,
    nom varchar(100),
    capital double precision,
    objet varchar(255),
    dateDeCreation Date,
    idDeviseTenuCompte int,
    foreign key (idDeviseTenuCompte) references ListeDevise(id)
);

create table TypeAdresse(
    id SERIAL primary key,
    idEntreprise int,
    type varchar(100),
    foreign key (idEntreprise) references Entreprise(id)
);

create table Adresse(
    id SERIAL primary key,
    idEntreprise int,
    date Date,
    idTypeAdresse int,
    valeur varchar(150),
    exist int default 0,
    foreign key (idTypeAdresse) references TypeAdresse(id),
    foreign key (idEntreprise) references Entreprise(id)
);

create table TypeStatus(
    id SERIAL primary key,
    type varchar(200)
);

insert into TypeStatus(type) values
                        ('NIF'),
                        ('NCRS'),
                        ('Statistique');

create table StatusEtat(
    id SERIAL primary key,
    idEntreprise int,
    idStatus int,
    numero varchar(300),
    foreign key (idStatus) references TypeStatus(id),
    foreign key (idEntreprise) references Entreprise(id)
);

create table Dirigeant(
    id SERIAL primary key,
    idEntreprise int,
    nom varchar(100),
    prenom varchar(100),
    email varchar(100),
    motDePasse varchar(100),
    date Date,
    foreign key (idEntreprise) references Entreprise(id)
);

create table Devise(
    id SERIAL primary key,
    idEntreprise int,
    idListeDevise int,
    foreign key (idEntreprise) references Entreprise(id),
    foreign key (idListeDevise) references ListeDevise(id)
);

create table TauxDevise(
    id SERIAL primary key,
    idEntreprise int,
    idDevise int,
    taux double precision,
    date Date,
    foreign key (idEntreprise) references Entreprise(id),
    foreign key (idDevise) references Devise(id)
);

create table Exercice(
    id SERIAL primary key,
    idEntreprise int,
    debut Date,
    fin Date,
    foreign key (idEntreprise) references Entreprise(id)
);

create table compte(
    id SERIAL primary key,
    idEntreprise int,
    idCompte int unique,
    nom varchar(100),
    foreign key (idEntreprise) references Entreprise(id)
);

create table Client(
    id SERIAL primary key,
    idEntreprise int,
    idClient int unique,
    nom varchar(100),
    foreign key (idEntreprise) references Entreprise(id)    
);

create table Fournisseur(
    id SERIAL primary key,
    idEntreprise int,
    idFournisseur int unique,
    nom varchar(100),
    foreign key (idEntreprise) references Entreprise(id)    
);


create table TypeJournal(
    id SERIAL primary key,
    nom varchar(100)
);

create table Journaux(
    id SERIAL primary key,
    idEntreprise int,
    date Date,
    PCE varchar(200),
    CACT varchar(200),
    libelle varchar(150),
    devise int,
    taux double precision,
    debit double precision,
    credit double precision,
    foreign key (idEntreprise) references Entreprise(id)    
);

create view listeAdresse as
    select a.id, a.identreprise, date, idtypeadresse, type, valeur, exist from adresse a join typeadresse t on a.idtypeadresse=t.id;


--insert
// Créez une instance de la classe Entreprise avec des valeurs spécifiques
$entreprise = new Entreprise('Nom de l\'entreprise', 10000, 'Objet de l\'entreprise', '2023-03-13', 1);

// Chargez la bibliothèque de base de données de CodeIgniter
$this->load->database();

// Définissez les données à insérer dans un tableau associatif
$data = array(
    'nom' => $entreprise->nom,
    'capital' => $entreprise->capital,
    'objet' => $entreprise->objet,
    'date_de_creation' => $entreprise->dateDeCreation,
    'id_devise_tenu_compte' => $entreprise->idDeviseTenuCompte
);

// Insérez les données dans la table "entreprises"
$this->db->insert('entreprises', $data);


--update
// Chargez la bibliothèque de base de données de CodeIgniter
$this->load->database();

// Définissez les données à mettre à jour dans un tableau associatif
$data = array(
    'nom' => $entreprise->nom,
    'capital' => $entreprise->capital,
    'objet' => $entreprise->objet,
    'date_de_creation' => $entreprise->dateDeCreation,
    'id_devise_tenu_compte' => $entreprise->idDeviseTenuCompte
);

// Définissez l'ID de l'entreprise à mettre à jour
$idEntreprise = 1; // Remplacez par l'ID de l'entreprise que vous souhaitez mettre à jour

// Exécutez la requête de mise à jour
$this->db->where('id', $idEntreprise); // Spécifiez la clause WHERE pour identifier l'entreprise à mettre à jour
$this->db->update('entreprises', $data); // Mettez à jour la table "entreprises" avec les nouvelles données


--delete
// Chargez la bibliothèque de base de données de CodeIgniter
$this->load->database();

// Définissez l'ID de l'entreprise à supprimer
$idEntreprise = 1; // Remplacez par l'ID de l'entreprise que vous souhaitez supprimer

// Exécutez la requête de suppression
$this->db->where('id', $idEntreprise); // Spécifiez la clause WHERE pour identifier l'entreprise à supprimer
$this->db->delete('entreprises'); // Supprimez l'entreprise de la table "entreprises"


--select
// Chargez la bibliothèque de base de données de CodeIgniter
$this->load->database();

// Définissez l'ID de l'entreprise à récupérer
$idEntreprise = 1; // Remplacez par l'ID de l'entreprise que vous souhaitez récupérer

// Exécutez la requête de sélection
$this->db->where('id', $idEntreprise); // Spécifiez la clause WHERE pour identifier l'entreprise à récupérer
$query = $this->db->get('entreprises'); // Sélectionnez l'entreprise de la table "entreprises"

// Vérifiez si la requête a retourné des résultats
if ($query->num_rows() > 0) {
    // Si oui, récupérez les données de l'entreprise dans un objet
    $entreprise = $query->row();
} else {
    // Si non, affichez un message d'erreur ou effectuez une action appropriée
    echo "L'entreprise avec l'ID $idEntreprise n'a pas été trouvée dans la base de données.";
}


--select avec condition
// Chargez la bibliothèque de base de données de CodeIgniter
$this->load->database();

// Spécifiez les conditions de sélection
$conditions = array(
    'nom' => 'ACME',
    'capital >' => 100000
);

// Exécutez la requête de sélection
$query = $this->db->get_where('entreprises', $conditions);

// Vérifiez si la requête a retourné des résultats
if ($query->num_rows() > 0) {
    // Si oui, récupérez les données des entreprises dans un tableau d'objets
    $entreprises = $query->result();
} else {
    // Si non, affichez un message d'erreur ou effectuez une action appropriée
    echo "Aucune entreprise trouvée.";
}