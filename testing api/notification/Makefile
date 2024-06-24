TAG = latest

build-image:
	docker build -t nameko/nameko-example-notification:$(TAG) ./notification

docker-tag:
	docker tag nameko/nameko-example-notification:$(TAG) \
	nameko/nameko-example-notification:$(TAG)

push-image:
	docker push nameko/nameko-example-notification:$(TAG)