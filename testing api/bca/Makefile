TAG = latest

build-image:
	docker build -t nameko/nameko-example-bca:$(TAG) ./bca

docker-tag:
	docker tag nameko/nameko-example-bca:$(TAG) \
	nameko/nameko-example-bca:$(TAG)

push-image:
	docker push nameko/nameko-example-bca:$(TAG)