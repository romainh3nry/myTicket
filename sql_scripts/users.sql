CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE users (
	id uuid DEFAULT uuid_generate_v4(),
    username VARCHAR(255),
    password VARCHAR(255),
    email VARCHAR(255),
    role VARCHAR(255),
	PRIMARY KEY (id)
);

INSERT into users (username, password, email, role) VALUES
    ('r.henry', crypt('thomas', gen_salt('bf')), 'r.henry@myticket.com', 'admin'),
    ('o.kenobi', crypt('darkside', gen_salt('bf')), 'o.kenobi@myticket.com', 'admin'),
    ('v.mackey', crypt('cassidy', gen_salt('bf')), 'v.mackey@myticket.com', 'user'),
    ('s.vendrell', crypt('mara', gen_salt('bf')), 's.vendrell@myticket.com', 'user'),
    ('r.gardeky', crypt('strikeforce', gen_salt('bf')), 'r.gardeky@myticket.com', 'user'),
    ('w.white', crypt('breakingbad', gen_salt('bf')), 'w.white@myticket.com', 'user'),
    ('t.stark', crypt('ironman', gen_salt('bf')), 't.stark@myticket.com', 'user');