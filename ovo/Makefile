TAG = latest

build-image:
	docker build -t nameko/nameko-example-ovo:$(TAG) ./ovo

docker-tag:
	docker tag nameko/nameko-example-ovo:$(TAG) \
	nameko/nameko-example-ovo:$(TAG)

push-image:
	docker push nameko/nameko-example-ovo:$(TAG)