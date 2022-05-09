CREATE TABLE services (
	id uuid DEFAULT uuid_generate_v4(),
    name VARCHAR(255),
	PRIMARY KEY (id)
);

INSERT into services (name) VALUES
    ('Internet ADSL'),
    ('Internet fibre'),
    ('Telephonie fixe'),
    ('Telephonie mobile'),
    ('Hébergement'),
    ('infrastructure'),
    ('DSI prod'),
    ('Developpment'),
    ('TV'),
    ('VOIP'),
    ('Sécurité');