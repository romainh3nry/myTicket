CREATE TABLE tickets (
	id SERIAL NOT NULL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    date_creation TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    date_closure TIMESTAMPTZ,
    author uuid NOT NULL,
    service uuid NOT NULL,
    state BOOLEAN NOT NULL DEFAULT TRUE,
    message TEXT NOT NULL,
    related_to uuid NOT NULL,

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