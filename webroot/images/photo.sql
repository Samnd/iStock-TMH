

create table if not exists  user (
id int(11) primary key AUTO_INCREMENT,
username varchar(100) not null,
password text not null,
email text not null

);

create table if not exists  photo(
idphoto int(11) primary key AUTO_INCREMENT,
url_image text not null,
name_image varchar(100) not null,
type varchar(20) not null,
des varchar(60) not null,
created date not null,
modify date 

);

create table if not exists photolist(
idlist int(11) primary key AUTO_INCREMENT,
list_photo text not null,
type_list varchar(20) not null

);
 
