TAG = latest

build-image:
	docker build -t nameko/nameko-example-gopay:$(TAG) ./gopay

docker-tag:
	docker tag nameko/nameko-example-gopay:$(TAG) \
	nameko/nameko-example-gopay:$(TAG)

push-image:
	docker push nameko/nameko-example-gopay:$(TAG)