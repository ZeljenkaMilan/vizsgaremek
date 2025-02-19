INSERT INTO termekek (nev, leiras, kategoria, ar, keszlet) 
VALUES 
('Fekete, logós póló', 'Egy egyszerű, fekete színű póló, pamut anyagból.', 'póló', 5000, 100),
('Fekete, logós pulóver', 'Klasszikus fekete pulóver, kényelmes viselet.', 'pulóver', 12000, 50);

INSERT INTO vasarlok (nev, email, telefon, cim) 
VALUES 
('Kovács István', 'kovacs.istvan@example.com', '+36 20 123 4567', '1125 Budapest, Kossuth Lajos utca 10.');

INSERT INTO rendelesek (vasarlo_azon, datum, osszesen)
VALUES
(1, '2024-12-03', 12999);

INSERT INTO tetelek (rendeles_azon, termek_azon, mennyiseg)
VALUES
(1, 1, 2),  -- 1. rendeléshez: 2 db Fekete logos polo
(1, 2, 1);  -- 1. rendeléshez: 1 db Fekete logos pulover


INSERT INTO termek_kepek (termek_azon, kep_url) 
VALUES 
(1, 'black_logo_tshirt_front.png'),  -- Fekete logos póló (elöl)
(1, 'black_logo_tshirt_back.png'),   -- Fekete logos póló (hátul)
(2, 'black_logo_hoodie_front.png'),  -- Fekete logos pulóver (elöl)
(2, 'black_logo_hoodie_back.png');   -- Fekete logos pulóver (hátul)
