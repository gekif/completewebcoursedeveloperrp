create table diary
(
	id int auto_increment
		primary key,
	email text null,
	password text null,
	diary text null
)
;

create table simulation
(
	id int auto_increment
		primary key,
	email text null,
	password text null
)
;

create table users
(
	id int auto_increment
		primary key,
	email text null,
	password text null,
	name varchar(50) null
)
;