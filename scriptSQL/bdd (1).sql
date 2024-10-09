DROP DATABASE IF EXISTS FOURNIL;
CREATE DATABASE IF NOT EXISTS FOURNIL;
USE FOURNIL;

CREATE TABLE CATEGORIE(
   codeCategorie VARCHAR(1) PRIMARY KEY NOT NULL,
   nomEmploye VARCHAR(20),
   denominationCategorie VARCHAR(20)
);

CREATE TABLE PRODUIT(
   codeCategorie VARCHAR(1),
   refProduit VARCHAR(4) PRIMARY KEY NOT NULL,
   designationProduit VARCHAR(30),
   photoProduit VARCHAR(100),
   prixProduit FLOAT(4,2),
   poidsProduit FLOAT(6,2),
   descriptionProduit VARCHAR(200),
   FOREIGN KEY (codeCategorie) REFERENCES CATEGORIE(codeCategorie)
);


CREATE TABLE ALLERGENE(
   numAllergene INT PRIMARY KEY AUTO_INCREMENT,
   denominationAllergene VARCHAR(20)
);

CREATE TABLE CONTENIR(
   numAllergene INT,
   codeCategorie VARCHAR(1),
   refProduit VARCHAR(4),
   presence BOOLEAN,
   trace BOOLEAN,
   PRIMARY KEY (numAllergene,codeCategorie,refProduit),
   FOREIGN KEY (numAllergene) REFERENCES ALLERGENE(numAllergene),
   FOREIGN KEY (codeCategorie) REFERENCES CATEGORIE(codeCategorie),
   FOREIGN KEY (refProduit) REFERENCES PRODUIT(refProduit)
);

CREATE TABLE CLIENT (
   numClient INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   idClient VARCHAR(20),
   mdpClient VARCHAR(50), 
   nomClient VARCHAR(150),
   emailClient VARCHAR(100),
   numRue VARCHAR(8),
   nomRue VARCHAR(150),
   codePostal VARCHAR(5),
   ville VARCHAR(50),
   telephoneClient VARCHAR(15),
   clientPro BOOLEAN
);


CREATE TABLE COMMANDE (
   numCommande INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   numClient INT NOT NULL,
   refProduit VARCHAR(4) NOT NULL,
   quantite INT NOT NULL,
   dateCommande DATETIME DEFAULT CURRENT_TIMESTAMP,
   totalCommande FLOAT(8,2), 
   FOREIGN KEY (numClient) REFERENCES CLIENT(numClient)
) ENGINE=InnoDB;

CREATE TABLE COMMANDE_PRODUITS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numCommande INT,
    refProduit VARCHAR(4), 
    quantite INT,
    FOREIGN KEY (numCommande) REFERENCES COMMANDE(numCommande) ON DELETE CASCADE,
    FOREIGN KEY (refProduit) REFERENCES PRODUIT(refProduit) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE FACTURE (
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    numCommande INT NOT NULL,
    dateFacture TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Date de la facture
    montantTotal FLOAT(8,2), -- Montant total de la facture
    FOREIGN KEY (numCommande) REFERENCES COMMANDE(numCommande) -- Clé étrangère vers COMMANDE
);
 



INSERT INTO CATEGORIE(codeCategorie,nomEmploye,denominationCategorie) VALUES
('P','Kopp','Pains'),
('V','Arrass','Viennoiseries'),
('S','Kopp','Specialites');

INSERT INTO PRODUIT(codeCategorie, refProduit, designationProduit, photoProduit, prixProduit, poidsProduit, descriptionProduit) VALUES 
('P', 'P001', 'Baguette traditionnelle', 'assets/img/pains/baguette250gr.png', 1.30, 250, 'Une baguette croustillante à la croûte dorée pour accompagner vos repas ou pour réaliser des sandwichs'), 
('P', 'P002', 'Pain de campagne', 'assets/img/pains/painCampagne400gr.png', 3.80, 400, 'Un pain rustique au levain, avec une mie généreuse et un goût légèrement acidulé'), 
('P', 'P003', 'Pain aux céréales', 'assets/img/pains/painCereales350gr.png', 4, 350, 'pain moelleux aux graines de lin, tournesol et sésame, pour une texture légèrement croquante'), 
('V', 'V001', 'Croissant pur beurre', 'assets/img/viennoiseries/croissantBeurre50gr.png', 1.30, 50, 'Un classique de la boulangerie, un croissant feuilleté, croustillant à l\'extérieur, tendre et fondant à l\'intérieur'), 
('V', 'V002', 'Pain au chocolat', 'assets/img/viennoiseries/painChocolat50gr.png', 2.60, 50, 'Une viennoiserie gourmande, avec une généreuse barre chocolatée enveloppée dans une pâte feuilletée croustillante'), 
('V', 'V003', 'Chausson aux pommes', 'assets/img/viennoiseries/chaussonPommes90gr.png', 2.90, 90, 'Un chausson croustillant garni de compote de pommes maison, saupoudré de sucre et de cannelle'), 
('S', 'S001', 'Fougasse aux olives', 'assets/img/specialites/fougasseOlives400gr.jpg', 2.00, 400, 'Une spécialité provençale, une focaccia moelleuse aux olives noires. Une portion'), 
('S', 'S002', "Pain d'épices", 'assets/img/specialites/painEpicesMaison500gr.jpg', 5.50, 500, "Un pain d'épices traditionnel, moelleux et parfumé, aux arômes de miel, de cannelle"), 
('S', 'S003', 'Galette frangipane', 'assets/img/specialites/galetteFrangipane660gr.png', 18.00, 660, 'Une galette pour 4 personnes à base de pâte d’amandes. Prix au kg');


INSERT INTO ALLERGENE(denominationAllergene) VALUES
("gluten"),
("levain"),
("lin"),
("tournesol"),
("sésame"),
("chocolat"),
("pommes"),
("olives"),
("miel "),
("cannelle"),
("épices"),
("amandes"),
("fruits à coques");

INSERT INTO CONTENIR(numAllergene,codeCategorie,refProduit,trace,presence) VALUES
(1,"P","P001",1,0),
(1,"P","P002",1,0),
(2,"P","P002",1,0),
(1,"P","P003",1,0),
(3,"P","P003",1,0),
(4,"P","P003",1,0),
(5,"P","P003",1,0),
(1,"V","V001",1,0),
(1,"V","V002",1,0),
(6,"V","V002",1,0),
(1,"V","V003",1,0),
(7,"V","V003",1,0),
(1,"S","S001",1,0),
(8,"S","S001",1,0),
(1,"S","S002",1,0),
(9,"S","S002",1,0),
(10,"S","S002",1,0),
(11,"S","S002",1,0),
(1,"S","S003",1,0),
(12,"S","S003",1,0),
(13,"S","S003",0,1);


-- INSERT INTO CLIENT(idClient, mdpClient, nomClient, clientPro) VALUES 
-- ("1", MD5("mdp"),);



