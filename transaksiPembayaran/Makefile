TAG = latest

build-image:
	docker build -t nameko/nameko-example-transaksiPembayaran:$(TAG) ./transaksiPembayaran

docker-tag:
	docker tag nameko/nameko-example-transaksiPembayaran:$(TAG) \
	nameko/nameko-example-transaksiPembayaran:$(TAG)

push-image:
	docker push nameko/nameko-example-transaksiPembayaran:$(TAG)