# LikesTV
Version: v0.1 beta  
Created by David Chao  
As part of Fullsail University's Web Final Project  
Copyright 2013

## What is LikesTV?

LikesTV is a website that lets you view Twitch TV live streams based on video games you've liked on Facebook. You'll also be able to filter out any specific games you don't wish to see in your channels list. (A more robust description to come later.)

LikesTV uses the FuelPHP framework for PHP coding and Twitter Bootstrap for styling. It also uses the Facebook SDK and Twitch TV "Kraken" API.

LikesTV is currently in the beta phase as of 2013/08/22 - it is not yet available to the public and only available for local testing. **By downloading this repository, you agree to not disclose the features and likeness of LikesTV. You also agree to only use the test ID provided below for testing this app and editing the Games section in the Facebook profile page ONLY.**

## Installation Instructions

1. Download the repository from GitHub tagged as *v0.1b* and name it likestv.zip

2. Extract it to your *htdocs* folder if you use MAMP. If you use other local server software, you can extract it there as well. If you don't have MAMP, you can download a free version here: [MAMP download](http://www.mamp.info/en/downloads/)

3. You will need the *core* AND *packages* folders for FuelPHP since it is NOT included in the repository (This is so Fuel can be updated without impacting the application). These can be downloaded for free here: [FuelPHP](http://fuelphp.com/). These need to be extracted into the *likestv/fuel* folder. 

4. You will also need to use the sql dump found in the following folder: likestv/public/assets. Create a database named ltvprofile, copy and paste the commands from the sql dump file, and run them in your SQL database software. If you don't have the software to do this, you can download Sequel Pro for free here: [Sequel Pro](http://www.sequelpro.com/download)

**NOTE**: If you use your own database software and/or use different connection info to connect to your server software's database, you will need update that connection info in the likestv/fuel/app/config/db.php file.

ALL custom coding is done in the likestv/fuel/app folder, specifically within the classes, config, and views folders. Custom assets (images, css, etc.) are within the likestv/public/assets folder. All other files are a part of the FuelPHP framework and not altered or may be removed in future releases.

## Beta Testing Information
Public beta testing will be available once the site is hosted. Once the site is hosted and functional, the URL will be posted here for public testing. Until then, fellow web developers are encouraged to download and test locally.

### What We're Looking For From Beta Testing
- Any instance of the website failing to load properly e.g. Error 404s, uncaught exceptions, permanent hanging, improper redirects and so forth. 
- Any instance where the filter does not work properly e.g. Game not removed, too many games removed. 
- Feedback from the testing survey which can be found here: [UserTest](https://dl.dropboxusercontent.com/u/64600278/LikesTV_UserTest.doc)

**NOTE**: This website is registered at Facebook in SANDBOX mode, meaning that it is not available to the public and only available to developers registered on Facebook. Because of this, if you want to test the website with your personal Facebook account, you will need to register as a developer first before you can log in. Please do not report login issues of this nature as a bug. Because of this, we recommend using the following test ID:  
Email: dwcebtesting@gmail.com  
Password: dcwebtest

Reminder: This test ID is for testing this website only. Please do not alter the Facebook profile in any way except to add or remove games from the likes section.

### Known Issues - Do Not Need to be Reported
1. Performance issues - currently the channels page will take approximately 2 seconds per "liked" game to load. Speeding up the load times will be a part of performance enhancing that will carry on indefinitely as the site grows even after launch.

**NOTE**: If you are testing with many "liked" games, load times will become unacceptable. Currently, search iterations are limited to 15. If you would like to adjust this value, it is found at likestv/fuel/app/classes/controller/channels.php line 92. 

### Features That May Go Into a Future Version Post-Launch - Do not need to be reported
- A new splash image for the smallest viewport. Currently, the image is only hidden.
- Carousel dynamically adjusting columns on viewport width adjustments.
- More information in the Abous Us page.
- More feedback in the Testimonials page.
- Home page content changing when logged in.

Any issues found or suggestions should be emailed directly to davidchao@fullsail.edu for the fastest response time. Any bug reports should include steps to recreate your issue, expected result, and a screenshot. Screencasts would be optimal, but please refrain from hosting them online due to the above nondisclosure agreement. If you do host a video online, please make sure it is **unlisted**.

On behalf of the developers of LikesTV, thank you very much! Your feedback is greatly appreciated!

## Status of Defects Found During Alpha
Defect 1 - Severity 2 - When multiple checkboxes are checked, the remove from filter button only removes one of the checked boxes.  
Status: fixed.  
Comments: Flaw in logic. Reload was occurring before database actions were complete.

Defect 2 - Severity 2 - When filter button is clicked on several items on the channels page, only the first clicked game is filtered multiple times.  
Status: fixed.  
Comments: Browsers cache posted variables. Filter actions are now done on another page that redirects back to the channels page so that posted variables are updated correctly.

