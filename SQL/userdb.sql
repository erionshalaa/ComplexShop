Create table `users` 
(
`userid` int primary key AUTO_INCREMENT,
`userEmri` varchar(255),
`userMbiemri` varchar(255),
`userEmail` varchar(255),
`userPassword` varchar(255),
`userAccess` varchar(255)
)


insert into `users` (`userEmri`,`userMbiemri`,`userEmail`,`userPassword`,`userAccess`) values 
('erion','shala','erion@gmail.com','erion1234','user'),
('erioni','shala','erion123@gmail.com','erion123','user'),
('admin','admin','admin@gmail.com','admin','admin');


