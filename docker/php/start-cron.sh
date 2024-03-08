#!/bin/bash
# Fix permissions if needed
touch /var/run/crond.pid
chown root:root /var/run/crond.pid
chmod 644 /var/run/crond.pid

# Add the cron job
echo "* * * * * cd /var/www && /usr/local/bin/php artisan schedule:run >> /dev/null 2>&1" | crontab -

# Start cron in the foreground
exec cron -f
