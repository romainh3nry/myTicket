CREATE SEQUENCE tickets_id_seq;

CREATE TABLE tickets (
	id uuid DEFAULT uuid_generate_v4(),
    ticket_id VARCHAR(255) NOT NULL UNIQUE DEFAULT TO_CHAR(nextval('tickets_id_seq'), 'fm000000'),
    title VARCHAR(255) NOT NULL,
    date_creation TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    date_closure TIMESTAMPTZ,
    author uuid NOT NULL,
    service uuid NOT NULL,
    state BOOLEAN NOT NULL DEFAULT TRUE,
    message TEXT NOT NULL,
    related_to uuid NOT NULL,
    PRIMARY KEY (id),

    CONSTRAINT fk_author
        FOREIGN KEY(author)
            REFERENCES users(id),
    
    CONSTRAINT fk_service
        FOREIGN KEY(service)
            REFERENCES services(id),
    
    CONSTRAINT fk_related_to
        FOREIGN KEY(related_to)
            REFERENCES customers(id)
);

ALTER SEQUENCE tickets_id_seq OWNED BY tickets.ticket_id;

INSERT INTO tickets (title, author, service, message, related_to) VALUES
    ('test title ticket', (SELECT id FROM users WHERE username = 'r.henry'), (SELECT id FROM services WHERE name = 'VOIP'), 'Cecis est un test de création de ticket !', (SELECT id FROM customers WHERE name = 'SFR'));
    ('test 2 title ticket', (SELECT id FROM users WHERE username = 'v.mackey'), (SELECT id FROM services WHERE name = 'TV'), 'Cecis est un second test de création de ticket !', (SELECT id FROM customers WHERE name = 'UBS'));
    ('test 3 test test', (SELECT id FROM users WHERE username = 's.vendrell'), (SELECT id FROM services WHERE name = 'Hébergement'), 'Cecis est le troisième test de création de ticket !', (SELECT id FROM customers WHERE name = 'Orange'));