-- Tables de base
CREATE TABLE users (
                       id SERIAL PRIMARY KEY,
                       email VARCHAR(255) UNIQUE NOT NULL,
                       password_hash VARCHAR(255) NOT NULL,
                       first_name VARCHAR(100),
                       last_name VARCHAR(100),
                       avatar_url VARCHAR(255),
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Héritage pour les différents types d'utilisateurs
CREATE TABLE participants (
                              notifications_enabled BOOLEAN DEFAULT true,
                              phone_number VARCHAR(20)
) INHERITS (users);

CREATE TABLE organizers (
                            company_name VARCHAR(255),
                            siret VARCHAR(14),
                            description TEXT
) INHERITS (users);

CREATE TABLE administrators (
                                admin_level INTEGER DEFAULT 1,
                                last_login TIMESTAMP
) INHERITS (users);

-- Tables pour les événements
CREATE TABLE events (
                        id SERIAL PRIMARY KEY,
                        organizer_id INTEGER REFERENCES users(id),
                        title VARCHAR(255) NOT NULL,
                        description TEXT,
                        start_date TIMESTAMP NOT NULL,
                        end_date TIMESTAMP NOT NULL,
                        location VARCHAR(255),
                        capacity INTEGER,
                        status VARCHAR(50) DEFAULT 'pending',
                        is_featured BOOLEAN DEFAULT false,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Catégories d'événements
CREATE TABLE categories (
                            id SERIAL PRIMARY KEY,
                            name VARCHAR(100) NOT NULL,
                            description TEXT
);

-- Table de liaison événements-catégories
CREATE TABLE event_categories (
                                  event_id INTEGER REFERENCES events(id),
                                  category_id INTEGER REFERENCES categories(id),
                                  PRIMARY KEY (event_id, category_id)
);

-- Tickets avec héritage
CREATE TABLE tickets (
                         id SERIAL PRIMARY KEY,
                         event_id INTEGER REFERENCES events(id),
                         price DECIMAL(10,2),
                         quantity INTEGER,
                         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE vip_tickets (
                             benefits TEXT,
                             early_access BOOLEAN DEFAULT true
) INHERITS (tickets);

CREATE TABLE early_bird_tickets (
                                    end_date TIMESTAMP,
                                    discount_percentage INTEGER
) INHERITS (tickets);

-- Réservations
CREATE TABLE bookings (
                          id SERIAL PRIMARY KEY,
                          user_id INTEGER REFERENCES users(id),
                          ticket_id INTEGER REFERENCES tickets(id),
                          quantity INTEGER,
                          total_price DECIMAL(10,2),
                          status VARCHAR(50) DEFAULT 'pending',
                          booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                          qr_code VARCHAR(255)
);

-- Index pour optimiser les performances
CREATE INDEX idx_events_start_date ON events(start_date);
CREATE INDEX idx_events_status ON events(status);
CREATE INDEX idx_bookings_user ON bookings(user_id);
CREATE INDEX idx_tickets_event ON tickets(event_id);

-- Triggers pour mise à jour automatique
CREATE OR REPLACE FUNCTION update_updated_at()
RETURNS TRIGGER AS $$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER users_updated_at
    BEFORE UPDATE ON users
    FOR EACH ROW
    EXECUTE FUNCTION update_updated_at();

CREATE TRIGGER events_updated_at
    BEFORE UPDATE ON events
    FOR EACH ROW
    EXECUTE FUNCTION update_updated_at();