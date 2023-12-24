/*let filter="all";
let sort="name";
let search="";*/

function showDataRatingAndReviews(str) {
  if (str == "") {
    document.getElementById("ratingandreview").innerHTML = "";
    return;
  } else {
    /*
    let str_type=str.split('_')[0];
    if(str_type=="filter") filter=str;
    else if(str_type="sort") sort=str;*/
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("ratingandreview").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","vendor/ajax/ratingandreview.php?data="+str,true);
    xmlhttp.send();
  }
}
function showDataProducts(str) {
  if (str == "") {
    document.getElementById("products_container").innerHTML = "";
    return;
  } else {
    /*
    let str_type=str.split('_')[0];
    if(str_type=="filter") filter=str;
    else if(str_type="sort") sort=str;*/
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("products_container").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","./vendor/ajax/products.php?data="+str,true);
    xmlhttp.send();
  }
}