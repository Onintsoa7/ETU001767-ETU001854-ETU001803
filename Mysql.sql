    create table user(
        idUser int PRIMARY KEY AUTO_INCREMENT,
        isAdmin int,
        nomUser varchar(40),
        prenomUser varchar(40),
        email varchar(40),
        motDePasse varchar(30),
        dateDeNaissance date
    );

    INSERT INTO user VALUES (null , 1, 'Admin', 'Admin', 'admin@gmail.com', 'admin', '1980-01-01');
    INSERT INTO user VALUES (null , 0, 'user1', 'user1', 'user1@gmail.com', 'user1', '1985-03-15');
    INSERT INTO user VALUES (null , 0, 'user2', 'user2', 'user2@gmail.com', 'user2', '1990-06-20');
    INSERT INTO user VALUES (null , 0, 'user3', 'user3', 'user3@gmail.com', 'user3', '1995-09-25');

create table categorie(
    idCategorie int PRIMARY KEY AUTO_INCREMENT,
    nomCategorie varchar(40)
);

INSERT INTO categorie VALUES(null , 'Appareil electronique');
INSERT INTO categorie VALUES(null , 'Livre');
INSERT INTO categorie VALUES(null , 'Chaussure');
INSERT INTO categorie VALUES(null , 'Vetement');
INSERT INTO categorie VALUES(null , 'Lingerie');
INSERT INTO categorie VALUES(null , 'source energetique');

create table objet(
    idObjet int PRIMARY KEY AUTO_INCREMENT,
    nomObjet varchar(40),
    prixObjet float,
    idUser int,
    foreign key (idUser) references user(idUser)
);

create table categorieObjet(
    idCatObjet int PRIMARY KEY AUTO_INCREMENT,
    idCategorie int not null, 
    foreign key (idCategorie) references categorie(idCategorie),
    idObjet int not null, 
    foreign key (idObjet) references objet(idObjet)
);

INSERT INTO objet VALUES (null , 'Ordinateur portable', 100000, 2);
INSERT INTO objet VALUES (null , 'Livre de cuisine', 2000, 3);
INSERT INTO objet VALUES (null , 'Roman RJ', 1500, 2);
INSERT INTO objet VALUES (null , 'Maillot de bain', 80, 4);
INSERT INTO objet VALUES (null , 'Paire de chaussures de sport', 80, 3);
INSERT INTO objet VALUES (null, 'Pile', 15, 4);
INSERT INTO objet VALUES (null, 'Telephone', 15, 2);
INSERT INTO objet VALUES (null, 'Lampe', 200, 5);

INSERT INTO categorieObjet VALUES (null , 1, 1);
INSERT INTO categorieObjet VALUES (null , 1, 8);
INSERT INTO categorieObjet VALUES (null , 2, 2);
INSERT INTO categorieObjet VALUES (null , 2, 3);
INSERT INTO categorieObjet VALUES (null , 3, 5);
INSERT INTO categorieObjet VALUES (null , 4, 4);
INSERT INTO categorieObjet VALUES (null , 5, 4);
INSERT INTO categorieObjet VALUES (null , 6, 7);
INSERT INTO categorieObjet VALUES (null , 6, 8);

create table photos(
    idPhotos int PRIMARY KEY AUTO_INCREMENT,
    idObjet int, 
    photoPath varchar(70),
    foreign key (idObjet) references objet(idObjet)
);

INSERT INTO photos values(null,1,'ordi.jpg');
INSERT INTO photos values(null,2,'images.jpeg');
INSERT INTO photos values(null,3,'téléchargement.jpeg');
INSERT INTO photos values(null,4,'sw2.jpeg');
INSERT INTO photos values(null,5,'sh1.jpg');
INSERT INTO photos values(null,6,'pile.jpg');
INSERT INTO photos values(null,7,'4416.jpg');
INSERT INTO photos values(null,8,'l.jpg');

create table etat(
    idEtat int PRIMARY KEY AUTO_INCREMENT,
    nomEtat varchar(30)
);

INSERT INTO etat VALUES (null , 'Accepter');
INSERT INTO etat VALUES (null , 'Refuser');
INSERT INTO etat VALUES (null , 'En attente');



create table echange(
    idEchange int PRIMARY KEY AUTO_INCREMENT,
    idObjet1 int, 
    idObjet2 int,
    idUser1 int,
    idUser2 int,
    dateEchange datetime,
    dateAcceptation datetime,
    idEtat int,
    foreign key (idEtat) references etat(idEtat),
    foreign key (idObjet1) references objet(idObjet),
    foreign key (idObjet2) references objet(idObjet),
    foreign key (idUser1) references user(idUser),
    foreign key (idUser2) references user(idUser)
);


