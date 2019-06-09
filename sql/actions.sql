DROP TABLE IF EXISTS Route;
CREATE TABLE Route(
    name VARCHAR(50) PRIMARY KEY,
    controller VARCHAR(50) NOT NULL,
    function VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS Privilege;
CREATE TABLE Privilege(
    route VARCHAR(50),
    level VARCHAR(30),
    FOREIGN KEY(level) REFERENCES Level(name),
    FOREIGN KEY(route) REFERENCES Route(name),
    PRIMARY KEY(route,level)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS Level;
CREATE TABLE Level(
    name VARCHAR(30) PRIMARY KEY
);

INSERT INTO Route VALUES
('signup','UserController','signup'),
('signin','UserController','signin'),
('index.php','HomeController','showView'),
('logout','UserController','logout'),
('users','UserController','showView'),
('users-edit','UserController','showEditView'),
('users-new','UserController','showNewView'),
('users-api-update','UserController','updateUser'),
('users-api-delete','UserController','deleteUser'),
('users-api-delete-bulk','UserController','deleteUsers'),
('users-api-check','UserController','checkUsername'),
('users-api-new','UserController','newUser'),
('about','AboutController','showView'),
('products','ProductController','showView'),
('products-edit','ProductController','showEditView'),
('products-new','ProductController','showNewView'),
('products-api-update','ProductController','updateProduct'),
('products-api-delete','ProductController','deleteProduct'),
('products-api-delete-bulk','ProductController','deleteProducts'),
('products-api-check','ProductController','checkProductCode'),
('product-api-new','ProductController','newProduct');

INSERT INTO Level VALUES
('Administrator'),
('Employee'),
('Client'),
('Logged'),
('Public');

INSERT INTO Privilege VALUES
('signup','Public'),
('signin','Public'),
('index.php','Public'),
('logout','Logged'),
('users','Administrator'),
('users-edit','Administrator'),
('users-new','Administrator'),
('users-api-update','Administrator'),
('users-api-delete','Administrator'),
('users-api-delete-bulk','Administrator'),
('users-api-check','Administrator'),
('users-api-new','Administrator'),
('about','Public'),
('products','Logged'),
('products-edit','Employee'),
('products-new','Employee'),
('products-api-update','Employee'),
('products-api-delete','Employee'),
('products-api-delete-bulk','Employee'),
('product-api-new','Employee'),
('products-edit','Administrator'),
('products-new','Administrator'),
('products-api-update','Administrator'),
('products-api-delete','Administrator'),
('products-api-delete-bulk','Administrator'),
('product-api-new','Administrator');
