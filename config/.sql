#菜单表
CREATE TABLE ari_menus(
mid int KEY auto_increment,
menu_name varchar(50) not null,
menu_control varchar(20) not null,
menu_method varchar(20) not null,
menu_url varchar(50) not null,
is_status tinyint DEFAULT '1'
);

#部门表
CREATE TABLE ari_depts(
dept_id int KEY auto_increment,
dept_name varchar(50) not null,
dept_remark varchar(200) not null,
create_time datetime not null,
is_status tinyint DEFAULT '1'
);

#职位表
CREATE TABLE ari_positions(
pid int KEY auto_increment,
pos_name varchar(50) not null,
pos_remark varchar(200) not null,
create_time datetime not null,
is_status tinyint DEFAULT '1'
);

#角色表
CREATE TABLE ari_roles(
rid int KEY auto_increment,
role_name varchar(50) not null,
role_remark varchar(200) not null,
role_ways text not null,
create_time datetime not null,
is_status tinyint DEFAULT '1'
);

#用户表
CREATE TABLE ari_users(
uid int KEY auto_increment,
username varchar(50) not null,
password varchar(50) not null,
email varchar(50) not null,
phone varchar(30) not null,
address varchar(100) not null,
create_time datetime not null,
is_status tinyint DEFAULT '1',
dept_id int not null,
pid int not null,
user_roles text not null
);

#订单表
CREATE TABLE ari_orders(
oid int KEY auto_increment,
order_num varchar(30) not null,

);

#需求表
CREATE TABLE ari_demands(
did int KEY auto_increment,
);

#售后表
CREATE TABLE ari_aftersales(
aid int KEY auto_increment,
);

#任务表
CREATE TABLE ari_tasks(
tid int KEY auto_increment,
);

#发票表
CREATE TABLE ari_invoices(
in_id int KEY auto_increment,
);