<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
require $_SERVER['DOCUMENT_ROOT'] . '/lib/BiasedRandom/Element.php';
require $_SERVER['DOCUMENT_ROOT'] . '/lib/BiasedRandom/Randomizer.php';
$id = intval($_POST['id_vongquay']);
$wheel = $CMSNT->get_row("SELECT * FROM `mini_game` WHERE `id` = '$id' ");
$randomizer = new Randomizer();
$randomizer->add(new Element('1', gift($id, 1, 'tyle')))
    ->add(new Element('2', gift($id, 2, 'tyle')))
    ->add(new Element('3', gift($id, 3, 'tyle')))
    ->add(new Element('4', gift($id, 4, 'tyle')))
    ->add(new Element('5', gift($id, 5, 'tyle')))
    ->add(new Element('6', gift($id, 6, 'tyle')))
    ->add(new Element('7', gift($id, 7, 'tyle')))
    ->add(new Element('8', gift($id, 8, 'tyle')));
$khaisieudeptrai = $randomizer->get();
switch ($khaisieudeptrai) {
    case '1':
        $location = 360;
        break;
    case '2':
        $location = 320;
        break;
    case '3':
        $location = 270;
        break;
    case '4':
        $location = 230;
        break;
    case '5':
        $location = 180;
        break;
    case '6':
        $location = 130;
        break;
    case '7':
        $location = 85;
        break;
    case '8':
        $location = 44;
        break;
    default:
        $location = "";
        break;
}
$msg = gift($id, $khaisieudeptrai, 'text');
$item = gift($id, $khaisieudeptrai, 'kimcuong');
if (empty($_SESSION['username']))
{
    $status = 3;
}
elseif ($wheel['price'] > $getUser['money'])
{
    $status = 4;
}
elseif (!$wheel['id'])
{
    $status = 100;
}
else
{
    $status = 1;
    /* TRỪ TIỀN */
    $CMSNT->tru("users", "money", $wheel['price'], " `username` = '".$getUser['username']."' ");
    /* GHI LOG DÒNG TIỀN */
    $CMSNT->insert("dongtien", array(
        'sotientruoc'   => $getUser['money'] + $wheel['price'],
        'sotienthaydoi' => $wheel['price'],
        'sotiensau'     => $getUser['money'],
        'thoigian'      => gettime(),
        'noidung'       => 'Thực hiện ('.$wheel['name'].')',
        'username'      => $getUser['username']
    ));
    /* CỘNG VẬT PHẨM */
    $CMSNT->cong("users", "item", $item, " `username` = '".$getUser['username']."' ");
    /* CỘNG LƯỢT QUAY */
    $CMSNT->cong("mini_game", "sudung", 1, " `id` = '$id' ");
}
// Xuất thông báo
echo json_encode(array('status' => $status, 'item' => $khaisieudeptrai, 'location' => $location, 'msg' => $msg));
