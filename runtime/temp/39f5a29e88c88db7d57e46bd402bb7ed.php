<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"E:\phpstudy\PHPTutorial\WWW\ydwxfx\public/../app/index\view\index\orderforgoods.html";i:1527477450;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <link rel="stylesheet" type="text/css" href="/ydwxfx/public/static/css/orderforgoods.css"/>
    <script src="/ydwxfx/public/static/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/ydwxfx/public/static/js/orderforgoods.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <title></title>
</head>
<body>
<div id="orderforgoods">

    <div class="header">
        <h1>订单信息</h1>
        <a href="/ydwxfx/public/index.php/index/index/my" class="back"><span></span></a>
    </div>
</div>
<div class="main">
    <div class="top-mes">
        <ul>
            <li class="active">全部</li>
            <!--<li>待付款</li>-->
            <!--<li>待发货</li>-->
            <!--<li>待收货</li>-->
            <!--<li>待评价</li>-->
        </ul>
    </div>
    <div id="order_list" style="background-color: white">
        <div class="con" v-for="item in items.order_array">
            <div class="under">
                <p v-if="item.status == 'C'">
                    <span>
                        待评价||<a href="/ydwxfx/public/index.php/index/index/pay">去评价</a>
                    </span>
                </p>
                <p v-if="item.status == 'R'">
                    <span>
                        待收货||<a @click="confirmOrder(item.order_account)">确认收货</a>
                    </span>
                </p>
                <p v-if="item.status == 'D'">
                    <span>
                        完成
                    </span>
                </p>
                <p v-if="item.status == 'P'">
                    <span>
                        待付款||
                        <a @click="doPay(item.order_account)">去付款</a>||
                        <a @click="deleteOrder(item.order_account)">取消订单</a>
                    </span>
                </p>
                <div v-for="it in item.order_goods" style="margin: 0px;padding: 0px;background-color: white">
                    <div style="margin: 0px;padding: 0px">
                        <div class="all" style="margin-left: 20px;">
                            <div class="img">
                                <a :href="'/ydwxfx/public/index.php/index/index/shopitems?goods_id='+it.goods_id"><img  :src="it.iconimage_src"/></a>
                            </div>
                            <div class="shop-mes">
                                <p class="mes">{{it.describe}}</p>
                                <p class="mes"><span >{{it.specifications}}</span></p>
                                <p class="price">￥{{it.unit_price}}</p>
                                <p class="price"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var user_id = "<?php echo $data['user_id']; ?>";
    var token = "<?php echo $data['token']; ?>";

    var vm = new Vue({
        el: "#order_list",
        data: {
            items: null
        },
        methods:{
            deleteOrder:function (order_id) {
                if(confirm("是否删除改订单，删除后将无法恢复")==true){
                    $.ajax({
                        url: 'http://localhost/pcwxapi/public/index.php/user/user/deleteOrder',
                        data: {
                            user_id: user_id,
                            user_token: token,
                            order_account:order_id
                        },
                        type: 'post',
                        success: function (data) {
                            var obj = JSON.parse(data)
                            if(obj.code=='0'){
                                console.log('0');
                                window.location.href="http://localhost/ydwxfx/public/index.php/index/index/orderforgoods";
                            }
                        },
                        error: function () {
                            console.log(order_id);
                            alert('error');
                        }
                    })
                }
            },
            confirmOrder:function (order_id) {
                if(confirm("是否确认收货")==true){
                    $.ajax({
                        url: 'http://localhost/pcwxapi/public/index.php/user/user/trueReceiptgoods',
                        data: {
                            user_id: user_id,
                            user_token: token,
                            order_account:order_id
                        },
                        type: 'post',
                        success: function (data) {
                            var obj = JSON.parse(data)
                            if(obj.code=='0'){
                           console.log('0');
                           window.location.href="http://localhost/ydwxfx/public/index.php/index/index/orderforgoods";
                            }
                        },
                        error: function () {
                            console.log(order_id);
                            alert('error');
                        }
                    })
                }
            },
            doPay:function (order_id) {
                if(confirm("确认付款")==true){
                    $.ajax({
                        url: 'http://localhost/pcwxapi/public/index.php/user/user/pay',
                        data: {
                            user_id: user_id,
                            user_token: token,
                            order_account:order_id
                        },
                        type: 'post',
                        success: function (data) {
                            var obj = JSON.parse(data)
                            if(obj.code=='0'){
                           window.location.href="http://localhost/ydwxfx/public/index.php/index/index/pay";
                            }
                        },
                        error: function () {
                            console.log(order_id);
                            alert('error');
                        }
                    })
                }
            }
        }
    });

    $(document).ready(function () {
        $.ajax({
            url: 'http://localhost/pcwxapi/public/index.php/user/user/getUserInfo',
            data: {
                user_id: user_id,
                user_token: token
            },
            type: 'post',
            success: function (data) {
                var obj = JSON.parse(data)
                vm.items = obj.data;
            },
            error: function () {
                alert('error');
            }
        })
    });
</script>
</body>
</html>
