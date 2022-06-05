

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE 'customer' (
  'username' varchar(30) NOT NULL,
  'fullname' varchar(30) NOT NULL,
  'email' varchar(30) NOT NULL,
  'contact' varchar(30) NOT NULL,
  'address' varchar(50) NOT NULL,
  'password' varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE 'food' (
  'F_ID' int(30) NOT NULL,
  'name' varchar(30) NOT NULL,
  'price' int(30) NOT NULL,
  'description' varchar(200) NOT NULL,
  'R_ID' int(30) NOT NULL,
  'images_path' varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE 'manager' (
  'username' varchar(30) NOT NULL,
  'fullname' varchar(30) NOT NULL,
  'email' varchar(30) NOT NULL,
  'contact' varchar(30) NOT NULL,
  'address' varchar(50) NOT NULL,
  'password' varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE 'orders' (
  'order_ID' int(30) NOT NULL,
  'F_ID' int(30) NOT NULL,
  'foodname' varchar(30) NOT NULL,
  'price' int(30) NOT NULL,
  'quantity' int(30) NOT NULL,
  'order_date' date NOT NULL,
  'username' varchar(30) NOT NULL,
  'R_ID' int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE 'restaurants' (
  'R_ID' int(30) NOT NULL,
  'name' varchar(30) NOT NULL,
  'email' varchar(30) NOT NULL,
  'contact' varchar(30) NOT NULL,
  'address' varchar(50) NOT NULL,
  'M_ID' varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Indexes for table 'customer'
--
ALTER TABLE 'customer'
  ADD PRIMARY KEY ('username');

--
-- Indexes for table 'food'
--
ALTER TABLE 'food'
  ADD PRIMARY KEY ('F_ID','R_ID'),
  ADD KEY 'R_ID' ('R_ID');

--
-- Indexes for table 'manager'
--
ALTER TABLE 'manager'
  ADD PRIMARY KEY ('username');

--
-- Indexes for table 'orders'
--
ALTER TABLE 'orders'
  ADD PRIMARY KEY ('order_ID'),
  ADD KEY 'F_ID' ('F_ID'),
  ADD KEY 'username' ('username'),
  ADD KEY 'R_ID' ('R_ID');

--
-- Indexes for table 'restaurants'
--
ALTER TABLE 'restaurants'
  ADD PRIMARY KEY ('R_ID'),
  ADD KEY 'M_ID' ('M_ID');



--
-- AUTO_INCREMENT for table 'food'
--
ALTER TABLE 'food'
  MODIFY 'F_ID' int(30) NOT NULL AUTO_INCREMENT, ;
--
-- AUTO_INCREMENT for table 'orders'
--
ALTER TABLE 'orders'
  MODIFY 'order_ID' int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table 'restaurants'
--
ALTER TABLE 'restaurants'
  MODIFY 'R_ID' int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- Constraints for table 'food'
--
ALTER TABLE 'food'
  ADD CONSTRAINT 'food_ibfk_1' FOREIGN KEY ('R_ID') REFERENCES 'restaurants' ('R_ID');

--
-- Constraints for table 'orders'
--
ALTER TABLE 'orders'
  ADD CONSTRAINT 'orders_ibfk_1' FOREIGN KEY ('F_ID') REFERENCES 'food' ('F_ID'),
  ADD CONSTRAINT 'orders_ibfk_2' FOREIGN KEY ('username') REFERENCES 'customer' ('username'),
  ADD CONSTRAINT 'orders_ibfk_3' FOREIGN KEY ('R_ID') REFERENCES 'restaurants' ('R_ID');

--
-- Constraints for table 'restaurants'
--
ALTER TABLE 'restaurants'
  ADD CONSTRAINT 'restaurants_ibfk_1' FOREIGN KEY ('M_ID') REFERENCES 'manager' ('username');

