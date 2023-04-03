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

create table Code(
    id SERIAL primary key,
    idEntreprise int,
    code varchar(10),
    intitule varchar(200),
    exist int default 0,
    foreign key (idEntreprise) references Entreprise(id)
);

create table Compte(
    id SERIAL primary key,
    idEntreprise int,
    numero int,
    intitule varchar(200),
    exist int default 0,
    foreign key (idEntreprise) references Entreprise(id)
);

create table Client(
    id SERIAL primary key,
    idEntreprise int,
    idCompte int unique,
    numero varchar(100),
    intitule varchar(200),
    exist int default 0,
    foreign key (idEntreprise) references Entreprise(id)    
);

create table Fournisseur(
    id SERIAL primary key,
    idEntreprise int,
    idCompte int unique,
    numero varchar(100),
    intitule varchar(200),
    exist int default 0,
    foreign key (idEntreprise) references Entreprise(id)    
);


create table TypeJournal(
    id SERIAL primary key,
    nom varchar(100)
);

create table Journaux(
    id SERIAL primary key,
    idEntreprise int,
    exercice int,
    date Date,
    pcg int,
    compte int,
    num int,
    libelle varchar(200) not null,
    cause varchar(200) not null,
    montant double precision not null,
    taux double precision,
    devise int,
    debit double precision,
    credit double precision,
    foreign key (idEntreprise) references Entreprise(id),
    foreign key (exercice) REFERENCES  exercice(id)
);

ALTER TABLE devise add column exist int default 0;

create view listeAdresse as
    select a.id, a.identreprise, date, idtypeadresse, type, valeur, exist from adresse a join typeadresse t on a.idtypeadresse=t.id;

create view listeStatusEtat as
    select t.id, identreprise, idstatus, type, numero from statusetat s join typestatus t on s.idstatus = t.id;

create or replace view listeDeviseEntreprise as
    select d.id, identreprise, idlistedevise, devise, exist from devise d join listedevise l on d.idlistedevise=l.id;

create view listeTauxDevise as
     select t.id, t.identreprise, t.iddevise, devise, taux, date from tauxDevise t join listedeviseentreprise l on t.iddevise=l.id;

create or replace view listeJournaux as
    select j.id,date, c.intitule,compte,num,libelle,cause,montant,  taux, d.devise, debit , credit, exo from Journaux  as  j  join code as c on j.pcg = c.id join listedevise as d on j.devise = d.id  order by j.id asc;

-- modification de table journaux
ALTER TABLE journaux add exo int;
alter table journaux add foreign key (exo) references exercice(id);