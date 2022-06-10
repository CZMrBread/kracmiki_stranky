CREATE DATABASE `Rozvoz`;
use Rozvoz;


create table Zakaznik (idz int primary key, jmeno varchar(255) not null, prijmeni varchar(255), tel_cislo int not null, adresa varchar(255) not null);

create table Objednavka (ido int primary key, cena_celkem int, typ_platby enum("Hotove", "On-line") not null, idz int not null, idk int not null, cas_vyt datetime not null);

create table Kosik (idko int primary key, idp int not null, ido int not null);

create table Produkt (idp int primary key, nazev varchar(255) not null, cena int not null);

create table Kuryr (idk int primary key, jmeno varchar(255) not null, prijmeni varchar(255) not null, tel_cislo int not null);



insert into Zakaznik values (1, "Jan", "Nový", 608956321, "Nabrezi 1. Maje 728");
insert into Zakaznik values (2, "Petr", "Rychlý", 608156823, "Na Lipách 16");
insert into Zakaznik values (3, "Aleš", "Novotný", 777456315, "Budovcova 923");
insert into Zakaznik values (4, "Ondřej", "Kirián", 777156489, "Truhlářská 123");
insert into Zakaznik values (5, "Petr", "Rychlý", 721789123, "Smrkovická 32");

insert into Objednavka values(1, 305, "Hotove", 1, 1, "2022-02-01 18:12:56");
insert into Objednavka values(2, 120, "On-line", 2, 2, "2022-02-21 21:15:13");
insert into Objednavka values(3, 145, "Hotove", 3, 3, "2022-02-11 19:26:08");
insert into Objednavka values(4, 150, "On-line", 4, 4, "2022-02-28 17:32:23");
insert into Objednavka values(5, 385, "Hotove", 5, 5, "2022-02-16 16:56:42");

insert into Kosik values(1, 1, 1);
insert into Kosik values(2, 2, 1);
insert into Kosik values(3, 5, 1);
insert into Kosik values(4, 1, 2);
insert into Kosik values(5, 3, 3);
insert into Kosik values(6, 4, 3);
insert into Kosik values(7, 2, 4);
insert into Kosik values(8, 1, 5);
insert into Kosik values(9, 2, 5);
insert into Kosik values(10, 3, 5);
insert into Kosik values(11, 5, 5);

insert into Produkt values(1, "Svickova", 120);
insert into Produkt values(2, "Hamburger", 150);
insert into Produkt values(3, "Kebab", 80);
insert into Produkt values(4, "Salat", 65);
insert into Produkt values(5, "Hranolky", 35);

insert into Kuryr values(1, "Filip", "Hos", 608353156);
insert into Kuryr values(2, "Václav", "Frolík", 721123156);
insert into Kuryr values(3, "Andrej", "Fiala", 608321513);
insert into Kuryr values(4, "Alexandr", "Rychlý", 721753150);
insert into Kuryr values(5, "Jakub", "Benda", 777353555);
