var sales_div = document.getElementById("sales");
var t = '<?php echo $CITY;?>';
function buy(){
sales.innerHTML = t+'<input type="button" value="Отменить покупку" onclick="cancel()" />';
}
function cancel(){
sales.innerHTML = 'Купи меня! <input type="button" value="Купить" onclick="buy()" />';
}
