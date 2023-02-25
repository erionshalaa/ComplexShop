Create table `produktet` 
(
`id` int primary key AUTO_INCREMENT,
`emri` varchar(255),
`kategoria` varchar(255),
`cmimi` float,
`foto` varchar(255),
`pershkrimi` varchar(255)
)


insert into `produktet` (`emri`,`kategoria`,`cmimi`,`foto`,`pershkrimi`) values 
('Apple Macbook Air','Laptop','969.98','Macbook.jpg','Apple Macbook 13.3 M1 8-core, 8GB, 256GB, 7-core GPU, Space Grey '),
('Iphone 14 Pro Max 128 gb','Telefon','1689.99','iphone14promax.jpg','Apple Iphone 14 Pro Max 128gb,6gb Ram'),
('Laptop Lenovo NB Legion 5 ','Laptop','1439.99','laptoplenovo.png','Legion 5 15IAH7H, 15.6, Intel Core I5-12500H, 2x 8GB, 1TB SSD, NVIDIA GeForce RTX 3060 6GB GDDR6 '),
('TV Samsung','TV','999.99','SamsungTV.jpg','TV Samsung UE75TU7092UXXH 75, 4K UHD, i zi '),
('Monitor Dell','Monitor','1050.99','monitordell.jpg','Monitor Dell UltraSharp U3219Q - LED 32 (81cm), 4K UHD, i zi  argjendë '),
('Kufje HyperX Cloud II','Kufje','139.99','kufjehyperx.jpg','Kufje HyperX Cloud II Wireless (HHSC2X-BA-RDG), 20000 Hz, të zeza kuqe '),
('Iphone 12 Pro Max','Telefon','699.99','iphone12.jpg','Apple Iphone 12 Pro Max, 128GB, 4GB RAM'),
('Televizor LG ','TV','719.99','LGTV.jpg','Televizor LG 65UQ70003, 65 (164cm), 4K UHD, i zi '),
('Samsung Galaxy S22 Ultra','Telefon','1399.99','Samsunggalaxys22.png',' Samsung Galaxy S22 Ultra, 6.8, 12GB RAM, 512GB, Burgundy '),
('MSI GV15 15.6" Gaming','Laptop','1199.99','MSI.jpg','MSI GV15 15.6" 144Hz Gaming'),
('ASUS Vivobook Laptop 17.3"','Laptop','599.99','ASUS.jpg','ASUS Vivobook Laptop 17.3" '),
('Samsung 86'' Class TU9010 LED 4K','TV','1399.99','Samsung86.jpg','Samsung 86'' Class TU9010 LED 4K');
