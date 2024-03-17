
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

Now, create a file upload.php
```bash
vim upload.php
```

Copy and paste the content in upload.php

Also create a directory "uploads" and change its permission 
```bash
sudo chmod -r +777 uploads
```

Copy your public IP and paste it in your browser
```bash
http://publicip/uploads.php
```

Upload image and check the uploads diectory.


## Feedback

If you have any feedback, please reach out to me at sumitbattul243@gmail.com

