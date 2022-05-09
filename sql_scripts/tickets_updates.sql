CREATE TABLE tickets_updates (
	id uuid DEFAULT uuid_generate_v4(),
    ticket_id INT NOT NULL,
    update TEXT NOT NULL,
    PRIMARY KEY (id),
    
    CONSTRAINT fk_ticket
        FOREIGN KEY(ticket_id)
            REFERENCES tickets(id)
);