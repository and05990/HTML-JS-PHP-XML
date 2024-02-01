CREATE TABLE attore(
    id INT AUTO_INCREMENT,
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE film(
    id INT AUTO_INCREMENT,
    titolo varchar(20) NOT NULL,
    anno INT NOT NULL,
    PRIMARY KEY(ID)
);

CREATE TABLE genere(
    id INT AUTO_INCREMENT,
    nome varchar(20) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE recita(
    fkAttore INT,
    fkFilm INT,
    PRIMARY KEY(fkAttore, fkFilm),
    FOREIGN KEY(fkAttore) REFERENCES attore(id),
    FOREIGN KEY(fkFilm) REFERENCES film(id)
);

CREATE TABLE appartiene(
    fkFilm INT,
    fkGenere INT,
    PRIMARY KEY(fkFilm, fkGenere),
    FOREIGN KEY(fkFilm) REFERENCES film(id),
    FOREIGN KEY(fkGenere) REFERENCES genere(id)
);