TAG = latest

build-image:
	docker build -t nameko/nameko-example-transaksipembayaran:$(TAG) ./transaksipembayaran

docker-tag:
	docker tag nameko/nameko-example-transaksipembayaran:$(TAG) \
	nameko/nameko-example-transaksipembayaran:$(TAG)

push-image:
	docker push nameko/nameko-example-transaksipembayaran:$(TAG)