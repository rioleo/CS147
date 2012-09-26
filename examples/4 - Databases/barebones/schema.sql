CREATE TABLE IF NOT EXISTS `data` (
  `message` varchar(1000) NOT NULL,
  `product` varchar(1000) NOT NULL
);

INSERT INTO `data` (`message`, `product`) VALUES
('sample message', 'iphone');
