# LikesTV
Version: v0.1 alpha  
Created by David Chao  
As part of Fullsail University's Web Final Project  
Copyright 2013

## Status of Defects Found During Alpha
Defect 1 - Severity 2 - When multiple checkboxes are checked, the remove from filter button only removes one of the checked boxes.  
Status: fixed.

Defect 2 - Severity 2 - When filter button is clicked on several items on the channels page, only the first clicked game is filtered multiple times.  
Status: under investigation.

## What is LikesTV?

LikesTV is a website that lets you view Twitch TV live streams based on video games you've liked on Facebook. You'll also be able to filter out any specific games you don't wish to see in your channels list. (A more robust description to come later.)

LikesTV uses the FuelPHP framework for PHP coding and Twitter Bootstrap for styling. It also uses the Facebook SDK and Twitch TV "Kraken" API.

LikesTV is currently in the alpha phase as of 2013/08/15 - it is not yet available to the public and only available for local testing. **By downloading this repository, you agree to not disclose the features and likeness of LikesTV. You also agree to only use the test ID provided below for testing this app only.**

## Installation Instructions

1. Download the repository from GitHub tagged as *v0.1a* and name it likestv.zip

2. Extract it to your *htdocs* folder if you use MAMP. If you use other local server software, you can extract it there as well. If you don't have MAMP, you can download a free version here: [MAMP download](http://www.mamp.info/en/downloads/)

3. You will need the *core* folder for FuelPHP since it is NOT included in the repository (This is so Fuel can be updated without impacting the application). This can be downloaded for free here: [FuelPHP](http://fuelphp.com/). This needs to be extracted into the *likestv* folder. 

4. You will also need to use the sql dump found in the following folder: likestv/public/assets. Create a database named ltvprofile, copy and paste the commands from the sql dump file, and run them in your SQL database software. If you don't have the software to do this, you can download Sequel Pro for free here: [Sequel Pro](http://www.sequelpro.com/download)

**NOTE**: If you use your own database software and/or use different connection info to connect to your server software's database, you will need update that connection info in the likestv/fuel/app/config/db.php file.

ALL custom coding is done in the likestv/fuel/app folder, specifically within the classes, config, and views folders. Custom assets (images, css, etc.) are within the likestv/public/assets folder. All other files are a part of the FuelPHP framework and not altered or may be removed in future releases.

## Alpha Testing Information
Fellow web developers are encouraged to download and test locally.

### What We're Looking For From Alpha Testing
- Any instance of the website failing to load properly e.g. Error 404s, uncaught exceptions, permanent hanging, improper redirects and so forth. 
- Any instance where the filter does not work properly e.g. Game not removed, too many games removed.  

### Features That Are Available
1. User login - done at home page - links to external site and redirects back
2. User Logout - done at home page
3. View Channels - done at channels page
4. View Streams - done at channels page - links to external site
4. Filter Channels - done at channels page
5. Filter Channels - done at preferences page
6. Remove games from filter - done at preferences page

**NOTE**: This website is registered at Facebook in SANDBOX mode, meaning that it is not available to the public and only available to developers registered on Facebook. Because of this, if you want to test the website with your personal Facebook account, you will need to register as a developer first before you can log in. Please do not report login issues of this nature as a bug. Because of this, we recommend using the following test ID:  
Email: dwcebtesting@gmail.com  
Password: dcwebtest

Reminder: This test ID is for testing this website only. Please do not alter the Facebook profile in any way except to add or remove games from the likes section.

### Features Not Yet Implemented
1. About Us page - no content yet
2. Testimonials page - no content yet
3. Contact Us page - no content yet

### Known Issues - Do Not Need to be Reported
1. Styling - any positioning or coloring issues. These will not be final until the beta release.
2. Performance issues - currently the channels page will take approximately 2 seconds per "liked" game to load. Speeding up the load times will be a part of performance enhancing that will carry on indefinitely as the site grows even after launch.

**NOTE**: If you are testing with many "liked" games, load times will become unacceptable. Currently, search iterations are limited to 15. If you would like to adjust this value, it is found at likestv/fuel/app/classes/controller/channels.php line 92. 

Any issues found or suggestions should be emailed directly to davidchao@fullsail.edu for the fastest response time. Any bug reports should include steps to recreate your issue, expected result, and a screenshot. Screencasts would be optimal, but please refrain from hosting them online due to the above nondisclosure agreement. If you do host a video online, please make sure it is **unlisted**.

On behalf of the developers of LikesTV, thank you very much! Your feedback is greatly appreciated!



