<?php

include dirname(dirname(__FILE__)) . '/config/config.php';
$postParams = Functions::getPostParams();

if (isset($postParams['id']) && !empty($postParams['id'])) {
    getComStatusById($postParams['id']);
}

function getComStatusById($id) {
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getCompleteStatusById($id);
    echo json_encode($result);
}

if (isset($postParams['pageKey']) && $postParams['pageKey'] == 'checkout') {
    getCheckoutStatusById($postParams['checkoutId']);
}

function getCheckoutStatusById($id) {
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getCompleteStatusById($id);
    if (!empty($result)) {
        echo json_encode($result);
    }
}
