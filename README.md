
# Cloud Based Image Repository

Build a robust, secure, and scalable cloud-based image repository project using Amazon Web Services (AWS).




## Tech Stack

**AWS** 

EC2 instance (t2.micro)

S3 bucket

RDS (db.t3.micro)




## Installation

Launch an AWS EC2 Instance with Amazon linux 2023.

LEMP Stack is used for this project. (LEMP stands for Linux, Nginx, MySQL, PHP.)
1) Install Nginx (web server) using these commands.
```bash
sudo dnf update //To Install Latest Update
sudo dnf list | grep nginx
sudo dnf install -y nginx // Install Nginx
sudo systemctl start nginx.service //Start Nginx Server
sudo systemctl status nginx.service // Check Server Status
sudo systemctl enable nginx.service // Enable Auto Server Start on restart
                  OR
sudo yum update
sudo yum install -y nginx
sudo systemctl start nginx.service
sudo systemctl enable nginx.service
nginx -v
sudo systemctl status nginx.service
```
2) Install MySQl using these commands.
```bash
dnf search mariadb
sudo dnf install mariadb105-server
mariadb -V
sudo systemctl start mariadb //Starts MariaDB service
sudo systemctl enable mariadb //Enabled MariaDB service to restart on bot
sudo systemctl status mariadb //Check MariaDB service running status
```
3) Install PHP using these commands.
```bash
sudo dnf search php8.1
sudo dnf install php8.1 -y
php -v
sudo systemctl start php-fpm
sudo systemctl status php-fpm
sudo systemctl enable php-fpm
```
4) Install php-mysqlnd (extension to connect EC2 with RDS)

```bash
sudo dnf install php-mysqlnd -y
```
5) Restart all the services.
```bash
sudo systemctl restart nginx.service
sudo systemctl restart php-fpm.service
sudo systemctl restart mariadb.service
```
## Deployment

To deploy this project install LEMP stack on Amazon Linux 2023.

After restarting all the services, go to nginx html directory


```bash
cd /usr/share/nginx/html
```

Create index.php and submit.php
```bash
vim index.php
vim submit.php
```

Copy the content from files and paste in your files. Do change the following accordingly
```bash
server name = "RDS Endpoint"
user name = "Admin"
password = "Admin1234"
dbname = "RDS Name"
```

Now, login to your RDS database in EC2 
```bash
sudo mysql -h "RDS Endpoint" -p 3306 -u admin -p
```

After login, create a database and table.
```bash
create database "database name";
use database "database name";
create table users (id int not null auto_increament, email varchar (200), password varchar (200));
exit
```

Now copy your public IP and paste it in browser

Enter details and data will be saved in RDS database.

To check login to RDS database and use command "select * from users;"
to retrieve data from table.

Create a directory named "uploads" in the HTML folder.
```bash
sudo mkdir uploads
```

Assign write permissions to the "uploads" directory.
```bash
sudo chmod -R 777 uploads
```

Create a bucket in Amazon S3 with ACL-enabled settings. Remove any block-all settings on the bucket (i.e., make it public-read).

Create a file named "fileadd.html" in the HTML folder.

Add the HTML code to the "fileadd.html" file:
<!DOCTYPE html>

Run the following commands step by step in the HTML folder:
```bash
sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php
sudo php -r "unlink('composer-setup.php');"
sudo php composer.phar require aws/aws-sdk-php
   
# Note: If you encounter any errors, you can move composer.phar to /usr/local/bin/composer with this command.
```

Create a file named "ups3.php" in the HTML folder.

Add the PHP code to the "ups3.php" file:

Replace all *** values with your values.
Get Access Key and secret key from your account's Security Credentials.
Get bucket name from S3. (Make sure bucket is created with ACL-enabled Settings)

Now open below URL in browser
http://your IP address/fileadd.html
now click on "browse" button and select any one image and click on "upload"

Now it must show image uploaded successfully and also need to show you S3 URL for your image

Go to uploads folder in html folder and check that image also uploaded here

## Feedback

If you have any feedback, please reach out to me at sumitbattul243@gmail.com

