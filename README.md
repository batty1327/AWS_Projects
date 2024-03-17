
# Cloud Based Image Repository

Build a robust, secure, and scalable cloud-based image repository project using Amazon Web Services (AWS).




## Tech Stack

**AWS:** EC2, S3, RDS




## Installation

Launch an AWS EC2 Instance with Amazon linux 2023.

LEMP Stack is used for this project. (LEMP stands for Linux, Nginx, MySQL, PHP.)
1) Install Nginx using these commands.
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
4) Restart all the services.
```bash
sudo systemctl restart nginx.service
sudo systemctl restart php-fpm.service
sudo systemctl restart mariadb.service
```
## Feedback

If you have any feedback, please reach out to me at sumitbattul243@gmail.com
