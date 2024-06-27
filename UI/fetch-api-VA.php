<?php

// Mulai session jika belum dimulai
if (!isset($_SESSION)) {
    session_start();
}

header('Content-Type: application/json');
$id_transaksi;
$bank = "";
$status = "";

if (isset($_POST['id_pesanan'])) {
    $id_pesanan = htmlspecialchars($_POST['id_pesanan']);

    //cek dulu apakah timestamp sudah lebih dari 2 menit
    $urlcheck = "http://44.195.103.224:8009/Tpembayaran/pesanan/{$id_pesanan}";
    $chCheck = curl_init();

    curl_setopt($chCheck, CURLOPT_URL, $urlcheck);
    curl_setopt($chCheck, CURLOPT_RETURNTRANSFER, true);

    $responseCheck = curl_exec($chCheck);
    if (curl_errno($chCheck)) {
        echo json_encode(['code' => 500, 'message' => 'Error executing request']);
    } else {
        curl_close($chCheck);
        $resultCheck = json_decode($responseCheck, true);
        if ($resultCheck === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['code' => 500, 'message' => 'Error decoding JSON response']);
        } else {
            $transaction = $resultCheck['data'][0]; // Accessing the first element of the data array

            if (isset($transaction['id_transaksi'])) {
                $id_transaksi = $transaction['id_transaksi'];
                $bank = $transaction['nama_penyedia'];
                $status = $transaction['status'];

                // if ($resultCheck['code'] == 200) {
                //     $id_transaksi = $resultCheck['data']['id_transaksi'];
                //     $bank = $resultCheck['data']['nama_penyedia'];
                // }

                if ($bank == 'BCA') {
                    $GetTime = "http://44.195.103.224:8009/transBCA/timestamp/{$id_transaksi}";
                } else if ($bank == 'Mandiri') {
                    $GetTime = "http://44.195.103.224:8009/transMandiri/timestamp/{$id_transaksi}";
                }

                $chGetTime = curl_init();
                curl_setopt($chGetTime, CURLOPT_URL, $GetTime);
                curl_setopt($chGetTime, CURLOPT_RETURNTRANSFER, true);

                $responseGetTime = curl_exec($chGetTime);

                if (curl_errno($chGetTime)) {
                    echo json_encode(['code' => 500, 'message' => 'Error executing request']);
                } else {
                    curl_close($chGetTime);
                    $resultGetTime = json_decode($responseGetTime, true);


                    if ($resultGetTime['data'] === true && $status !== 'failed') {
                        // if ($resultGetTime == True && $status != 'failed' ) {
                        if (isset($_POST['va']) && isset($_POST['pin'])) {

                            $va = htmlspecialchars($_POST['va']);
                            $pin = htmlspecialchars($_POST['pin']);

                            if ($bank == 'BCA') {
                                $Get1Url = "http://44.195.103.224:8009/transBCA/{$id_transaksi}";
                            } else if ($bank == 'Mandiri') {
                                $Get1Url = "http://44.195.103.224:8009/transMandiri/{$id_transaksi}";
                            }

                            $chGet1 = curl_init();
                            curl_setopt($chGet1, CURLOPT_URL, $Get1Url);
                            curl_setopt($chGet1, CURLOPT_RETURNTRANSFER, true);

                            $responseGet1 = curl_exec($chGet1);
                            if (curl_errno($chGet1)) {
                                echo json_encode(['code' => 500, 'message' => 'Error executing request']);
                            } else {
                                curl_close($chGet1);

                                $resultGet1 = json_decode($responseGet1, true);
                                if ($resultGet1 === null && json_last_error() !== JSON_ERROR_NONE) {
                                    echo json_encode(['code' => 500, 'message' => 'Error decoding JSON response']);
                                } else {
                                    if ($va === $resultGet1) {
                                        //kasih error handler karena VA yang di input salah
                                    } else {
                                        //lanjut ke proses selanjutnya cek pin untuk va nya 
                                        if ($bank == 'BCA') {
                                            $Get2Url = "http://44.195.103.224:8009/BCA/VA/{$va}/pin/{$pin}";
                                        } else if ($bank == 'Mandiri') {
                                            $Get2Url = "http://44.195.103.224:8009/Mandiri/VA/{$va}/pin/{$pin}";
                                        }

                                        $chGet2 = curl_init();
                                        curl_setopt($chGet2, CURLOPT_URL, $Get2Url);
                                        curl_setopt($chGet2, CURLOPT_RETURNTRANSFER, true);

                                        $responseGet2 = curl_exec($chGet2);

                                        if (curl_errno($chGet2)) {
                                            echo json_encode(['code' => 500, 'message' => 'Error executing request']);
                                        } else {
                                            curl_close($chGet2);

                                            $resultGet2 = json_decode($responseGet2, true);

                                            if ($resultGet2 === null && json_last_error() !== JSON_ERROR_NONE) {
                                                echo json_encode(['code' => 500, 'message' => 'Error decoding JSON response']);
                                            } else {
                                                // echo json_encode($resultGet2);
                                                if ($resultGet2 == true) { #kalau pin benar

                                                    #update tras_bca dan update trans_pembayaran
                                                    if ($bank == 'BCA') {
                                                        $urlPutBank = "http://44.195.103.224:8009/ransBCA/{$id_transaksi}";
                                                    } else if ($bank == 'Mandiri') {
                                                        $urlPutBank = "http://44.195.103.224:8009/transMandiri/{$id_transaksi}";
                                                    }


                                                    $chPut = curl_init();

                                                    curl_setopt($chPut, CURLOPT_URL, $urlPutBank);
                                                    curl_setopt($chPut, CURLOPT_CUSTOMREQUEST, "PUT");
                                                    curl_setopt($chPut, CURLOPT_RETURNTRANSFER, true);

                                                    $putResponse = curl_exec($chPut);

                                                    if (curl_errno($chPut)) {
                                                        echo json_encode(['code' => 500, 'message' => 'Error executing PUT request']);
                                                    } else {
                                                        curl_close($chPut);

                                                        $putResult = json_decode($putResponse, true);
                                                        if ($putResult === null && json_last_error() !== JSON_ERROR_NONE) {
                                                            echo json_encode(['code' => 500, 'message' => 'Error decoding PUT response JSON']);
                                                        } else {
                                                            $chPost = curl_init();

                                                            curl_setopt($chPost, CURLOPT_URL, 'http://44.195.103.224:8009/notif');
                                                            curl_setopt($chPost, CURLOPT_POST, 1);
                                                            curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);
                                                            curl_setopt($chPost, CURLOPT_POSTFIELDS, json_encode(array(
                                                                'id_user' => 1,
                                                                'id_pesanan' => $id_pesanan,
                                                                'tipe_notif' => 'keuangan',
                                                                'judul' => "Pembayaran untuk pesanan $id_pesanan berhasil ",
                                                                'deskripsi' => "Pembayaran untuk pesanan $id_pesanan dengan virtual account bank $bank telah berhasil",
                                                                'timestamp_masuk' => date('Y-m-d H:i:s'), // Current timestamp
                                                                'status' => 0,
                                                                'link' => ""
                                                            )));

                                                            curl_setopt($chPost, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

                                                            $postResponse = curl_exec($chPost);

                                                            if (curl_errno($chPost)) {
                                                                echo json_encode(['code' => 500, 'message' => 'Error executing POST request to /notif']);
                                                            } else {
                                                                curl_close($chPost);
                                                                $postResult = json_decode($postResponse, true);

                                                                if ($postResult === null && json_last_error() !== JSON_ERROR_NONE) {
                                                                    echo json_encode(['code' => 500, 'message' => 'Error decoding POST response JSON from /notif']);
                                                                } else {

                                                                    // echo json_encode($postResult);
                                                                    // echo json_encode($resultGet2);

                                                                    //update status notif 
                                                                    $putNotifData = [
                                                                        'judul' => 'Pembayaran sudah dilakukan'
                                                                    ];

                                                                    $putNotifDataJson = json_encode($putNotifData);

                                                                    $putNotifurl = "http://44.195.103.224:8009/notif/pesanan/{$id_pesanan}";

                                                                    $chPutNotif = curl_init();

                                                                    // Set cURL options
                                                                    curl_setopt($chPutNotif, CURLOPT_URL, $putNotifurl);
                                                                    curl_setopt($chPutNotif, CURLOPT_CUSTOMREQUEST, "PUT");
                                                                    curl_setopt($chPutNotif, CURLOPT_POSTFIELDS, $putNotifDataJson);
                                                                    curl_setopt($chPutNotif, CURLOPT_RETURNTRANSFER, true);
                                                                    curl_setopt($chPutNotif, CURLOPT_HTTPHEADER, [
                                                                        'Content-Type: application/json',
                                                                        'Content-Length: ' . strlen($putNotifDataJson)
                                                                    ]);

                                                                    $putNotifResponse = curl_exec($chPutNotif);
                                                                    if (curl_errno($chPutNotif)) {
                                                                        echo json_encode(['code' => 500, 'message' => 'Error executing PUT request: ' . curl_error($chPut)]);
                                                                    } else {
                                                                        curl_close($chPutNotif);

                                                                        // Decode response JSON
                                                                        $putNotifResult = json_decode($putNotifResponse, true);

                                                                        if ($putNotifResult === null && json_last_error() !== JSON_ERROR_NONE) {
                                                                            echo json_encode(['code' => 500, 'message' => 'Error decoding PUT response JSON']);
                                                                        } else {
                                                                            // echo json_encode($resultGet2);
                                                                            $statusUpdate = 'success';
                                                                            $putSUrl = "hhttp://44.195.103.224:8009/Tpembayaran/pesanan/{$id_pesanan}/status/{$statusUpdate}";
                                                                            $chS = curl_init();

                                                                            curl_setopt($chS, CURLOPT_URL, $putSUrl);
                                                                            curl_setopt($chS, CURLOPT_CUSTOMREQUEST, "PUT");
                                                                            curl_setopt($chS, CURLOPT_RETURNTRANSFER, true);
                                                                            curl_setopt($chS, CURLOPT_HTTPHEADER, [
                                                                                'Content-Type: application/json',
                                                                                // You may need to set Content-Length depending on your data
                                                                            ]);

                                                                            $responseS = curl_exec($chS);

                                                                            // Check for cURL errors
                                                                            if (curl_errno($chS)) {
                                                                                echo 'Error:' . curl_error($chS);
                                                                            } else {
                                                                                curl_close($chS);
                                                                                $resultS = json_decode($responseS, true);
                                                                                if ($resultS === null && json_last_error() !== JSON_ERROR_NONE) {
                                                                                    echo json_encode(['code' => 500, 'message' => 'Error decoding JSON response failed trans_pembayaran']);
                                                                                } else {
                                                                                    // $putEricData = [
                                                                                    //     'status' => 1
                                                                                    // ];

                                                                                    // $putEricDataJson = json_encode($putNoputEricDatatifData);

                                                                                    // $urlEric =  "http://localhost:8000/kartu_kredit/transaksi/{$idTrans}/status/failed";

                                                                                    // $chEric = curl_init();
                                                                                    // // Set cURL options
                                                                                    // curl_setopt($chEric, CURLOPT_URL, $urlEric);
                                                                                    // curl_setopt($chEric, CURLOPT_CUSTOMREQUEST, "PUT");
                                                                                    // curl_setopt($chEric, CURLOPT_POSTFIELDS, $putEricDataJson);
                                                                                    // curl_setopt($chEric, CURLOPT_RETURNTRANSFER, true);
                                                                                    // curl_setopt($chEric, CURLOPT_HTTPHEADER, [
                                                                                    //     'Content-Type: application/json',
                                                                                    //     'Content-Length: ' . strlen($putEricDataJson)
                                                                                    // ]);

                                                                                    // $responseEric = curl_exec($chEric);

                                                                                    // // Check for cURL errors
                                                                                    // if (curl_errno($chEric)) {
                                                                                    //     echo 'Error:' . curl_error($chEric);
                                                                                    // } else {
                                                                                    //     curl_close($chEric);
                                                                                    //     $resultEric = json_decode($responseEric, true);
                                                                                    //     if ($resultEric === null && json_last_error() !== JSON_ERROR_NONE) {
                                                                                    //         echo json_encode(['code' => 500, 'message' => 'Error decoding JSON response failed Ericksen']);
                                                                                    //     } else {
                                                                                            echo json_encode($resultGet2);
                                                                                    //     }
                                                                                    // }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        // } else if ($resultGetTime == False) {
                        //ubah notif
                        $putNotifData = [
                            'judul' => 'Pembayaran Gagal'
                        ];

                        $putNotifDataJson = json_encode($putNotifData);

                        $putNotifurl = "http://44.195.103.224:8009/notif/pesanan/{$id_pesanan}";

                        $chPutNotif = curl_init();

                        // Set cURL options
                        curl_setopt($chPutNotif, CURLOPT_URL, $putNotifurl);
                        curl_setopt($chPutNotif, CURLOPT_CUSTOMREQUEST, "PUT");
                        curl_setopt($chPutNotif, CURLOPT_POSTFIELDS, $putNotifDataJson);
                        curl_setopt($chPutNotif, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($chPutNotif, CURLOPT_HTTPHEADER, [
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen($putNotifDataJson)
                        ]);

                        $putNotifResponse = curl_exec($chPutNotif);
                        if (curl_errno($chPutNotif)) {
                            echo json_encode(['code' => 500, 'message' => 'Error executing PUT request: ' . curl_error($chPut)]);
                        } else {
                            curl_close($chPutNotif);

                            // Decode response JSON
                            $putNotifResult = json_decode($putNotifResponse, true);

                            if ($putNotifResult === null && json_last_error() !== JSON_ERROR_NONE) {
                                echo json_encode(['code' => 500, 'message' => 'Error decoding PUT response JSON']);
                            } else {

                                //ubah status di trans_pembayaran jadi failed

                                $statusUpdate = 'failed';
                                $putFailedUrl = "http://44.195.103.224:8009/Tpembayaran/pesanan/{$id_pesanan}/status/{$statusUpdate}";
                                $chF = curl_init();

                                // Set cURL options for GET request
                                curl_setopt($chF, CURLOPT_URL, $putFailedUrl);
                                curl_setopt($chF, CURLOPT_CUSTOMREQUEST, "PUT");
                                curl_setopt($chF, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($chF, CURLOPT_HTTPHEADER, [
                                    'Content-Type: application/json',
                                    // You may need to set Content-Length depending on your data
                                ]);
                                // curl_setopt($chF, CURLOPT_URL, $putFailedUrl);
                                // curl_setopt($chF, CURLOPT_RETURNTRANSFER, true);


                                // Execute cURL and get the response
                                $responseF = curl_exec($chF);

                                // Check for cURL errors
                                if (curl_errno($chF)) {
                                    echo 'Error:' . curl_error($chF);
                                } else {
                                    curl_close($chF);
                                    $resultF = json_decode($responseF, true);
                                    if ($resultF === null && json_last_error() !== JSON_ERROR_NONE) {
                                        echo json_encode(['code' => 500, 'message' => 'Error decoding JSON response failed trans_pembayaran']);
                                    } else {
                                        echo json_encode($resultGetTime);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>