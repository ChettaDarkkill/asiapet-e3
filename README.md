#  (การติดตั้ง) How to install

step การติดตั้ง :

 * หลังจากที่ download ไฟล์ไปแล้วให้เอาไฟล์ทั้งหมดไปวางไว้ที่ root directory ของ web server เช่น xampp , mamp .....
 * จากนั้นให้ สร้าง database และ import file .sql ลงไป โดยไฟล์จะอยู่ที่ /sql/import.sql
 * ให้เข้าไป config database ที่ path /application/config/database.php
 * user : somchai , pass  : 1234 
 * user : somying , pass  : 1234 
 * user : somjai , pass  : 1234 
 * user : admin1 , pass  : 1234 => สำหรับ admin

#  (Require)
 
 *  php 5.6 หรือมากกว่า 
 * php extenstion GD เพื่อ export pdf