CREATE TABLE tickets_updates (
	id uuid DEFAULT uuid_generate_v4(),
    ticket_id uuid NOT NULL,
    update TEXT NOT NULL,
    date_creation TIMESTAMPTZ NOT NULL DEFAULT NOW(),
    PRIMARY KEY (id),
    
    CONSTRAINT fk_ticket
        FOREIGN KEY(ticket_id)
            REFERENCES tickets(id)
);