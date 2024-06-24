TAG = latest

build-image:
	docker build -t nameko/nameko-example-insurance:$(TAG) ./insurance

docker-tag:
	docker tag nameko/nameko-example-insurance:$(TAG) \
	nameko/nameko-example-insurance:$(TAG)

push-image:
	docker push nameko/nameko-example-insurance:$(TAG)
