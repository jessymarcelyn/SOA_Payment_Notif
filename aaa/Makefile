TAG = latest

build-image:
	docker build -t nameko/nameko-example-kartuKredit:$(TAG) ./kartuKredit

docker-tag:
	docker tag nameko/nameko-example-kartuKredit:$(TAG) \
	nameko/nameko-example-kartuKredit:$(TAG)

push-image:
	docker push nameko/nameko-example-kartuKredit:$(TAG)