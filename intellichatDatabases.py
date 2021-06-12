import mysql.connector

conn = mysql.connector.connect(
        host="localhost",
        user="ric",
        password="helloworld",
        database="discussionforum"
)

mycursor = conn.cursor()

createDbs = """
     CREATE TABLE accounts\
     (\
         user_id int(11) NOT NULL AUTO_INCREMENT,\
         reg_date varchar(100) NOT NULL, /* registration date when user first registered */\
         user_firstname varchar(100) NOT NULL,\
         user_lastname varchar(100) NOT NULL,\
         user_email varchar(100) NOT NULL,\
         user_username varchar(100) NOT NULL UNIQUE,\
         user_password varchar(100) NOT NULL,\
         user_status varchar(255) UNIQUE,\
         profile_pic varchar(255) UNIQUE, /* stores the path of the uploaded profile pic */\
         PRIMARY KEY(user_id)\
    );\

    CREATE TABLE threads\
    (\
        user_id int NOT NULL,\
        thread_id int NOT NULL AUTO_INCREMENT,\
        thread_author varchar(100) NOT NULL,\
        thread_subject varchar(100) NOT NULL,\
        thread_topic varchar(100) NOT NULL,\
        thread_title varchar(100) NOT NULL UNIQUE,\
        thread_content text NOT NULL,\
        thread_file varchar(255) UNIQUE, /* the filename of the thread */\
        thread_creation varchar(255), /* When the thread was created */\
        PRIMARY KEY(thread_id),\
        FOREIGN KEY(user_id) REFERENCES accounts(user_id)\
   );\

   CREATE TABLE activeaccounts\
   (\
        user_id int NOT NULL AUTO_INCREMENT,\
        user_username varchar(100) NOT NULL,\
        log_status varchar(100), /* Stores whether the user is logged in or offline */\
        login_time varchar(100), /* Stores when the user last logged in */\
        PRIMARY KEY(user_id)\
  );\

  CREATE TABLE MessageInbox\
  (\
        user_id int NOT NULL, /*id of user who is sending the message*/\
        user_id2 int NOT NULL,  /*id of user who will be receiving the message*/\
        messageTitle varchar(100), /*title of the private message*/\
        messageContent text NOT NULL, /*content of the private message*/\
        messageFrom varchar(100) NOT NULL, /*username of user who sent a private message*/\
        messageTo varchar(100) NOT NULL, /*username of the user who the private message was sent to*/\
        date_sent varchar(100) NOT NULL /*the date the private message was created*/\
  );\

  CREATE TABLE replies\
  (\
       user_id int NOT NULL,\
       user_username varchar(100) NOT  NULL, /* name of the user replying to a thread */\
       user_status varchar(100),\
       profile_pic varchar(255),\
       thread_title varchar(100) NOT NULL, /* title of the thread being replied to */\
       thread_file varchar(255) NOT NULL,\
       replies_id int NOT NULL AUTO_INCREMENT,\
       replies_creation varchar(100) NOT NULL, /* when the reply was created */\
       replies_content text NOT NULL,\
       PRIMARY KEY(replies_id),\
       FOREIGN KEY(user_id) REFERENCES accounts(user_id),\
       FOREIGN KEY(thread_file) REFERENCES threads(thread_file)\
  );\
"""

mycursor.execute(createDbs)

