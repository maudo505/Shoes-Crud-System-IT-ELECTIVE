
-- Name-db-"Data"


-- Sign-up forLogin validation Sign-up
CREATE TABLE names (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--Admin panel 
-- Create the 'movie' table for reservations
CREATE TABLE movie (
    id INT AUTO_INCREMENT PRIMARY KEY,          
    email VARCHAR(255) NOT NULL,                  
    password VARCHAR(255) NOT NULL,                
    address VARCHAR(255),                          
    movie_title VARCHAR(255) NOT NULL,              
    gcash_number VARCHAR(20),                       
    date DATE NOT NULL,                            
    time TIME NOT NULL,                             
    quantity INT NOT NULL,                          
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);


