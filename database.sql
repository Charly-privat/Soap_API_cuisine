CREATE DATABASE SOAP_CUISINE;

USE SOAP_CUISINE;

CREATE TABLE recette(
    id int AUTO_INCREMENT not null,
    nom varchar(50) not null,
    description varchar(100) not null,
    
    PRIMARY KEY(id)
);
CREATE TABLE ingredient(
    id int AUTO_INCREMENT not null,
    nom varchar(50) not null,
    
    PRIMARY KEY(id)
);
CREATE TABLE assoRecetteIngredient(
    idRecette int not null,
    idIngredient int not null,
    
    PRIMARY KEY(idRecette, idIngredient),
    FOREIGN KEY (idRecette) REFERENCES recette(id),
    FOREIGN KEY (idIngredient) REFERENCES ingredient(id)
);

INSERT INTO recette (nom, description) VALUES
("pate carbonara", "Tagliatelle avec de la crème frèche et lardons"), 
("pate bolognaise", "Saghetti avec sauce tomate et viande haché "), 
("pate 4 fromages", "Fusilli avec roquefort, emmental, mozza et reblochon fondu");

INSERT INTO ingredient (nom) VALUES
("Tagliatelle"), 
("Crème épaisse"), 
("Lardon"),
("Spaghetti"), 
("Sauce tomate"), 
("Viande haché"),
("Fusilli"), 
("roquefort"), 
("emmental"),
("Mozzarella"), 
("Reblochon");

INSERT INTO assorecetteingredient (nom) VALUES
(1,1),
(1,2),
(1,3),
(2,4),
(2,5),
(2,6),
(3,7),
(3,8),
(3,9),
(3,10),
(3,11);