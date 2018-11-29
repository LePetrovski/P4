# P4
Create a blog with MVC PHP POO design pattern 

About BLOG Database connection:</br>
Actually, index.php use dev.php to authentificate to a localhost database.</br>
For an online version, personalize prod.php at your needs.</br>
</br>
About BLOG Database structure:</br>
  -Admin: id (int, primary, auto_increment);</br>
          pseudo (varchar 255);</br>
          password (varchar 255);  -> save with password_hash()</br>
 </br>         
  -Post: id (int, primary, auto_increment);</br>
         title (varchar 255);</br>
         content (text);</br>
         date_creation (datetime);</br>
         </br>
  -Comment: id (int, primary, auto_increment);</br>
            id_post (int);</br>
            author (varchar 255);</br>
            comment (text);</br>
            report_comment(int);</br>
            date_comment (datetime);</br>
            </br>
Thanks to @ajlkn and HTML5UP for the free, fully responsive HTML5 + CSS3 site template designed
and released for free under the Creative Commons license.</br>
Link below: </br>
https://html5up.net/massively</br>
