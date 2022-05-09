CREATE TABLE customers (
	id uuid DEFAULT uuid_generate_v4(),
    name VARCHAR(255),
    email VARCHAR(255),
    tel BIGINT,
	PRIMARY KEY (id)
);

INSERT into customers (name, email, tel) VALUES
    ('UBS', 'contact@ubs.com', 0800012304),
    ('SFR', 'support@sfr-n3.com', 0103019321),
    ('Orange', 'noc@orange-csciw.fr', 0106015330),
    ('Monaco Telecom', 'accueil@monaco-telecom.mc', 0037799666603),
    ('BICS', 'support@bics.com', 004412474598),
    ('Caisse d epargne', 'support-ce@ce.fr', 0493121145),
    ('CIC', 'info@cic.fr', 0976452512),
    ('Credit Agricole', 'ca-paca@ca.com', 0976854315),
    ('Vodafone', 'support@vodafone.com', 004456784575),
    ('CMB', 'noc@cmb.mc', 0037793023456),
    ('Bouygues Telecom', 'noc@bouygues.fr', 0899096644),
    ('Telis', 'info@telis.com', 0156490876),
    ('Taurus', 'central@taurus.com', 0899417630),
    ('FREE', 'noc@free.fr', 0841237695),
    ('OVH', 'noc@ovhcloud.com', 0812564790),
    ('Apple', 'support@apple.com', 0178954684),
    ('Barclays', 'support@barclays.com', 0493458609),
    ('British Telecom', 'support@bt.uk', 004412568709);