<?php

$db = new SQLite3('code.education.db');

$db->query('drop table if exists categoria');

$db->query('create table categoria ( id integer Primary Key, nome text ) ');

$db->query("INSERT INTO categoria(id,nome) VALUES (1,'English course')");

$db->query("INSERT INTO categoria(id,nome) VALUES (2,'PHP Course')");

$db->query("INSERT INTO categoria(id,nome) VALUES (3,'No course')");


