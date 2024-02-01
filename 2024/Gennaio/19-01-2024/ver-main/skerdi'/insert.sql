INSERT INTO attore(nome, cogome) VALUES('kevin', 'tafa');
INSERT INTO attore(nome, cogome) VALUES('davide', 'rossini');
INSERT INTO attore(nome, cogome) VALUES('skerdi', 'velo');
INSERT INTO attore(nome, cogome) VALUES('nabil', 'touri');

INSERT INTO film(titolo, anno) VALUES('Ippo Tafa', 2024);
INSERT INTO film(titolo, film) VALUES('Haram', 2001);

INSERT INTO genere(nome) VALUES('gaipurn'),('religioso');

INSERT INTO recita(fkAttore, fkFilm) VALUES(1, 1), (3, 1), (2, 2), (4, 2);

INSERT INTO appartiene(fkFilm, fkGenere) VALUES(1, 1), (2, 2);
