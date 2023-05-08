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