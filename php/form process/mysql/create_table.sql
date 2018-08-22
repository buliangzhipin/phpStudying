create table my_comment(
  id int primary key auto_increment,
  author varchar(20) not null,
  comment varchar(300) not null,
  publishTime timestamp not null 
)charset utf8;
