TAG = latest

build-image:
	docker build -t nameko/nameko-example-mandiri:$(TAG) ./mandiri

docker-tag:
	docker tag nameko/nameko-example-mandiri:$(TAG) \
	nameko/nameko-example-mandiri:$(TAG)

push-image:
	docker push nameko/nameko-example-mandiri:$(TAG)