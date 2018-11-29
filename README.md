# P4
Create a blog with MVC PHP POO design pattern 

About BLOG Database connection:
Actually, index.php use dev.php to authentificate to a localhost database.
For an online version, personalize prod.php at your needs.

About BLOG Database structure:
  -Admin: id (int, primary, auto_increment);
          pseudo (varchar 255);
          password (varchar 255);  -> save with password_hash()
          
  -Post: id (int, primary, auto_increment);
         title (varchar 255);
         content (text)
         date_creation (datetime);
         
  -Comment: id (int, primary, auto_increment);
            id_post (int);
            author (varchar 255);
            comment (text);
            report_comment(int);
            date_comment (datetime);
            
Thanks to @ajlkn and HTML5UP for the free, fully responsive HTML5 + CSS3 site template designed
and released for free under the Creative Commons license.
Link below: 
https://html5up.net/massively
