
// $(document).ready(function() {
   
//    $("#clr").click(function(){
//    $(":checkbox").prop("checked", false);
   
//    });
   
 
   
//    });


// var wrapper = document.getElementById('first');
// wrapper.addEventListener("click", function (evt) {
// var elem = evt.target;
// if (elem.name==="jeans") {
// // let c = document.getElementById('jeans').label;
// let c = document.getElementById("jean").innerHTML;
// console.log(c);
// let a = document.getElementById("subcategory").innerHTML;
// console.log(a);


// if(c.includes(a)){
//     console.log("string matched");
// }
// else{
//   console.log("string not  matched");

// }


// }
// if (elem.name==="plazo") {
// // let c = document.getElementById('jeans').label;
// let d = document.getElementById("plazo").innerHTML;
// console.log(d);
// }
// if (elem.name==="lengis") {
// // let c = document.getElementById('jeans').label;
// let e = document.getElementById("lengis").innerHTML;
// }
// });


// //input element where you put value
// // $("#isClicked").val("Yes");
// // console.log($("#isClicked").val());              



// var wrapper2 =document.getElementById('size');
// wrapper2.addEventListener("click", function (evt) {
// var elem = evt.target;
// if (elem.name==="small") {
// // let c = document.getElementById('jeans').label;
// let f = document.getElementById("small").innerHTML;
// console.log(f);
// }
// if (elem.name==="medium") {
// // let c = document.getElementById('jeans').label;
// let g = document.getElementById("jean").innerHTML;
// }
// if (elem.name==="large") {
// // let c = document.getElementById('jeans').label;
// let h = document.getElementById("large").innerHTML;
// }
// if (elem.name==="xl") {
// // let c = document.getElementById('jeans').label;
// let i = document.getElementById("xl").innerHTML;
// }
// if (elem.name==="xxl") {
// // let c = document.getElementById('jeans').label;
// let i = document.getElementById("xxl").innerHTML;
// }

// });


// var wrapper3 =document.getElementById('price');
// wrapper3.addEventListener("click", function (evt) {
// var elem = evt.target;
// if (elem.name==="below500") {
//  // let c = document.getElementById('jeans').label;
//  let  x = document.getElementById("below500").innerHTML;
//  console.log(x);
// }
// if (elem.name==="morethan500") {
//  // let c = document.getElementById('jeans').label;
//  let y = document.getElementById("morethan500").innerHTML;
// }
// if (elem.name==="above1000") {
//  // let c = document.getElementById('jeans').label;
//  let z = document.getElementById("above1000").innerHTML;
// }
// });


// let a = document.getElementById("subcategory").innerHTML;
var Container = $('.container');
	Container.imagesLoaded(function() {
		var portfolio = $('.special-menu');
		portfolio.on('click', 'button', function() {
			$(this).addClass('active').siblings().removeClass('active');
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({
				filter: filterValue
			});
		});
		var $grid = $('.special-list').isotope({
			itemSelector: '.special-grid'
		});
	});