参考HP: https://www.dbonline.jp/mysql/

mysql起動方法

    $ mysql -u root -p
        pass : vagrant

データベース作成

    mysql> create database taskeai;

テーブル作成
    
    mysql> create table taskeai.user(uid int not null primary key, uname varchar(20));

    mysql> create table taskeai.task(tid int not null primary key, tname varchar(100),done int,uid int,timelimit datetime);

データ参照
    
    mysql> select * frome taskeai.user;

    mysql> select * frome taskeai.task;

データ追加

    mysql> insert into taskeai.user(uid,uname) values(1,"hirata");
    
    mysql> insert into taskeai.task(tid,tname,done,uid,timelimit) values(1,"sleep",0,1,"2018-11-01 22:30:00");
     
データ更新

    mysql> update taskeai.task set done = 1 where tid = 1;
    
データ削除

    mysql> delete from taskeai.task where tid = 1;

    mysql> delete from taskeai.user where uid = 1;
    
mysql終了方法

    mysql> quit