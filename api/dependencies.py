from nameko.extensions import DependencyProvider

import mysql.connector
from mysql.connector import Error
from mysql.connector import pooling
from datetime import datetime
from datetime import date

class DatabaseWrapper:

    connection = None

    def __init__(self, connection):
        self.connection = connection


    # KATEGORI ASURANSI

    def get_all_category(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `kategori_asuransi`"
        cursor.execute(sql)
        for row in cursor.fetchall():
            result.append({
                'id_kategori': row['id_kategori'],
                'nama_kategori': row['nama_kategori']
            })
        cursor.close()
        return result

    def get_category_by_name(self, kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `kategori_asuransi` WHERE `nama_kategori` LIKE %s LIMIT 1;"
        cursor.execute(sql, ("%{}%".format(kategori),))  # Use a parameter for kategori
        result = cursor.fetchone()
        cursor.close()
        return result

    def get_category_id_by_name(self, kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT `id_kategori` FROM `kategori_asuransi` WHERE `nama_kategori` LIKE %s LIMIT 1;"
        cursor.execute(sql, ("%{}%".format(kategori),))  # Use a parameter for kategori
        result = cursor.fetchone()
        cursor.close()
        return result

    def get_category_by_id(self, id_kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `kategori_asuransi` WHERE `id_kategori` = {}".format((id_kategori))
        cursor.execute(sql)
        result = cursor.fetchone()
        cursor.close()
        return result

    def get_category_id_by_dest(self, tujuan):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT DISTINCT `id_car_insurance` FROM `cities` WHERE `nama_kota_kabupaten` LIKE %s OR `provinsi` LIKE %s LIMIT 1;"
        cursor.execute(sql, ("%{}%".format(tujuan), "%{}%".format(tujuan))) 
        result = cursor.fetchone()
        if not result: 
            sql_alternative = "SELECT `id_travel` FROM `travel_insurance` WHERE `negara` LIKE %s"
            cursor.execute(sql_alternative, ("%{}%".format(tujuan),))
            result = cursor.fetchall() 
            res = 1
        else: 
            res = 2
        cursor.close()
        return res


    def add_category(self, nama_kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql_insert_category = "INSERT INTO `kategori_asuransi` (`nama_kategori`) VALUES (%s);"
        cursor.execute(sql_insert_category, (nama_kategori,))
        self.connection.commit() 
        cursor.close()
        return True

    def edit_category(self, id_kategori, nama_kategori):
        cursor = self.connection.cursor(dictionary=True)
        sql_update_category = "UPDATE `kategori_asuransi` SET `nama_kategori` = %s WHERE `id_kategori` = %s;"
        cursor.execute(sql_update_category, (nama_kategori, id_kategori))
        self.connection.commit()
        cursor.close()
        return self.get_category_by_id(id_kategori)


    # TIPE ASURANSI

    def get_all_insurance(self):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `travel_insurance`"
        cursor.execute(sql)
        for row in cursor.fetchall():
            if row['wilayah'] == 1:
                region = 'Domestic'
            elif row['wilayah'] == 2:
                region = 'International'
            else:
                region = 'Unknown'
            result.append({
                'kategori': 'Travel Insurance',
                'id_travel': row['id_travel'],
                'wilayah'  : region,
                'negara'   : row['negara'],
                '1-4'      : row['1-4'],
                '5-6'      : row['5-6'],
                '7-8'      : row['7-8'],
                '9-10'     : row['9-10'],
                '11-15'    : row['11-15'],
                '16-20'    : row['16-20'],
                '21-25'    : row['21-25'],
                '26-30'    : row['26-30'],
                '366'      : row['366']
            })
        sql = "SELECT * FROM `car_insurance`"
        cursor.execute(sql)
        for row in cursor.fetchall():
            result.append({
                'kategori': 'Car Insurance',
                'id_car'  : row['id_car'],
                'provinsi': row['provinsi'],
                '1-4'     : row['1-4'],
                '5-6'     : row['5-6'],
                '7-8'     : row['7-8'],
                '9-10'    : row['9-10'],
                '11-15'   : row['11-15'],
                '16-20'   : row['16-20'],
                '21-25'   : row['21-25'],
                '26-30'   : row['26-30'],
                '366'     : row['366']
            })
        
        cursor.close()
        return result

    def get_insurance_by_category(self, kategori):
        cursor = self.connection.cursor(dictionary=True)
        id_kategori = self.get_category_id_by_name(kategori)

        result = []
        if (id_kategori['id_kategori'] == 1):
            sql = "SELECT * FROM `travel_insurance`"
            cursor.execute(sql)
            for row in cursor.fetchall():
                if row['wilayah'] == 1:
                    region = 'Domestic'
                elif row['wilayah'] == 2:
                    region = 'International'
                else:
                    region = 'Unknown'
                result.append({
                    'id_travel': row['id_travel'],
                    'wilayah'  : region,
                    'negara'   : row['negara'],
                    '1-4'      : row['1-4'],
                    '5-6'      : row['5-6'],
                    '7-8'      : row['7-8'],
                    '9-10'     : row['9-10'],
                    '11-15'    : row['11-15'],
                    '16-20'    : row['16-20'],
                    '21-25'    : row['21-25'],
                    '26-30'    : row['26-30'],
                    '366'      : row['366']
                })
        else:
            sql = "SELECT * FROM `car_insurance`"
            cursor.execute(sql)
            for row in cursor.fetchall():
                result.append({
                    'id_car'  : row['id_car'],
                    'provinsi': row['provinsi'],
                    '1-4'     : row['1-4'],
                    '5-6'     : row['5-6'],
                    '7-8'     : row['7-8'],
                    '9-10'    : row['9-10'],
                    '11-15'   : row['11-15'],
                    '16-20'   : row['16-20'],
                    '21-25'   : row['21-25'],
                    '26-30'   : row['26-30'],
                    '366'     : row['366']
                })
        cursor.close()
        return result

    def get_insurance_by_category_and_id(self, kategori, id_tipe_asuransi):
        cursor = self.connection.cursor(dictionary=True)
        id_kategori = self.get_category_id_by_name(kategori)
        if (id_kategori['id_kategori'] == 1):
            sql = "SELECT * FROM `travel_insurance` WHERE `id_travel` = %s"
        else:
            sql = "SELECT * FROM `car_insurance` WHERE `id_car` = %s"
        cursor.execute(sql, (id_tipe_asuransi,))
        result = cursor.fetchone()
        cursor.close()
        return result
    
    def get_id_car_insurance(self, tujuan):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT DISTINCT `id_car_insurance` FROM `cities` WHERE `nama_kota_kabupaten` LIKE %s OR `provinsi` LIKE %s LIMIT 1;"
        cursor.execute(sql, ("%{}%".format(tujuan), "%{}%".format(tujuan))) 
        res = cursor.fetchone()
        cursor.close()
        return res['id_car_insurance'] if res else None

    def get_insurance_by_category_and_dest(self, kategori, tujuan):
        cursor = self.connection.cursor(dictionary=True)
        res = self.get_id_car_insurance(tujuan)
        id_kategori_cek = self.get_category_id_by_name(kategori)
        # result = 0
        result = []
        if not res: 
            sql_alternative = "SELECT * FROM `travel_insurance` WHERE `negara` LIKE %s"
            cursor.execute(sql_alternative, ("%{}%".format(tujuan),))
            result = cursor.fetchone()
        else:
            if id_kategori_cek['id_kategori'] == 1:
                sql = "SELECT * FROM `travel_insurance` WHERE `wilayah` = 1"
                cursor.execute(sql)
                result = cursor.fetchone()
            elif id_kategori_cek['id_kategori'] == 2:
                sql = "SELECT * FROM `car_insurance` WHERE `id_car` = %s"
                cursor.execute(sql, (res, ))
                result = cursor.fetchone()
        
        cursor.close()
        return result


    def get_insurance_id_by_dest(self, tujuan):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT DISTINCT `id_car_insurance` FROM `cities` WHERE `nama_kota_kabupaten` LIKE %s OR `provinsi` LIKE %s LIMIT 1;"
        cursor.execute(sql, ("%{}%".format(tujuan), "%{}%".format(tujuan))) 
        result = cursor.fetchone()
        if not result: 
            sql_alternative = "SELECT `id` FROM `travel_insurance` WHERE `negara` LIKE %s"
            cursor.execute(sql_alternative, ("%{}%".format(tujuan),))
            result = cursor.fetchall() 
            
        cursor.close()
        return result

    def get_insurance_dest_by_category(self, kategori):
        cursor = self.connection.cursor(dictionary=True)
        id_kategori = self.get_category_id_by_name(kategori)

        result = []
        if (id_kategori['id_kategori'] == 1):
            sql = "SELECT `id_travel`, `wilayah`, `negara` FROM `travel_insurance`"
            cursor.execute(sql)
            for row in cursor.fetchall():
                if row['wilayah'] == 1:
                    region = 'Domestic'
                elif row['wilayah'] == 2:
                    region = 'International'
                else:
                    region = 'Unknown'
                result.append({
                    'id_travel': row['id_travel'],
                    'wilayah'  : region,
                    'negara'   : row['negara'],
                })
        else:
            sql = "SELECT `id_car`, `provinsi` FROM `car_insurance`"
            cursor.execute(sql)
            for row in cursor.fetchall():
                result.append({
                    'id_car'  : row['id_car'],
                    'provinsi': row['provinsi']
                })
        cursor.close()
        return result

    def add_insurance(self, kategori, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun):
        cursor = self.connection.cursor(dictionary=True)
        id_kategori = self.get_category_id_by_name(kategori)

        if (id_kategori['id_kategori'] == 1):
            if (tujuan == 'Indonesia'):
                region = 1
            else: 
                region = 2
            sql_insert_insurance = "INSERT INTO `travel_insurance` (`wilayah`, `negara`, `1-4`, `5-6`, `7-8`, `9-10`, `11-15`, `16-20`, `21-25`, `26-30`, `366`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);"
            cursor.execute(sql_insert_insurance, (region, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun))
        else: 
            sql_insert_insurance = "INSERT INTO `car_insurance` (`provinsi`, `1-4`, `5-6`, `7-8`, `9-10`, `11-15`, `16-20`, `21-25`, `26-30`, `366`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s);"
            cursor.execute(sql_insert_insurance, (tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun))

        self.connection.commit()
        cursor.close()
        return True

    def edit_insurance(self, kategori, id_tipe_asuransi, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun):
        cursor = self.connection.cursor(dictionary=True)
        id_kategori = self.get_category_id_by_name(kategori)
        if (id_kategori['id_kategori'] == 1):
            if (tujuan == 'Indonesia'):
                region = 1
            else: 
                region = 2
            sql_update_insurance = "UPDATE `travel_insurance` SET `wilayah` = %s, `negara` = %s, `1-4` = %s, `5-6` = %s, `7-8` = %s, `9-10` = %s, `11-15` = %s, `16-20` = %s, `21-25` = %s, `26-30` = %s, `366` = %s WHERE `id_travel` = %s;"
            cursor.execute(sql_update_insurance, (region, tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun, id_tipe_asuransi))
        else: 
            sql_update_insurance = "UPDATE `car_insurance` SET `provinsi` = %s, `1-4` = %s, `5-6` = %s, `7-8` = %s, `9-10` = %s, `11-15` = %s, `16-20` = %s, `21-25` = %s, `26-30` = %s, `366` = %s WHERE `id_car` = %s;"
            cursor.execute(sql_update_insurance, (tujuan, empat, enam, delapan, sepuluh, limabelas, duapuluh, dualima, tigapuluh, setahun, id_tipe_asuransi))

        self.connection.commit()
        cursor.close()
        return self.get_insurance_by_category_and_id(kategori, id_tipe_asuransi)


    # Pembelian Asuransi

    def get_all_purchase_by_user(self, id_user):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `pembelian_asuransi` WHERE `id_user` = %s"
        cursor.execute(sql,(id_user,))
        for row in cursor.fetchall():
            if isinstance(row['timestamp'], datetime):
                row['timestamp'] = row['timestamp'].isoformat()
            for key in ['start_date', 'end_date']:
                if isinstance(row[key], date):
                    row[key] = row[key].isoformat()
            result.append({
                'id_pembelian'      : row['id_pembelian'],
                'id_user'           : row['id_user'],
                'id_booking'        : row['id_booking'],
                'id_kategori'       : row['id_kategori'],
                'id_tipe_asuransi'  : row['id_tipe_asuransi'],
                'jumlah_orang'      : row['jumlah_orang'],
                'jumlah_hari'       : row['jumlah_hari'],
                'start_date'        : row['start_date'],
                'end_date'          : row['end_date'],
                'total_bayar'       : row['total_bayar'],
                'timestamp'         : row['timestamp'],
                'status_pembayaran' : row['status_pembayaran']
            })
        cursor.close()

        return result
    
    def get_purchase_by_id(self, id_user, id_pembelian):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `pembelian_asuransi` WHERE `id_user` = %s AND `id_pembelian` = %s"
        cursor.execute(sql,(id_user, id_pembelian))
        result = cursor.fetchone()
        cursor.close()
        if result:
            for key, value in result.items():
                if isinstance(value, datetime):
                    result[key] = value.isoformat()
            for key in ['start_date', 'end_date']:
                if isinstance(result[key], date):
                    result[key] = result[key].isoformat()
        return result

    def get_purchase_total_by_id(self, id_pembelian):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT `total_bayar` FROM `pembelian_asuransi` WHERE `id_pembelian` = %s;"
        cursor.execute(sql,(id_pembelian,))
        result = cursor.fetchone()
        cursor.close()
        return result['total_bayar'] if result else None

    def get_price(self, kategori, tujuan, adult, child, start_date, end_date):
        cursor = self.connection.cursor(dictionary=True)
        
        current_timestamp   = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        start_date          = datetime.strptime(start_date, '%d-%m-%Y')
        end_date            = datetime.strptime(end_date, '%d-%m-%Y')
        jumlah_hari         = (end_date-start_date).days + 1
        start_date          = start_date.strftime('%Y-%m-%d')
        end_date            = end_date.strftime('%Y-%m-%d')
        jumlah_orang        = adult + child
        
        tipe_asuransi = self.get_insurance_by_category_and_dest(kategori, tujuan)
        days = jumlah_hari
        total_bayar = 0
        while (days > 0):
            if (days > 366):
                total_bayar += tipe_asuransi['366']
                days -= 366
            elif (days > 25):
                total_bayar += tipe_asuransi['26-30']
                days -= 30
            elif (days > 20):
                total_bayar += tipe_asuransi['21-25']
                days -= 25
            elif (days > 15):
                total_bayar += tipe_asuransi['16-20']
                days -= 20
            elif (days > 10):
                total_bayar += tipe_asuransi['11-15']
                days -= 15    
            elif (days > 8):
                total_bayar += tipe_asuransi['9-10']
                days -= 10
            elif (days > 6):
                total_bayar += tipe_asuransi['7-8']
                days -= 8
            elif (days > 4):
                total_bayar += tipe_asuransi['5-6']
                days -= 6
            else:
                total_bayar += tipe_asuransi['1-4']
                days -= 4
                
        cursor.close()
        return total_bayar

    # def add_purchase(self, id_user, id_booking, id_tipe_asuransi, jumlah, status_pembayaran):
    def add_purchase(self, id_user, id_booking, kategori, tujuan, adult, child, start_date, end_date):
        cursor = self.connection.cursor(dictionary=True)
        
        current_timestamp   = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        start_date          = datetime.strptime(start_date, '%d-%m-%Y')
        end_date            = datetime.strptime(end_date, '%d-%m-%Y')
        jumlah_hari         = (end_date-start_date).days + 1
        start_date          = start_date.strftime('%Y-%m-%d')
        end_date            = end_date.strftime('%Y-%m-%d')
        jumlah_orang        = adult + child
        
        tipe_asuransi = self.get_insurance_by_category_and_dest(kategori, tujuan)
        id_kategori = self.get_category_id_by_name(kategori)
        id_tipe_asuransi = 0 
        if (id_kategori['id_kategori'] == 1):
            id_tipe_asuransi = tipe_asuransi['id_travel']
        else:
            id_tipe_asuransi = tipe_asuransi['id_car']
        
        days = jumlah_hari
        total_bayar = 0
        while (days > 0):
            if (days > 366):
                total_bayar += tipe_asuransi['366']
                days -= 366
            elif (days > 25):
                total_bayar += tipe_asuransi['26-30']
                days -= 30
            elif (days > 20):
                total_bayar += tipe_asuransi['21-25']
                days -= 25
            elif (days > 15):
                total_bayar += tipe_asuransi['16-20']
                days -= 20
            elif (days > 10):
                total_bayar += tipe_asuransi['11-15']
                days -= 15    
            elif (days > 8):
                total_bayar += tipe_asuransi['9-10']
                days -= 10
            elif (days > 6):
                total_bayar += tipe_asuransi['7-8']
                days -= 8
            elif (days > 4):
                total_bayar += tipe_asuransi['5-6']
                days -= 6
            else:
                total_bayar += tipe_asuransi['1-4']
                days -= 4
        
        sql = "INSERT INTO `pembelian_asuransi` (`id_user`, `id_booking`, `id_kategori`, `id_tipe_asuransi`, `jumlah_orang`, `jumlah_hari`, `start_date`, `end_date`, `total_bayar`, `timestamp`, `status_pembayaran`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
        cursor.execute(sql, (id_user, id_booking, id_kategori['id_kategori'], id_tipe_asuransi, jumlah_orang, jumlah_hari, start_date, end_date, total_bayar, current_timestamp, 0))
        self.connection.commit()
        cursor.close()
        return total_bayar

    def edit_purchase_status(self, id_pembelian, status_pembayaran):
        cursor = self.connection.cursor(dictionary=True)
        sql_update_purchase = "UPDATE `pembelian_asuransi` SET `status_pembayaran` = %s WHERE `id_pembelian` = %s;"
        cursor.execute(sql_update_purchase, (status_pembayaran, id_pembelian))
        self.connection.commit()
        cursor.close()
        
        return True


    # Pembayaran Asuransi

    def get_all_payment_by_user(self, id_user):
        cursor = self.connection.cursor(dictionary=True)
        result = []
        sql = "SELECT * FROM `pembayaran_asuransi` WHERE `id_user` = %s"
        cursor.execute(sql,(id_user,))
        for row in cursor.fetchall():
            if isinstance(row['timestamp'], datetime):
                row['timestamp'] = row['timestamp'].isoformat()

            result.append({
                'id_pembayaran': row['id_pembayaran'],
                'id_user': row['id_user'],
                'id_pembelian': row['id_pembelian'],
                'timestamp': row['timestamp'],
                'total_bayar': row['total_bayar'],
                'pajak': row['pajak'],
                'jenis_pembayaran': row['jenis_pembayaran'],
                'nomor_kartu': row['nomor_kartu'],
                'nomor_rekening': row['nomor_rekening'],
                'nomor_telepon': row['nomor_telepon']
            })
        # for row in cursor.fetchall():
        #     data = {
        #         'id_pembayaran': row['id_pembayaran'],
        #         'id_user': row['id_user'],
        #         'id_pembelian': row['id_pembelian'],
        #         'timestamp': row['timestamp'],
        #         'total_bayar': row['total_bayar'],
        #         'pajak': row['pajak'],
        #         'jenis_pembayaran': row['jenis_pembayaran'],
        #     }

        #     if row['nomor_kartu'] is not None:
        #         data['nomor_kartu'] = row['nomor_kartu']
        #     if row['nomor_rekening'] is not None:
        #         data['nomor_rekening'] = row['nomor_rekening']
        #     if row['nomor_telepon'] is not None:
        #         data['nomor_telepon'] = row['nomor_telepon']
        
        #     result.append(data)

        cursor.close()

        return result
    
    def get_payment_by_id(self, id_user, id_pembayaran):
        cursor = self.connection.cursor(dictionary=True)
        sql = "SELECT * FROM `pembayaran_asuransi` WHERE `id_user` = %s AND `id_pembayaran` = %s"
        cursor.execute(sql,(id_user, id_pembayaran))
        result = cursor.fetchone()
        cursor.close()
        
        if result:
            for key, value in result.items():
                if isinstance(value, datetime):
                    result[key] = value.isoformat()

        return result
    
    def add_payment(self, id_user, id_pembelian, jenis_pembayaran, nomor):
        current_timestamp = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        total_bayar = self.get_purchase_total_by_id(id_pembelian)
        if total_bayar is None:
            raise ValueError("Invalid purchase ID")  # Handle invalid purchase ID case

        cursor = self.connection.cursor(dictionary=True)
        sql = ""
        if (jenis_pembayaran == 1):
            sql = "INSERT INTO `pembayaran_asuransi` (`id_user`, `id_pembelian`, `timestamp`, `total_bayar`, `pajak`, `jenis_pembayaran`, `nomor_kartu`, `nomor_rekening`, `nomor_telepon`) VALUES (%s, %s, %s, %s, %s, %s, %s, NULL, NULL)"
        elif (jenis_pembayaran == 2):
            sql = "INSERT INTO `pembayaran_asuransi` (`id_user`, `id_pembelian`, `timestamp`, `total_bayar`, `pajak`, `jenis_pembayaran`, `nomor_kartu`, `nomor_rekening`, `nomor_telepon`) VALUES (%s, %s, %s, %s, %s, %s, NULL, %s, NULL)"
        elif (jenis_pembayaran == 3):
            sql = "INSERT INTO `pembayaran_asuransi` (`id_user`, `id_pembelian`, `timestamp`, `total_bayar`, `pajak`, `jenis_pembayaran`, `nomor_kartu`, `nomor_rekening`, `nomor_telepon`) VALUES (%s, %s, %s, %s, %s, %s, NULL, NULL, %s)"
        pajak = total_bayar * 0.11
        cursor.execute(sql, (id_user, id_pembelian, current_timestamp, total_bayar, pajak, jenis_pembayaran, nomor))
        self.connection.commit()
        cursor.close()
        return True
    
    def __del__(self):
       self.connection.close()


class Database(DependencyProvider):

    connection_pool = None

    def __init__(self):
        try:
            self.connection_pool = mysql.connector.pooling.MySQLConnectionPool(
                pool_name="database_pool",
                pool_size=32,
                pool_reset_session=True,
                host='localhost',
                database='insurance',
                user='root',
                password=''
            )

        except Error as e :
            print ("Error while connecting to MySQL using Connection pool ", e)

    def get_dependency(self, worker_ctx):
        return DatabaseWrapper(self.connection_pool.get_connection())
