/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  flavio
 * Created: 10/07/2016
 */

CREATE TABLE listings(
	listings_id integer not null AUTO_INCREMENT,
	category char(16) not null,
	title varchar(128) not null,
	data_created timestamp not null default CURRENT_TIMESTAMP,
	data_expires timestamp null default null,
	description varchar(4096) default null,
	photo_filename varchar(1024) default null,
	contact_name varchar(255) default null,
	contact_email varchar(255) default null,
	contact_phone varchar(32) default null,
	city varchar(128) default null,
	country char(2) not null,
	price decimal(12,2) not null,
	delete_code char(16) character set utf8 collate utf8_bin default null,
	primary key (listings_id),
	key title (title),
	key category (category),
	key delete_code (delete_code)
);