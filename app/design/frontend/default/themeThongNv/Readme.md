
# Templates & Block

## Name: Nguyen Van Thong
### 1. Create a new theme
##### Create an folder in app/frontend/default .Then , Insert folder themeThongNv
* Add 3 files: composer.json, registration.php, theme.xml in folder themeThongNv
* Edit path to your theme in registration.php and path in composer.json
### 2. Apply theme
##### When login success admin ,go to admin panel
* At row Default Store View. Click Edit in column Action
* At dropdown Applied Theme. Choose them: themeThongNv

Click Save Configuration
### 3.Change logo
* At view Admin ,go to Content > Design -> Configuration > At row Default Store View. Click Edit in column Action.
* Edit Theme .Then, click *Header* in Other Settings > Choose Logo and Upload with size option
* Click Save Configuration
### 4. Create some containers for Home Page
* Come pages *Admin panel*
* Choose Content > Pages
* At row Home Page. Click Select in column Action and choose Edit
* Expand Content
* Delete text in Content Heading textbox

#### 4.1 Insert block banner with images
* Come in pages admin .Then goto Content->Pages.After will select option  title with values='Home Page'
* Click edit and choose Content.Then, import 2 images  to the content and uploads it.
* Click button save
#### 4.2 Insert Catalog List with widget products
* Before insert it.I add content='New Products' between 2 images.After, I insert widget with condition widget type is option catalog products list
* Click button insert Widget
#### 4.3 Finally, Refresh cache and review new themes 




