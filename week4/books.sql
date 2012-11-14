CREATE TABLE IF NOT EXISTS `books` (
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` text,
  `asin` varchar(12) NOT NULL,
  `rating` tinyint(4) DEFAULT '0',
  `inventory` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `books` (`title`, `author`, `image`, `asin`, `rating`, `inventory`) VALUES
('The Art of Choosing', 'Sheena Iyengar', 'http://ecx.images-amazon.com/images/I/41ns4hxeTaL._SL160_.jpg', '0446504106', 0, 10),
('The Design of Everyday Things', 'Donald A. Norman', 'http://ecx.images-amazon.com/images/I/416lLxBcYjL._SL160_.jpg', '0465067107', 0, 5),
('Emotional Design: Why We Love (or Hate) Everyday Things', 'Donald A. Norman', 'http://ecx.images-amazon.com/images/I/41DqPZpVXyL._SL160_.jpg', '0465051367', 0, 12),
('Switch: How to Change Things When Change Is Hard', 'Chip Heath, Dan Heath', 'http://ecx.images-amazon.com/images/I/41oK6AwnKbL._SL160_.jpg', '0385528752', 0, 20),
('How We Decide', 'Jonah Lehrer', 'http://ecx.images-amazon.com/images/I/418H41zRudL._SL160_.jpg', '0618620117', 0, 0),
('Thoughtless Acts?: Observations on Intuitive Design', 'Jane Fulton Suri, Ideo', 'http://ecx.images-amazon.com/images/I/31CT51F1N8L._SL160_.jpg', '0811847756', 0, 20),
('The Man Who Lied to His Laptop: What Machines Teach Us About Human Relationships', 'Clifford Nass, Corina Yen', 'http://ecx.images-amazon.com/images/I/41Y5wO9oNGL._SL160_.jpg', '1617230014', 0, 1),
('Predictably Irrational, Revised and Expanded Edition: The Hidden Forces That Shape Our Decisions', 'Dan Ariely', 'http://ecx.images-amazon.com/images/I/41ubAk9G01L._SL160_.jpg', 'B002C949KE', 0, 1);