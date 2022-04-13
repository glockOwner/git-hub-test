<?php
		$params = array(
    'host' => 'my.site',
    'dbname' => 'motoshop',
    'user' => 'root',
    'password' => ''
);
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

		$sql = "SELECT * FROM `product_orders`";

        $result = $db->query($sql);

        $arrayOfProducts = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $productInOrder = json_decode($row['products'], true);

            $n = 0;
            foreach ($productInOrder as $id => $qty)
            {
                if (isset($arrayOfProducts[$id]))
                {
                    $arrayOfProducts[$n][$id] += $qty;
                }
                else
                {
                    $arrayOfProducts[$n][$id] = $qty;
                    $n++;
                }
            }
        }

        print_r($arrayOfProducts);
        echo "HEllo, world!";


