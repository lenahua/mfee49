<?php
    $json = file_get_contents('https://openapi.twse.com.tw/v1/opendata/t187ap05_P');
    
    $data = json_decode($json);
    
    
    $mysqli = new mysqli('localhost', 'root', '', 'ispan', 3306);
    $mysqli -> set_charset('utf8');

    
    
    $sql = 'INSERT INTO money (id, date, cnumber, cname, thatmonth, lastmonth, lastpercent)' . 
            'VALUES (?, ?, ?, ?, ?, ?, ?)';
    
    $stmt = $mysqli -> prepare($sql);

    // if($stmt === false){
    //     die('Error in prepare statement:' . $mysqli -> error);
    // }
    foreach($data  as $row){
        $stmt -> bind_param('ssssiii', $row ->出表日期, $row->資料年月, $row->公司代號, $row->公司名稱,
                            $row->{'營業收入-當月營收'}, $row->{'營業收入-上月營收'}, $row->{'累計營業收入-前期比較增減'});  
        $stmt -> execute();   
    }
    // if($stmt ===false){
    //         die('Error in bind_param:'. $stmt->error);  
    // }
    echo "{$row}";
    echo 'ok';
    $mysqli ->close();
    
    
    
    
?>