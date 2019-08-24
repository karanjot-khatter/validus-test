# validus-test
capital call calculation - a system built for fund managers to determine which investor(s) they need to call in 
order to invest in a new investment.

# Instructions
- Go to 'http://validus.test'
- On the first directed page; start by clicking the big blue box in the middle, this will direct you to the dashboard.
- On the dashboard, you are able to view all confirmed investment funds.
- Also on the dashboard you are able to click 'new call' link on the top right, which is in gray.
- The dashboard link is disabled, unless you are on the new call page. 
- On the new call page you are given a form, with a submit button, you can able to enter a value into this form.
- Once the button has been submitted, you should see calculations for total notice and total undrawn notice.
- You should then be prompted with a 'confirm' button, when if clicked it returns to dashboard page.
- When you also click the confirm button, a new row is added.. however fund data is not showing.
- Fund data is not showing as this hasn't been created yet.

# Implementation
- Tables created and values inserted in mySQL database - called 'validus'. (Navicat)
- Chosen backend language (for logic) was done in PHP 5.6.32. 
- I used HTML5, CSS3, JQUERY for frontend components e.g. hiding classes / design work etc...
- Implemented apache using MAMP PRO, host name - 'validus.test' to run on local server enviroment.
- Implemented github to store working version of code. (using command line)
- Implemented provided files in document root : 'cd $HOME/dev/validus-test'
- Implemented XDEBUGGER in PHP storm to ensure functions were working as expected.
- Implemented 'index.php' to run the first page.
- Connection and Queries between mySQL database and PHP was done via the 'includes/database.php' file
- Implementation of the header of every page was done in 'includes/header.html'

# References
- https://jquery.com/download/ - jquery in code
- https://www.w3schools.com/php/php_mysql_select.asp -connect php to sql
- https://www.w3schools.com/css/css_table.asp - table creation
- https://www.php.net/manual/en/function.date.php - date format
- https://www.php.net/manual/en/function.number-format.php - number format
- https://stackoverflow.com/questions/5733808/submit-form-and-stay-on-same-page - submit form and stay on same page (JQUERY)