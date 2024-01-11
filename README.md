#COMMANDS
#Steps to Install Nginx on Amazon Linux 2023 Instance#
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
----------------------------------------------------------------------------------------------------
#How to Install PHP 8.1 on Amazon Linux 2023#
sudo dnf update
sudo dnf search php8.1
sudo dnf install php8.1 -y
php -v
sudo systemctl start php-fpm
sudo systemctl status php-fpm
sudo systemctl enable php-fpm
----------------------------------------------------------------------------------------------------
#How to Install MariaDB on Amazon Linux 2023#
sudo dnf update
dnf search mariadb
sudo dnf install mariadb105-server
mariadb -V
sudo systemctl start mariadb //Starts MariaDB service
sudo systemctl enable mariadb //Enabled MariaDB service to restart on bot
sudo systemctl status mariadb //Check MariaDB service running status
-----------------------------------------------------------------------------------------------------
sudo systemctl restart nginx.service
sudo systemctl restart php-fpm.service
sudo systemctl restart mariadb.service
------------------------------------------------------------------------------------------------------
sudo mysql_secure_installation -p
mysql -u root -p 
