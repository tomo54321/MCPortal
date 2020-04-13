# MCPortal
Highly customizeable Minecraft server portal website written in PHP.

## Requirements
 - Recommended you are running at least PHP 7.2
 - Ensure you have write permissions to ```assets/cache```

## Installation
Installing takes no time at all. Follow the steps below:
 - Download the repo as a ZIP
 - Upload all the contents to your web server.
 - You can remove the **README.md** file if you wish.
 - View your portal on your domain
 
## Configuration ```app.php```
Almost all of the configuration is done in the ```app.php``` file. For the server status text this can be changed in the ```lang.php``` file and for changing particles this can be found under ```particles.json``` and ```particles.php```.
```app.php```, ```lang.php``` and ```particles.php``` are all found under the ```/config``` folder. ```particles.json``` is found in the ```assets``` folder.

### ```config/app.php```

#### ```title```
This is your server title, it's the title of the page and also replaces the logo image if one is not provided. This should be a string (text)

#### ```logo```
This is the path to the logo image, this can either be a remote image or on the server eg. ```assets/logo.png``` or ```https://example.com/image.jpg``` If you don't have a logo set the value to ```null``` and your server name will be placed in its position.

#### ```logoanimated```
This gives the logo (image or text) the "breath / pulse" effect. This value is expected to be a boolean.

#### ```bg```
This is the background image path this can either be a remote image or on the server eg. ```assets/logo.png``` or ```https://example.com/image.jpg``` If this value is null a white background will be displayed so it's recommended to have a background image.

#### ```seo```
This option has a couple sub settings:
 - ```tags``` this is the common SEO tags, this should be a few words seperated by a comma related to your server
 - ```description``` this should be a brief description on your server
 
#### ```status```
The server status, this option also has a few sub settings:
- ```enabled``` Show the server status?
- ```api_url``` Where should we get the information from? Use ```{IP}``` to indicate where the servers ip should go
- ```cache``` This is highly recommended, we'll cache the result for **5** minutes before pinging again
- ```ip``` Your servers IP (SRV records do work too!)
- ```port``` Your servers port
- ```click_to_copy``` Allow users to click the status to copy the IP?
- ```background_color``` A HEX or RGBA value for the background color

#### ```icons```
This is where all the icons you want to display will be. This should be either ```false``` to hide then or an ```array``` of logos each array should have the following keys:
- ```title``` Title of the icon
- ```image``` Icon image path, remote or local as with the background and logo
- ```link``` Where to go when you click the icon
- ```new_tab``` Open the link in a new tab?
- ```sub_text``` Have a message above the icons title.

#### ```GoogleAnalytics```
Track who comes to your portal with Google Analytics. This should your analytics id or ```null``` to disable.



### Language ```lang.php```
#### ```status```
The server status, this option has a couple sub settings:
- ```online``` What the message should be when the server is online
- ```offline``` What the message should be when the server is offline
You can use ```{IP}``` to show the servers IP in either offline or online messages.
You can also use ```{PlayerCount}``` in online messages only to show the current player count.


### Particles ```particles.php```

#### ```enabled```
Should particles be displayed on your webpage?

#### ```json```
A **local** file path of where your ```particles.json``` can be found.
This can be a remote file path however the correct CORS headers will need to be set.


### Display Particle Settings ```assets/particles.json```
This file can be edited in your text editor of choice or you can use https://vincentgarreau.com/particles.js/ to generate a JSON config file. Make sure you upload it to the path defined in your ```json``` setting which is found in ```config/particles.php``` 



Please check out the license file and thanks for checking this out! :)
