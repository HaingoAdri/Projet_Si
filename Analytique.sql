create table Centre(
    idCentre SERIAL PRIMARY KEY,
    Intitule varchar(100),
    idEntreprise INT,
    foreign key (idEntreprise) references entreprise(id)
);

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


