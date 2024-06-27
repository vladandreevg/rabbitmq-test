# Примеры работы с RabbitMQ

Ссылки по теме:
- [Tutorial](https://www.rabbitmq.com/tutorials)
- [PHP. Разработка первого приложения с использованием RabbitMQ](https://pacificsky.ru/brokery-ocheredej/190-php-razrabotka-pervogo-prilozhenija-s-ispolzovaniem-rabbitmq.html)
- [RabbitMQ для начинающих](http://ajaxblog.ru/php/rabbitmq-tutorial/)
- [Ныряем в кроличью нору](https://php.zone/post/rabbitmq)

# Пользователь

- host: localhost
- port: 5672
- guest:guest

# Панель управления

- http://localhost:15672
- login: guest
- password: guest

# Демонизация скрипта

- [Running a PHP Script as Systemd Service in Linux](https://tecadmin.net/running-a-php-script-as-systemd-service-in-linux/)

## Create the Systemd Unit File

Next, create the systemd unit file for the PHP script. This file will define the service’s configuration, such as its name, description, and how it should be started and stopped. Create a file called “myscript.service” in the “/etc/systemd/system” directory:

```shell
sudo nano /etc/systemd/system/myscript.service
```

Add the following content to the file:

```ini
[Unit]
Description=My PHP Script

[Service]
Type=simple
ExecStart=/usr/bin/php /var/www/html/myscript.php
Restart=always

[Install]
WantedBy=multi-user.target
```

This unit file tells systemd to create a service called myscript that runs the myscript.php script using the PHP interpreter. It also specifies that the service should be restarted automatically if it fails for any reason.

## Reload the Systemd Configuration

Once you’ve created the unit file, you need to reload the systemd configuration to make it aware of the new service. You can do this by running the following command:

```shell
sudo systemctl daemon-reload
```

## Start and Enable the Service

Finally, you can start the “myscript” service by running the following command:

```shell
sudo systemctl start myscript
```

You can also enable the service to start automatically at boot time by running the following command:

```shell
sudo systemctl enable myscript
```

To check the status of the service, you can run the following command:

```shell
sudo systemctl status myscript
```
