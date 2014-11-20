ssh -i AMItemplateserver.pem ubuntu@54.179.160.196 -t '
	cd /var/www && \
	svn up && \
	rm -rf /var/www/data/cache/*
'
