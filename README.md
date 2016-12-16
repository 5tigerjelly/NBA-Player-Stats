# NBA-Player-Stats

Instructor: Chun-Kai Wang

 

The Product

We love basketball but there’s no easy way to search NBA player stats! So let’s make our own! We found http://stats.nba.com/players.html (Links to an external site.) but actually, try typing in “lebron” and press “Run It”, yuck! It doesn’t work. We can totally make a better one in a few days.

 

The Data

Fortunately, we have some data at our disposal (thanks to SPXStats.com), here’s our copy http://uwinfo344.chunkaiw.com/files/2015-2016.nba.stats.csv (Links to an external site.)

 

The Infrastructure

We’re going to have a lot of people use this website so it needs to scale from day one. We’ll build this website on Amazon Web Services using EC2 and RDS. Here are tips on how to setup AWS.

http://uwinfo344.chunkaiw.com/files/How%20to%20setup%20AWS.docx (Links to an external site.)

http://uwinfo344.chunkaiw.com/files/awssetup.txt (Links to an external site.)

 

The User Interface

We’re going for a minimalistic user interface so let’s start off just with a logo, text box (to enter the player’s name) and a search button! Similar to how Google works, I should get a results page with NBA players!

 

The User Experience

To create a great user experience, you’ll need to be extra careful in handling player names. Users should be able to not only enter full names but also first or last names to find their players. Casing should also be gracefully handled (i.e. any casing works). Think about other cases that should work to ensure we have a great user experience.

 

Requirements

Let’s make sure we have the following:

[50pts] Website works – searching for player name works!
[20pts] Data is hosted on AWS RDS
[20pts] Website written with PHP & MySQL – PHP best practices & OOP!
[10pts] Website runs on AWS EC2
 

Deliverables

Please submit the following as a single zip file:

URL to your AWS instance hosting this website (readme.txt)
URL to your GitHub repro with PHP source code (share your GitHub with me & TA)
All PHP source code
Screenshot of your AWS dashboard with EC2 running (aws-ec2.jpg)
Write up explaining how you implemented everything. Make sure to address each of the requirements, writeup.txt (~500 words)
Extra credits – short paragraph in extracredits.txt for each extra credit (how to see/trigger/evaluate/run your extra credit feature and how you implemented it)
