CREATE TABLE artista(
    id INT AUTO_INCREMENT,
    nome varchar(20) NOT NULL,
    genere varchar(20) NOT NULL,
    PRIMARY KEY(ID)
);

CREATE TABLE citta(
    id INT AUTO_INCREMENT,
    nome varchar(20) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE concerto(
    id INT AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    dataOra datetime NOT NULL,
    fkCitta INT,
    PRIMARY KEY(id, fkCitta),
    FOREIGN KEY(fkCitta) REFERENCES citta(id)
);

CREATE TABLE partecipa(
    fkArtista INT,
    fkConcerto INT,
    PRIMARY KEY(fkArtista, fkConcerto),
    FOREIGN KEY(fkArtista) REFERENCES artista(id),
    FOREIGN KEY(fkConcerto) REFERENCES concerto(id)
);





INSERT INTO artista(nome, genere) VALUES('skerdi', 'phonk'), ('tafa', 'indie'), ('quagliotti', 'rock');

INSERT INTO citta(nome) VALUES('brescia'), ('napoli'), ('roma');

INSERT INTO concerto(nome, dataOra, fkCitta) VALUES('olimpia', '2023-07-20 11:20:30', 1), ('vesuvio', '2024-09-12 18:14:50', 2), ('carbonara', '2024-01-20 12:00:00', 3);

INSERT INTO partecipa(fkArtista, fkConcerto) VALUES(1, 1), (2, 2), (3, 3);