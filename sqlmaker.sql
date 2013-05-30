DROP TABLE IF EXISTS stores;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS users;


CREATE TABLE stores (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name text,
    address text,
    url text,
    gps_lat double,
    gps_lon dobule,
    user_id int,
);

CREATE TABLE images (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    store_id int,
    path text
);

CREATE TABLE comments (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    store_id int,
    comment text,
    time DATETIME
);

CREATE TABLE users (
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login_id varchar(30),
    name text,
    pass varchar(40)
);


//TEST DATA INSERT

INSERT INTO stores(name,address,url,gps_lat,gps_lon,user_id) VALUES ("SFC食堂","藤沢市遠藤hoge","",35.387161,139.426077,1);
INSERT INTO stores(name,address,url,gps_lat,gps_lon,user_id) VALUES ("SFCラウンジ","藤沢市遠藤fuga","",35.387612,139.427406,1);
INSERT INTO users(id,login_id,name,pass) VALUES (1,"master","master","31f30ddbcb1bf8446576f0e64aa4c88a9f055e3c");
INSERT INTO comments(user_id,store_id,comment) VALUES (1,1,"食堂へのコメント",'9999-12-31 23:59:59');
INSERT INTO comments(user_id,store_id,comment) VALUES (2,1,"ラウンジへのコメント",'9999-12-31 23:59:59');
INSERT INTO images(store_id,path) VALUES (1,"image1.jpg");



