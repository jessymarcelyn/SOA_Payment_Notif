import json

from nameko.rpc import RpcProxy
from nameko.web.handlers import http


class GatewayService:
    name = 'gateway'

    insurance_rpc = RpcProxy('insurance_service')

    # KATEGORI ASURANSI

    @http('GET', '/insurance')
    def get_all_category(self, request):
        categories = self.insurance_rpc.get_all_category()
        return categories['code'],json.dumps(categories['data'])

    @http('GET', '/insurance/<kategori>')
    def get_category_by_name(self, request, kategori):
        category = self.insurance_rpc.get_category_by_name(kategori)
        return category['code'],json.dumps(category['data'])

    @http('POST', '/insurance')
    def add_category(self, request):
        data = json.loads(request.get_data(as_text=True))
        nama_kategori = data.get('nama_kategori')
        category = self.insurance_rpc.add_category(nama_kategori)   
        return category['code'],json.dumps(category['data'])

    @http('PUT', '/insurance/<int:id_kategori>')
    def edit_category(self, request, id_kategori):
        data = json.loads(request.get_data(as_text=True))
        nama_kategori = data.get('nama_kategori')
        category = self.insurance_rpc.edit_category(id_kategori, nama_kategori)
        return category['code'],json.dumps(category['data'])


    # TIPE ASURANSI

    @http('GET', '/insurance/all')
    def get_all_insurance(self, request):
        insurances = self.insurance_rpc.get_all_insurance()
        return insurances['code'],json.dumps(insurances['data'])

    @http('GET', '/insurance/<kategori>/all')
    def get_insurance_by_category(self, request, kategori):
        insurances = self.insurance_rpc.get_insurance_by_category(kategori)
        return insurances['code'],json.dumps(insurances['data'])

    @http('GET', '/insurance/<kategori>/<int:id_tipe_asuransi>')
    def get_insurance_by_category_and_id(self, request, kategori, id_tipe_asuransi):
        insurance = self.insurance_rpc.get_insurance_by_category_and_id(kategori, id_tipe_asuransi)
        return insurance['code'],json.dumps(insurance['data'])

    @http('POST', '/insurance/<kategori>')
    def add_insurance(self, request, kategori):
        data = json.loads(request.get_data(as_text=True))
        tujuan    = data.get('tujuan')
        empat     = data.get('empat')
        enam      = data.get('enam')
        delapan   = data.get('delapan')
        sepuluh   = data.get('sepuluh')
        limabelas = data.get('limabelas')
        duapuluh  = data.get('duapuluh')
        dualima   = data.get('dualima')
        tigapuluh = data.get('tigapuluh')
        setahun   = data.get('setahun')
        insurance = self.insurance_rpc.add_insurance(kategori, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun)   
        return insurance['code'],json.dumps(insurance['data'])

    @http('PUT', '/insurance/<kategori>/<int:id_tipe_asuransi>')
    def edit_insurance(self, request, kategori, id_tipe_asuransi):
        data = json.loads(request.get_data(as_text=True))
        tujuan    = data.get('tujuan')
        empat     = data.get('empat')
        enam      = data.get('enam')
        delapan   = data.get('delapan')
        sepuluh   = data.get('sepuluh')
        limabelas = data.get('limabelas')
        duapuluh  = data.get('duapuluh')
        dualima   = data.get('dualima')
        tigapuluh = data.get('tigapuluh')
        setahun   = data.get('setahun')
        insurance = self.insurance_rpc.edit_insurance(kategori, id_tipe_asuransi, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun)
        return insurance['code'],json.dumps(insurance['data'])


    # Pembelian Asuransi
    
    @http('GET', '/insurance/purchase/<int:id_user>/all')
    def get_all_purchase_by_user(self, request, id_user):
        purchase = self.insurance_rpc.get_all_purchase_by_user(id_user)
        return purchase['code'],json.dumps(purchase['data'])

    @http('GET', '/insurance/purchase/<int:id_user>/<int:id_pembelian>')
    def get_purchase_by_id(self, request, id_user, id_pembelian):
        purchase = self.insurance_rpc.get_purchase_by_id(id_user, id_pembelian)
        return purchase['code'],json.dumps(purchase['data'])
    
    @http('POST', '/insurance/price')
    def get_price(self, request):
        data = json.loads(request.get_data(as_text=True))
        purchase = self.insurance_rpc.get_price(data['kategori'], data['tujuan'], data['adult'], data['child'], data['start_date'], data['end_date'])
        return purchase['code'],json.dumps(purchase['data'])

    @http('POST', '/insurance/purchase/add')
    def add_purchase(self, request):
        data = json.loads(request.get_data(as_text=True))
        purchase = self.insurance_rpc.add_purchase(data['id_user'], data['id_booking'], data['kategori'], data['tujuan'], data['adult'], data['child'], data['start_date'], data['end_date'])
        return purchase['code'],json.dumps(purchase['data'])

    # Pembayaran Asuransi

    @http('GET', '/insurance/payment/<int:id_user>/all')
    def get_all_payment_by_user(self, request, id_user):
        payment = self.insurance_rpc.get_all_payment_by_user(id_user)
        return payment['code'],json.dumps(payment['data'])
    
    @http('GET', '/insurance/payment/<int:id_user>/<int:id_pembayaran>')
    def get_payment_by_id(self, request, id_user, id_pembayaran):
        payment = self.insurance_rpc.get_payment_by_id(id_user, id_pembayaran)
        return payment['code'],json.dumps(payment['data'])
    
    @http('POST', '/insurance/payment/add')
    def add_payment(self, request):
        data = json.loads(request.get_data(as_text=True))
        payment = self.insurance_rpc.add_payment(data['id_user'], data['id_pembelian'], data['jenis_pembayaran'], data['nomor'])
        return payment['code'],json.dumps(payment['data'])