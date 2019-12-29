create table users (
	id int auto_increment not null,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    primary key(id)
);

INSERT INTO users (id, first_name, last_name) VALUES (1, 'Admin', 'Admin');

create table posts (
	id int auto_increment not null,
    title varchar(100) not null,
    body text not null,
    created_at datetime default current_timestamp,
    user_id int not null,
    primary key(id),
    foreign key(user_id) references users(id)
);

INSERT INTO posts (id, title, body, user_id) VALUES (1, 'One Post', 'This is post one.', 1);

create table comments (
	id int auto_increment not null,
    author varchar(50) not null,
    text text not null,
    post_id int not null,
    primary key(id),
    foreign key(post_id) references posts(id)
);

INSERT INTO comments (id, author, text, post_id) VALUES (1, 'Player', 'Some comment', 1);

