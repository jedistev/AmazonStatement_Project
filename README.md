# AmazonStatement Project
PHP mySQL project for Amazon

This is for automation calacuate for Amazon Settlement Reports

You can find it more on the Amazon


 ==============================
 
 Settlement Reports

Payments (settlement) reports provide a detailed breakdown of your account activity for a given settlement period. By reviewing a Payments report, you can understand your account activity.

When you first register, Amazon settles your account approximately 14 days later. After the first disbursement, the process repeats regularly. You can view your next settlement date on the Payments page on the Reports tab.

https://www.amazon.com/gp/help/customer/display.html?nodeId=200253140

=====================


To run on the localhost.
1) Need a database called amazon as you can find folder 'create-database' and create it on your Database
CREATE DATABASE  IF NOT EXISTS `amazon`
It's should be able to run on localhost like XAMP or any LAMP/WAMP/MAMP.

2) Go to Amazon Seller Marketplace and Download Flat File V2 and open in OpenOffice, and remove the Header in the Speadsheet, and Save it on the TEXT CSV, and upload it on phpmyadmin.

If this CSV are Amazon UK, send to 'settlement', if Germany , send it to 'settlementde', if italy, send it to 'settlementit'

3) you should able to see all the settlement report displayed on the localhost with all calucation correct.

If any question or issue, please email me stevenpetersmi@gmail.com









