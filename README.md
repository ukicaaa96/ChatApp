## The chat application consists of two parts

-First part is a chat room where each user can see the message of any user.

-Second part is a private chat, where the user selects the user he wants to talk to, then opens a private chat in which these two users communicate and the messages are not visible to other users.

## How it works:
-It is necessary for the user to register and then log in with his parameters in order to be able to access the chat

-When the user registers by default does not get permission to chat, the permission must be assigned to him by the admin who is already in the database

-Admin login parameters: email: admin@example.com password:admin

## Instructions:

-Have to import database backup from chat_backup_db.sql

-Then open file php/Connection.php and set values from your data base where you import chat_backup_db.sql

-When you set everything up, then run http://localhost/chat
