create table TypeCentre(
    idTypeCentre SERIAL PRIMARY KEY,
    Intitule varchar(100)
);

insert into TypeCentre(Intitule) values ('Centre Operationnel');
insert into TypeCentre(Intitule) values ('Centre de Structure');

create table Centre(
    idCentre SERIAL PRIMARY KEY,
    Intitule varchar(100),
    idEntreprise INT,
    idTypeCentre INT,
    foreign key (idTypeCentre) references TypeCentre(idTypeCentre),
    foreign key (idEntreprise) references entreprise(id)
);

create or replace view CentreType as
    select Centre.*,TypeCentre.Intitule as typecentre from Centre join TypeCentre on Centre.idTypeCentre = TypeCentre.idTypeCentre;

create table produit(
    idProduit SERIAL PRIMARY KEY,
    Intitule varchar(100),
    idEntreprise INT,
    foreign key (idEntreprise) references entreprise(id)
);

create table detailCharge(
    id SERIAL PRIMARY KEY,
    numero int,
    types INT default 0,
    nature INT default 0,
    unite varchar(100),
    idExercice int,
    idEntreprise int,
    foreign key (idEntreprise) references entreprise(id),
    foreign key (idExercice) references exercice(id)
);

create table chargeProduit(
    id SERIAL PRIMARY KEY,
    numero int,
    idProduit int,
    pourcentage double precision,
    idExercice int,
    idEntreprise int,
    foreign key (idEntreprise) references entreprise(id),
    foreign key (idExercice) references exercice(id),
    foreign key (idProduit) references produit(idProduit)
);

create table chargeCentre(
    id SERIAL PRIMARY KEY,
    numero int,
    idCentre int,
    pourcentage double precision,
    idExercice int,
    idEntreprise int,
    foreign key (idEntreprise) references entreprise(id),
    foreign key (idExercice) references exercice(id),
    foreign key (idCentre) references Centre(idCentre)
);

create or replace view lesChargesJournaux as
    select * from journaux where pcg::text like '6%';

create or replace view centreDetails as
    select chargeCentre.*,centre.Intitule,lesChargesJournaux.debit,lesChargesJournaux.date,detailCharge.types,(lesChargesJournaux.debit*chargeCentre.pourcentage)/100 as montantPourcentage from chargeCentre join centre on chargeCentre.idCentre = centre.idCentre join lesChargesJournaux on chargeCentre.numero = lesChargesJournaux.pcg join detailCharge on detailCharge.numero = chargeCentre.numero;