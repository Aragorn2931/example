-- postgres 12

drop table if exists contacts, friends;
drop sequence  if exists contacts_id_seq, friends_id_seq;

create sequence contacts_id_seq;
create table if not exists contacts (
    id int not null primary key default nextval('contacts_id_seq'),
    name varchar
);

create sequence friends_id_seq;
create table if not exists friends (
    id int not null default nextval('friends_id_seq'),
    contact_id int not null,
    friend_id int not null,
    unique (contact_id, friend_id)
);


insert into contacts (name) values
    ('User1'),
    ('User2'),
    ('User3'),
    ('User4'),
    ('User5'),
    ('User6'),
    ('User7'),
    ('User8'),
    ('User9');


insert into friends (contact_id, friend_id) VALUES
    (1,2), (1,3), (1,4), (1,5), (1,6), (1,7), (1,8),
    (2,3), (2,4), (2,5),
    (3,2), (3,4), (3,6),
    (4,2), (4,3), (4,5), (4,6), (4,7), (4,8),
    (5,2), (5,3), (5,4), (5,6), (5,7), (5,8),
    (6,2), (6,3), (6,4), (6,5), (6,7), (6,8),
    (7,2), (7,3), (7,4), (7,5), (7,6), (7,8), (7,9),
    (8,2), (8,3), (8,4), (8,5), (8,6), (8,7);
