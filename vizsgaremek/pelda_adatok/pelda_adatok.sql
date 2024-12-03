INSERT INTO termekek (nev, leiras, kategoria, ar, keszlet) 
VALUES 
('Piros Póló', 'Egy egyszerű, piros színű póló, pamut anyagból.', 'póló', 2500, 100),
('Kék Farmer Nadrág', 'Klasszikus kék farmer nadrág, kényelmes viselet.', 'nadrág', 7999, 50);

INSERT INTO vasarlok (nev, email, telefon, cim) 
VALUES 
('Kovács István', 'kovacs.istvan@example.com', '+36 20 123 4567', '1125 Budapest, Kossuth Lajos utca 10.');

INSERT INTO rendelesek (vasarlo_azon, datum, osszesen)
VALUES
(1, '2024-12-03', 12999);

INSERT INTO tetelek (rendeles_azon, termek_azon, mennyiseg)
VALUES
(1, 1, 2),  -- 1. rendeléshez: 2 db Piros Póló
(1, 2, 1);  -- 1. rendeléshez: 1 db Kék Farmer Nadrág

