TAG = latest

build-image:
	docker build -t nameko/nameko-example-kartukredit:$(TAG) ./kartukredit

docker-tag:
	docker tag nameko/nameko-example-kartukredit:$(TAG) \
	nameko/nameko-example-kartukredit:$(TAG)

push-image:
	docker push nameko/nameko-example-kartukredit:$(TAG)