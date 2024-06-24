from nameko.rpc import rpc

from insurance import dependencies

class InsuranceService:

    name = 'insurance_service'

    database = dependencies.Database()


    # KATEGORI ASURANSI

    @rpc
    def get_all_category(self):
        categories = self.database.get_all_category()
        return {
            'code': 200,
            'data': categories
        }

    @rpc
    def get_category_by_name(self, nama):
        category = self.database.get_category_by_name(nama)
        if category is None:
            return {
                    'code': 404,
                    'data': 'Category ID Invalid.'
                    }
        return {
            'code': 200,
            'data': category
        }
    

    @rpc
    def add_category(self, nama_kategori):        
        category = self.database.add_category(nama_kategori)
        return {
            'code': 200,
            'data': category
        }

    @rpc
    def edit_category(self, id_kategori, nama_kategori):
        input_category = self.database.get_category_by_id(id_kategori)
        if input_category is None:
            return {
                'code': 404,
                "data": "Category ID Invalid."
            }
    
        category = self.database.edit_category(id_kategori, nama_kategori)
        return {
            'code': 200,
            'data': category
        }


    # TIPE ASURANSI

    @rpc
    def get_all_insurance(self):
        insurances = self.database.get_all_insurance()
        return {
            'code': 200,
            'data': insurances
        }

    @rpc
    def get_insurance_by_category(self, kategori):
        category = self.database.get_category_by_name(kategori)
        if category:
            insurances = self.database.get_insurance_by_category(kategori)
            return {
                'code': 200,
                'data': insurances
            }

        return {
            'code': 400,
            'data': 'Category ID Invalid.'
        }

    @rpc
    def get_insurance_by_category_and_id(self, kategori, id_tipe_asuransi):
        insurance = self.database.get_insurance_by_category_and_id(kategori, id_tipe_asuransi)
        if insurance is None:
            return {
                    'code': 404,
                    'data': 'Insurance Type ID Invalid.'
                    }
        return {
            'code': 200,
            'data': insurance
        }

    @rpc
    def add_insurance(self, kategori, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun):        
        insurance = self.database.add_insurance(kategori, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun)
        return {
            'code': 200,
            'data': insurance
        }

    @rpc
    def edit_insurance(self, kategori, id_tipe_asuransi, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun):
        tipe_asuransi = self.database.get_insurance_by_category_and_id(kategori, id_tipe_asuransi)
        if tipe_asuransi is None:
            return {
                'code': 404,
                "data": "Insurance Type ID Invalid."
            }
         
        insurance = self.database.edit_insurance(kategori, id_tipe_asuransi, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun)
        return {
            'code': 200,
            'data': insurance
        }

    # Pembelian Asuransi

    @rpc
    def get_all_purchase_by_user(self, id_user):
        purchase = self.database.get_all_purchase_by_user(id_user)
        return {
            'code': 200,
            'data': purchase
        }
    
    @rpc
    def get_purchase_by_id(self, id_user, id_pembelian):
        purchase = self.database.get_purchase_by_id(id_user, id_pembelian)
        return {
            'code': 200,
            'data': purchase
        }

    @rpc
    def get_purchase_total_by_id(self, id_pembelian):
        purchase = self.database.get_purchase_total_by_id(id_pembelian)
        return {
            'code': 200,
            'data': purchase
        }
        
    @rpc
    def get_price(self, kategori, tujuan, adult, child, start_date, end_date):
        price = self.database.get_price(kategori, tujuan, adult, child, start_date, end_date)
        return {
            'code': 200,
            'data': price
        }

    @rpc
    def add_purchase(self, id_user, id_booking, kategori, tujuan, adult, child, start_date, end_date):
    # def add_purchase(self, id_user, id_booking, id_tipe_asuransi, jumlah, status_pembayaran):
        # purchase = self.database.add_purchase(id_user, id_booking, id_tipe_asuransi, jumlah, status_pembayaran)
        purchase = self.database.add_purchase(id_user, id_booking, kategori, tujuan, adult, child, start_date, end_date)
        return {
            'code': 200,
            'data': purchase
        }
    
    @rpc
    def edit_purchase_status(self, id_pembelian, status_pembayaran):
        purchase = self.database.edit_purchase_status(id_pembelian, status_pembayaran)
        return {
            'code': 200,
            'data': purchase
        }


    # Pembayaran Asuransi

    @rpc
    def get_all_payment_by_user(self, id_user):
        user_payment = self.database.get_all_payment_by_user(id_user)
        return {
            'code': 200,
            'data': user_payment
        }
    
    @rpc
    def get_payment_by_id(self, id_user, id_pembayaran):
        user_payment = self.database.get_payment_by_id(id_user, id_pembayaran)
        return {
            'code': 200,
            'data': user_payment
        }
    
    @rpc
    def add_payment(self, id_user, id_pembelian, jenis_pembayaran, nomor):
        input_purchase = self.database.get_purchase_by_id(id_user, id_pembelian)
        if input_purchase:
            status = self.edit_purchase_status(id_pembelian, 1)
            if status: 
                payment = self.database.add_payment(id_user, id_pembelian, jenis_pembayaran, nomor)
                return {
                    'code': 200,
                    'data': payment
                }
            return {
                'code': 404,
                "data": "Status Invalid."
        }
        return {
                'code': 404,
                "data": "Claim ID Invalid."
        }
    