<?php

//Task 1
function task1()
{
    $content = "";
    $file = file_get_contents("data.xml");
    $xml = new SimpleXMLElement($file);
    foreach ($xml->attributes() as $key => $v) {
        $content .= "<span>".$key." - ".$v."</span><br>";
    }
    $content .= "<hr/>";
    $i = 0;
    $content .= "<h3>Address:</h3>";

    foreach ($xml->Address as $value) {
        $i++;
        if (($i % 2) == 0) {
            $content .= "<hr>";
        }
        $content .= "Type = ".$value->attributes()->Type->__toString();
        foreach ($value as $key => $value) {
            $content .= $key." - ".$value[0]."<br>";
        }
    }
    $content2 ="";
    foreach ($xml->Items->Item as $value) {
        $i++;
        if (($i % 2) == 0) {
            $content2 .= "<hr>";
        }
        $content2 .= "PartNumber = ".$value->attributes()->PartNumber->__toString()."<br>";
        foreach ($value as $key => $value) {
            $content2 .= $key." - ".$value[0]."<br>";
        }
    }


    $content .= "<br><b><i>DeliveryNotes: </i></b>".$xml->DeliveryNotes->__toString();
    echo "<html><head></head><body>";
    echo $content;
    echo "<h3>Items:</h3>";
    echo $content2;
    echo "</body></html>";
}

//Task 2
function task2()
{
    $array = [
        ["Countries" =>
            ["Россия", "Белорусия", "США", "Китай"],
        "Code of the country" =>
            ["+7", "+3", "+1", "+5"]
        ],
    ];
    $encoded = json_encode($array, JSON_UNESCAPED_UNICODE);
    file_put_contents("output.json", $encoded);

    if (rand(0, 1) == 1) {
        $data = [["Area of countries" => ["119990", "17000", "113000", "89000"]],];
        $file = file_get_contents("output.json");
        $decoded = json_decode($file, true);
        unset($file);
        $fileName = "output2.json";
        $newArray[] = array_merge($decoded[0], $data[0]);
        $file = json_encode($newArray, JSON_UNESCAPED_UNICODE);
        file_put_contents($fileName, $file);
        echo "Случайным образом изменения сохранили в ".$fileName;
    }

    $file1 = file_get_contents("output.json");
    $decoded1 = json_decode($file1, true);
    $file2 = file_get_contents("output2.json");
    $decoded2 = json_decode($file2, true);
    $result = array_diff_assoc($decoded2[0], $decoded1[0]);
    echo "<h4>В файлах следующие отличие: </h4>";
    echo '<pre>';
    print_r($result);
    echo '</pre>';
}

//Task 3
function task3()
{
    $array = [];
    for ($i = 1; $i <= 50; $i++) {
        $array[] = rand(1, 100);
    }
    
    $filePatch = "./test.csv";
    $fp = fopen($filePatch, "w");
    fputcsv($fp, $array, ";");
    fclose($fp);
    echo "файл успешно записан".PHP_EOL;

    $csvFile = fopen($filePatch, "r");
    if ($csvFile) {
        $res = [];
        while (($csvData = fgetcsv($csvFile, 500, ";")) !== false) {
            $res = $csvData;
        }
        echo "Сумма в csv файле = ".array_sum($res);
    }
}

//Task 4
function task4()
{

    function search_key($searchKey, $decoded, &$result)
    {

        if (isset($decoded[$searchKey])) {
            $result[] = $decoded[$searchKey];
        }
        foreach ($decoded as $key => $value) {
            if (is_array($value)) {
                search_key($searchKey, $value, $result);
            }
        }
    }

    $result = [];
    $fileArray = file_get_contents("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
    $decoded = json_decode($fileArray, true);

    search_key("title", $decoded, $result);
    echo "title: ".$result[0]."<br>";
    search_key("page_id", $decoded, $result);
    echo "page_id: ".$result[0];

}
