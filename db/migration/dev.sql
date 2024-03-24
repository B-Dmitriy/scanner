CREATE TABLE IF NOT EXISTS countries (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(256),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS artists (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(256),
    country_id INTEGER,
    PRIMARY KEY (id),
    INDEX countries_ind (country_id), FOREIGN KEY (country_id) REFERENCES countries(id)
);

CREATE TABLE IF NOT EXISTS genres (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(256),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS records (
    id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(512) NOT NULL UNIQUE,
    released INTEGER NOT NULL CHECK (released > 0 AND released < 9999),
    description VARCHAR(2024),
    style VARCHAR(128),
    price NUMERIC(9,2),
    amount INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP,
    artist_id INTEGER,
    genre_id INTEGER,
    CONSTRAINT records_pk_constraint PRIMARY KEY (id),
    INDEX artists_ind (artist_id), FOREIGN KEY (artist_id) REFERENCES artists(id),
    INDEX genres_ind (genre_id), FOREIGN KEY (genre_id) REFERENCES genres(id)
);

INSERT INTO genres(name) VALUES ('Alternative metal');
INSERT INTO genres(name) VALUES ('Folk-rock');

INSERT INTO countries(name) VALUES ('Armenia');
INSERT INTO countries(name) VALUES ('Russia');
INSERT INTO countries(name) VALUES ('New Zealand');

INSERT INTO artists(name, country_id) VALUES ('System of a Down', 1);
INSERT INTO artists(name, country_id) VALUES ('Manapart', 2);
INSERT INTO artists(name, country_id) VALUES ('Gin Wigmore', 3);

INSERT INTO records(name, released, price, amount, artist_id, genre_id)
VALUES ('Toxicity', 2001, 4.30, 5, 1, 1);
INSERT INTO records(name, released, price, amount, artist_id, genre_id)
VALUES ('Steal This Album!', 2002, 4.50, 10, 1, 1);
INSERT INTO records(name, released, price, amount, artist_id, genre_id)
VALUES ('Manapart', 2020, 2.70, 3, 2, 1);
INSERT INTO records(name, released, price, amount, artist_id, genre_id)
VALUES ('Gravel & Wine', 2011, 3.90, 8, 3, 2);

DROP TABLE IF EXISTS records;
DROP TABLE IF EXISTS genres;
DROP TABLE IF EXISTS artists;
DROP TABLE IF EXISTS countries;

SELECT
    id,
    name AS album_name,
    (SELECT name FROM artists WHERE id = r.artist_id) AS artist_name,
    released,
    created_at,
    (SELECT name FROM genres WHERE id = r.genre_id) AS genre_name
FROM records AS r;